<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use App\Exports\MembershipApplicationExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function candidate_list()
    {
        $candidates = MembershipApplication::all();
        return view('backend.candidate.candidate_list', compact('candidates'));
    }

    public function exportExcel()
    {
        return Excel::download(new MembershipApplicationExport, 'member_applications_' . date('Y-m-d') . '.xlsx');
    }

    public function exportPdf()
    {
        $candidates = MembershipApplication::all();
        $pdf = Pdf::loadView('backend.candidate.pdf', compact('candidates'))
                  ->setPaper('a4', 'landscape');
        return $pdf->download('member_applications_' . date('Y-m-d') . '.pdf');
    }

    public function view_details_member($id)
    {
           $candidate = MembershipApplication::find($id);
           return view('backend.candidate.show', compact('candidate'));
    }

    public function generateIdCard($id)
    {
        $candidate = MembershipApplication::findOrFail($id);
        $pdf = Pdf::loadView('backend.candidate.id_card', compact('candidate'))
                  ->setPaper([0, 0, 242.65, 362.83], 'portrait'); // Approx 85.6mm x 128mm or custom ID card size
        return $pdf->stream('id_card_' . $candidate->id . '.pdf');
    }

    public function membersApproval(Request $request)
    {
        MembershipApplication::where('id', $request->membership_id)->update(['application_status' => 'Approved']);
        $candidate = MembershipApplication::find($request->membership_id);
        // SMS for Registrar (User)
        $name = $candidate->name_bn;
        $message = "অভিনন্দন $name! আপনার রেজিস্ট্রেশন অনুমোদিত হয়েছে। হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী ২০২৬-এ আপনাকে স্বাগতম!";
        Helper::sendSMS($candidate->mobile, $message);
        return redirect()->back()
            ->with('success', $candidate->name_en . '\'s membership has been approved successfully!');
    }

    public function edit_member($id)
    {
        $candidate = MembershipApplication::findOrFail($id);
        return view('backend.candidate.edit', compact('candidate'));
    }

    public function update_member(Request $request, $id)
    {
        $candidate = MembershipApplication::findOrFail($id);

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
            't_shirt_size' => 'required|string',
            'total_amount' => 'nullable|integer',
            'interested_in_guests' => 'required|in:yes,no',
            'guest_count' => 'nullable|integer|min:0|max:10',
            'guest_name.*' => 'nullable|string|max:255',
            'guest_age.*' => 'nullable|string|max:50',
            'guest_relation.*' => 'nullable|string|max:100',
            'transaction_id' => 'nullable|string|max:100',
            'application_status' => 'required|string|in:Pending,Approved',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'payment_receipt_copy' => [
                'nullable',
                'file',
                'mimetypes:application/pdf,image/jpeg,image/png',
                'max:2048'
            ],
        ]);

        // Process file uploads
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($candidate->photo) {
                Storage::disk('public')->delete($candidate->photo);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        if ($request->hasFile('payment_receipt_copy')) {
            // Delete old receipt
            if ($candidate->payment_receipt_copy) {
                Storage::disk('public')->delete($candidate->payment_receipt_copy);
            }
            $receiptPath = $request->file('payment_receipt_copy')->store('payment_receipts', 'public');
            $validatedData['payment_receipt_copy'] = $receiptPath;
        }

        // Process guest details
        if ($request->interested_in_guests === 'yes' && $request->has('guest_name')) {
            $guestDetails = [];
            $names = $request->input('guest_name');
            $ages = $request->input('guest_age');
            $relations = $request->input('guest_relation');

            if ($names) {
                foreach ($names as $key => $name) {
                    if (!empty($name)) {
                        $guestDetails[] = [
                            'name' => $name,
                            'age' => $ages[$key] ?? '',
                            'relation' => $relations[$key] ?? ''
                        ];
                    }
                }
            }
            $validatedData['guest_details'] = $guestDetails;
        } else {
            $validatedData['guest_details'] = null;
            $validatedData['guest_count'] = 0;
        }

        $candidate->update($validatedData);

        return redirect()->route('candidate_list')->with('success', 'Member application updated successfully!');
    }
}
