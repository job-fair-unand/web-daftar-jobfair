<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - ACEED EXPO</title>
    <style>
        /* Add your custom styles here */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }
        .header {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
            background: #ffffff;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>ACEED EXPO Universitas Andalas 2025</h1>
        </div>
        <div class="content">
            <h2>Reset Password</h2>
            <p>Halo {{ $user->name }},</p>
            <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>
            
            <div style="text-align: center;">
                <a href="{{ $url }}" class="button">Reset Password</a>
            </div>
            
            <p>Link reset password ini akan kedaluwarsa dalam {{ $expire }} menit.</p>
            <p>Jika Anda tidak meminta reset password, tidak ada tindakan lebih lanjut yang diperlukan.</p>
            
            <hr style="margin: 30px 0;">
            <p style="color: #666; font-size: 14px;">
                Jika Anda mengalami masalah dengan tombol "Reset Password", salin dan tempel URL berikut ke browser Anda:<br>
                <a href="{{ $url }}">{{ $url }}</a>
            </p>
            
            <p style="margin-top: 30px;">
                Salam,<br>
                <strong>Tim ACEED EXPO Universitas Andalas 2025</strong>
            </p>
        </div>
    </div>
</body>
</html>