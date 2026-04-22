<!-- resources/views/backend/email/membership_confirmation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>রেজিস্ট্রেশন আবেদন প্রাপ্তি নিশ্চিতকরণ</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h1 style="color: #007bff;">প্রিয় {{ $data->name_en }},</h1>

    <p>হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী-২০২৬ এর জন্য আপনার রেজিস্ট্রেশন আবেদনটি সফলভাবে গৃহীত হয়েছে।</p>

    <h3>আবেদনের বিবরণ:</h3>
    <ul style="list-style-type: none; padding-left: 0;">
        <li><strong>নাম (ইংরেজি):</strong> {{ $data->name_en }}</li>
        <li><strong>ব্যাচ / পাশের সাল:</strong> {{ $data->batch_passing_year }}</li>
        <li><strong>মোবাইল নম্বর:</strong> {{ $data->mobile }}</li>
        <li><strong>ট্রানজেকশন আইডি:</strong> {{ $data->transaction_id }}</li>
        <li><strong>আবেদনের তারিখ:</strong> {{ $data->created_at->format('d/m/Y') }}</li>
    </ul>

    @if($data->interested_in_guests === 'yes' && $data->guest_details)
        <h3>অতিথির তথ্য:</h3>
        <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>নাম</th>
                    <th>বয়স</th>
                    <th>সম্পর্ক</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data->guest_details as $guest)
                    <tr>
                        <td>{{ $guest['name'] }}</td>
                        <td>{{ $guest['age'] }}</td>
                        <td>{{ $guest['relation'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p>আমরা আপনার আবেদনটি যাচাই করব এবং প্রয়োজনে আপনার সাথে যোগাযোগ করব।</p>

    <p>যেকোনো জিজ্ঞাসায় যোগাযোগ করুন: reunionhhs@gmail.com</p>

    <p>শুভেচ্ছান্তে,<br>
    হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী-২০২৬ কমিটি</p>
</body>
</html>
