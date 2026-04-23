<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('backend.auth.register');
    }

    public function register(Request $request)
    {
        // Custom messages for validation
        $messages = [
            'transaction_id.unique' => 'এই ট্রানজেকশন আইডিটি ইতিমধ্যে ব্যবহার করা হয়েছে। অনুগ্রহ করে সঠিক ট্রানজেকশন আইডি দিন।',
            'transaction_id.required' => 'ট্রানজেকশন আইডি প্রদান করা বাধ্যতামূলক।',
        ];

        // Validate the form data
        $validatedData = $request->validate([
            'name_bn' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'batch_passing_year' => 'required|string|max:50',
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',
            'job_description' => 'nullable|string',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'total_amount' => 'nullable|integer',
            't_shirt_size' => 'required|string',
            'interested_in_guests' => 'required|in:yes,no',
            'guest_count' => 'nullable|integer|min:1|max:10',
            'guest_name.*' => 'nullable|string|max:255',
            'guest_age.*' => 'nullable|string|max:50',
            'guest_relation.*' => 'nullable|string|max:100',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'payment_receipt_copy' => [
                'nullable',
                'file',
                'mimetypes:application/pdf,image/jpeg,image/png',
                'max:2048'
            ],
            'transaction_id' => 'required|string|max:100|unique:membership_applications,transaction_id',
            'declaration' => 'required|accepted',
        ], $messages);

        // Process file uploads
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        if ($request->hasFile('payment_receipt_copy')) {
            $receiptPath = $request->file('payment_receipt_copy')->store('payment_receipts', 'public');
            $validatedData['payment_receipt_copy'] = $receiptPath;
        }

        // Process guest details
        if ($request->interested_in_guests === 'yes' && $request->has('guest_name')) {
            $guestDetails = [];
            $names = $request->input('guest_name');
            $ages = $request->input('guest_age');
            $relations = $request->input('guest_relation');

            foreach ($names as $key => $name) {
                if (!empty($name)) {
                    $guestDetails[] = [
                        'name' => $name,
                        'age' => $ages[$key] ?? '',
                        'relation' => $relations[$key] ?? ''
                    ];
                }
            }
            $validatedData['guest_details'] = $guestDetails;
        } else {
            $validatedData['guest_details'] = null;
        }

        // Create the membership application
        $application = MembershipApplication::create($validatedData);

        $name = $validatedData['name_bn'];
        $mobile = $request->mobile;

        // SMS for Registrar (User)
        $userMessage = "আপনার রেজিস্ট্রেশন সফলভাবে সম্পন্ন হয়েছে! নামঃ $name - হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী ২০২৬";
        Helper::sendSMS($mobile, $userMessage);

        // SMS for Admin
        $adminPhone = '01711774607'; // admin number
        $adminMessage = "নতুন রেজিস্ট্রেশন: নামঃ $name, মোবাইলঃ $mobile - হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী ২০২৬";
        Helper::sendSMS($adminPhone, $adminMessage);

        return redirect()->route('register')->with('success', 'আপনার রেজিস্ট্রেশন সফলভাবে সম্পন্ন হয়েছে!');
    }
}
