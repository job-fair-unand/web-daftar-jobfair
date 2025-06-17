<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1b4332 0%, #2d6a4f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #d4af37, #b8860b);
        }
        
        .status-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .clock-icon {
            width: 40px;
            height: 40px;
            background: #d4af37;
            border-radius: 50%;
            position: relative;
        }
        
        .clock-icon::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 2px;
            height: 12px;
            background: white;
            transform: translate(-50%, -100%);
            transform-origin: bottom;
            animation: clockHand 2s linear infinite;
        }
        
        .clock-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 2px;
            height: 8px;
            background: white;
            transform: translate(-50%, -100%) rotate(90deg);
            transform-origin: bottom;
        }
        
        @keyframes clockHand {
            0% { transform: translate(-50%, -100%) rotate(0deg); }
            100% { transform: translate(-50%, -100%) rotate(360deg); }
        }
        
        .status-title {
            font-size: 28px;
            font-weight: bold;
            color: #1b4332;
            margin-bottom: 15px;
        }
        
        .status-subtitle {
            font-size: 18px;
            color: #d4af37;
            margin-bottom: 30px;
            font-weight: 600;
        }
        
        .status-message {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            border: 2px solid #d4af37;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .status-message h3 {
            color: #1b4332;
            font-size: 20px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .status-message p {
            color: #2d6a4f;
            font-size: 16px;
            line-height: 1.5;
        }
        
        .payment-details {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            border-left: 4px solid #d4af37;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .detail-label {
            color: #2d6a4f;
            font-weight: 600;
        }
        
        .detail-value {
            color: #1b4332;
            font-weight: bold;
        }
        
        .progress-bar {
            background: #e9ecef;
            border-radius: 20px;
            height: 8px;
            margin: 20px 0;
            overflow: hidden;
        }
        
        .progress-fill {
            background: linear-gradient(90deg, #d4af37, #b8860b);
            height: 100%;
            width: 60%;
            border-radius: 20px;
            animation: progressPulse 1.5s ease-in-out infinite alternate;
        }
        
        @keyframes progressPulse {
            0% { opacity: 0.7; }
            100% { opacity: 1; }
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #d4af37, #b8860b);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
        }
        
        .btn-secondary {
            background: transparent;
            color: #2d6a4f;
            border: 2px solid #2d6a4f;
        }
        
        .btn-secondary:hover {
            background: #2d6a4f;
            color: white;
            transform: translateY(-2px);
        }
        
        .loading-dots {
            display: inline-block;
        }
        
        .loading-dots::after {
            content: '';
            animation: dots 1.5s linear infinite;
        }
        
        @keyframes dots {
            0%, 20% { content: ''; }
            40% { content: '.'; }
            60% { content: '..'; }
            80%, 100% { content: '...'; }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .status-title {
                font-size: 24px;
            }
            
            .status-subtitle {
                font-size: 16px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="status-icon">
            <div class="clock-icon"></div>
        </div>
        
        <h1 class="status-title">Pembayaran Selesai</h1>
        <p class="status-subtitle">Status: Pending</p>
        
        <div class="status-message">
            <h3>
                <span>⏳</span>
                Pembayaran Sedang Diproses
            </h3>
            <p>Transaksi Anda telah diterima dan sedang dalam proses verifikasi. Mohon tunggu beberapa saat untuk konfirmasi.</p>
        </div>
        
        <div class="payment-details">
            <div class="detail-row">
                <span class="detail-label">ID Transaksi:</span>
                <span class="detail-value">#TRX-2024-001234</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Metode Pembayaran:</span>
                <span class="detail-value">Transfer Bank</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Jumlah:</span>
                <span class="detail-value">Rp 250.000</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Waktu Transaksi:</span>
                <span class="detail-value">17 Jun 2025, 14:32</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Status:</span>
                <span class="detail-value" style="color: #d4af37;">Menunggu Verifikasi</span>
            </div>
        </div>
        
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>
        
        <p style="color: #2d6a4f; margin-bottom: 30px; font-size: 14px;">
            <span class="loading-dots">Memproses pembayaran</span>
        </p>
        
        <div class="action-buttons">
            <button class="btn btn-primary" onclick="checkStatus()">
                Cek Status Terbaru
            </button>
            <button class="btn btn-secondary" onclick="goBack()">
                Kembali ke Beranda
            </button>
        </div>
    </div>
    
    <script>
        function checkStatus() {
            const btn = document.querySelector('.btn-primary');
            const originalText = btn.textContent;
            btn.textContent = 'Mengecek...';
            btn.disabled = true;
            
            // Simulasi pengecekan status
            setTimeout(() => {
                btn.textContent = originalText;
                btn.disabled = false;
                alert('Status masih dalam proses verifikasi. Silakan cek kembali dalam beberapa menit.');
            }, 2000);
        }
        
        function goBack() {
            // Simulasi kembali ke halaman sebelumnya
            if (confirm('Apakah Anda yakin ingin kembali ke beranda?')) {
                window.history.back();
            }
        }
        
        // Auto refresh status setiap 30 detik
        setInterval(() => {
            console.log('Auto checking payment status...');
            // Di implementasi nyata, ini akan memanggil API untuk cek status
        }, 30000);
    </script>
</body>
</html>