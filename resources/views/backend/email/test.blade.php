<!-- resources/views/emails/test.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Email Configuration Test</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .header { text-align: center; margin-bottom: 20px; }
        .success { color: #28a745; }
        .details { margin: 20px 0; padding: 15px; background: #f8f9fa; border-radius: 5px; }
    </style>
</head>
<body>
<div class="header">
    <h2>BACSAF Email Configuration Test</h2>
</div>

<div class="details">
    <p class="success">This email confirms that your Laravel email configuration is working correctly!</p>

    <h3>Configuration Details:</h3>
    <ul>
        <li><strong>Mailer:</strong> {{ config('mail.default') }}</li>
        <li><strong>Host:</strong> {{ config('mail.mailers.smtp.host') }}</li>
        <li><strong>Port:</strong> {{ config('mail.mailers.smtp.port') }}</li>
        <li><strong>Encryption:</strong> {{ config('mail.mailers.smtp.encryption') ?? 'None' }}</li>
        <li><strong>From Address:</strong> {{ config('mail.from.address') }}</li>
        <li><strong>From Name:</strong> {{ config('mail.from.name') }}</li>
        <li><strong>Sent At:</strong> {{ now()->format('Y-m-d H:i:s') }}</li>
    </ul>
</div>

<p>If you received this email, your SMTP configuration is properly set up.</p>

<p>You can now proceed with implementing the membership application emails.</p>

<p>Best regards,<br>
    <strong>BACSAF Technical Team</strong></p>
</body>
</html>
