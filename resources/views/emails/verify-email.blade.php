<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Job Fair Unand 2025</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f0fdf4;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #16a34a 0%, #eab308 100%);
            padding: 40px 30px;
            text-align: center;
            color: #ffffff;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .content {
            padding: 40px 30px;
            color: #1f2937;
        }
        
        .greeting {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .message {
            font-size: 16px;
            color: #4b5563;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .cta-section {
            text-align: center;
            margin: 40px 0;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #16a34a 0%, #eab308 100%);
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(22, 163, 74, 0.3);
        }
        
        .info-cards {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            margin: 40px 0;
        }
        
        .info-card {
            flex: 1;
            background: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #e5e7eb;
            min-width: 120px;
        }
        
        .info-card .icon {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .info-card .title {
            font-size: 18px;
            font-weight: bold;
            color: #16a34a;
            margin-bottom: 5px;
        }
        
        .info-card .subtitle {
            font-size: 14px;
            color: #6b7280;
        }
        
        .footer {
            background: #f8fafc;
            padding: 25px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 13px;
            color: #6b7280;
        }
        
        .footer-links {
            margin-bottom: 20px;
        }
        
        .footer-links a {
            color: #16a34a;
            text-decoration: none;
            margin: 0 12px;
            font-size: 13px;
        }
        
        .social-links {
            margin: 20px 0;
        }
        
        .social-links a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: #16a34a;
            color: #ffffff;
            border-radius: 50%;
            text-decoration: none;
            margin: 0 6px;
            line-height: 36px;
            text-align: center;
            font-size: 18px;
        }
        
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            
            .email-container {
                margin: 0;
                border-radius: 8px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .greeting {
                font-size: 18px;
            }
            
            .message {
                font-size: 14px;
            }
            
            .cta-button {
                padding: 12px 24px;
                font-size: 14px;
            }
            
            .info-cards {
                flex-direction: column;
                gap: 15px;
            }
            
            .info-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <img src="assets/icons/aceed.png" alt="ACEED Logo">
            </div>
            <h1 style="text-align: center;">ACEED EXPO UNAND</h1>
            <p style="text-align: center;">Job Fair Universitas Andalas 2025</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Halo, {{ $user->name }}! 👋
            </div>

            <div class="message">
                Terima kasih telah mendaftar di <strong>Job Fair Universitas Andalas 2025</strong>! Kami sangat antusias menyambut Anda di acara terbesar tahun ini. Untuk melanjutkan dan mengakses semua fitur platform kami, silakan verifikasi alamat email Anda dengan mengklik tombol di bawah ini:
            </div>

            <!-- CTA Button -->
            <div class="cta-section">
                <a href="{{ $verificationUrl }}" class="cta-button">
                    Verifikasi Email Sekarang
                </a>
            </div>

            <div class="message">
                <strong>🔒 Keamanan:</strong> Link verifikasi ini akan kadaluarsa dalam <strong>60 menit</strong> untuk menjaga keamanan akun Anda.<br>
                <strong>❓ Tidak mendaftar?</strong> Jika Anda tidak mendaftar akun di platform kami, silakan abaikan email ini.
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-text">
                <strong>Job Fair Universitas Andalas 2025</strong><br>
                Limau Manis, Pauh, Kota Padang, Sumatera Barat 25163<br>
                Email: info@jobfair.unand.ac.id | Tel: (0751) 71181<br>
                © 2025 Universitas Andalas. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>