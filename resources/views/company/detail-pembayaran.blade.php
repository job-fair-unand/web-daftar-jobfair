@extends('layouts.company')

@section('title', 'Detail Pembayaran Booth')

@section('content')
<div class="p-6 bg-gray-50">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-6xl mx-auto">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('company.dashboard') }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-green-200 rounded-xl text-green-600 font-medium hover:bg-green-50 hover:border-green-300 transition-all duration-200 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-6">
            <div class="text-center">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('assets/icons/aceed.png') }}" alt="ACEED Logo" class="h-16 w-16 rounded-full shadow-lg">
                </div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-green-600 to-yellow-600 bg-clip-text text-transparent mb-2">
                    Detail Pembayaran Booth
                </h1>
                <p class="text-gray-600">ACEED EXPO Universitas Andalas 2025</p>
                
                <!-- Status Badge -->
                <div class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-yellow-50 border border-yellow-200 rounded-full">
                    <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                    <span class="text-yellow-700 font-medium text-sm">Menunggu Pembayaran</span>
                </div>
            </div>
        </div>

        <!-- Detail Booth Section -->
        <div class="section">
            <h2 class="section-title">
                <div class="section-icon">📋</div>
                Detail Booth
            </h2>
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Jenis Booth</div>
                    <div class="detail-value">Platinum</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Lokasi</div>
                    <div class="detail-value">Area A - Stand 15</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Ukuran Booth</div>
                    <div class="detail-value">3x4m</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Gambar Booth</div>
                    <div class="detail-value">
                        <img src="https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?w=300&h=200&fit=crop&crop=center"
                            alt="Booth Platinum"
                            style="width: 100%; height: 120px; object-fit: cover; border-radius: 8px; border: 2px solid #d4af37;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Harga Section -->
        <div class="section">
            <h2 class="section-title">
                <div class="section-icon">💰</div>
                Total Pembayaran
            </h2>
            <div class="price-display">
                Rp. 2.500.000
            </div>
        </div>

        <!-- Rekening Section -->
        <div class="section">
            <h2 class="section-title">
                <div class="section-icon">🏦</div>
                Informasi Rekening
            </h2>
            <div class="bank-info">
                <div class="bank-details">
                    <div class="bank-name">Bank Central Asia (BCA)</div>
                    <div class="account-number">1234567890</div>
                    <div class="account-name">a.n. Dewi Sartika</div>
                </div>
            </div>
        </div>

        <!-- Upload Bukti Pembayaran Section -->
        <div class="section">
            <h2 class="section-title">
                <div class="section-icon">📄</div>
                Upload Bukti Pembayaran
            </h2>
            <div class="upload-area" onclick="document.getElementById('fileInput').click()"
                ondragover="handleDragOver(event)" ondrop="handleDrop(event)" ondragenter="handleDragEnter(event)"
                ondragleave="handleDragLeave(event)">
                <div class="upload-icon">📁</div>
                <div class="upload-text">Klik atau drag & drop file di sini</div>
                <div class="upload-subtext">Format: JPG, PNG, PDF (Maksimal 5MB)</div>
            </div>
            <input type="file" id="fileInput" class="file-input" accept=".jpg,.jpeg,.png,.pdf"
                onchange="handleFileSelect(event)">
            <div id="uploadedFile" class="uploaded-file" style="display: none;">
                <div class="file-icon">📄</div>
                <div class="file-info">
                    <div class="file-name" id="fileName"></div>
                    <div class="file-size" id="fileSize"></div>
                </div>
                <button class="remove-btn" onclick="removeFile()">❌</button>
            </div>
        </div>

        <button class="submit-btn" id="submitBtn" disabled onclick="submitPayment()">
            Kirim Bukti Pembayaran
        </button>
    </div>

    <script>
        let uploadedFile = null;

        function copyAccountNumber() {
            const accountNumber = '1234567890';
            navigator.clipboard.writeText(accountNumber).then(() => {
                const btn = event.target;
                const originalText = btn.innerHTML;
                btn.innerHTML = '✅ Copied!';
                btn.style.background = '#2d6a4f';
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.background = '#2d6a4f';
                }, 2000);
            });
        }

        function handleDragOver(e) {
            e.preventDefault();
        }

        function handleDragEnter(e) {
            e.preventDefault();
            e.target.closest('.upload-area').classList.add('dragover');
        }

        function handleDragLeave(e) {
            e.preventDefault();
            e.target.closest('.upload-area').classList.remove('dragover');
        }

        function handleDrop(e) {
            e.preventDefault();
            e.target.closest('.upload-area').classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                processFile(files[0]);
            }
        }

        function handleFileSelect(e) {
            const file = e.target.files[0];
            if (file) {
                processFile(file);
            }
        }

        function processFile(file) {
            // Validasi file
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
            const maxSize = 5 * 1024 * 1024; // 5MB

            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG, PNG, atau PDF.');
                return;
            }

            if (file.size > maxSize) {
                alert('Ukuran file terlalu besar. Maksimal 5MB.');
                return;
            }

            uploadedFile = file;
            displayUploadedFile(file);
            updateSubmitButton();
        }

        function displayUploadedFile(file) {
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const uploadedFileDiv = document.getElementById('uploadedFile');

            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            uploadedFileDiv.style.display = 'flex';
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function removeFile() {
            uploadedFile = null;
            document.getElementById('uploadedFile').style.display = 'none';
            document.getElementById('fileInput').value = '';
            updateSubmitButton();
        }

        function updateSubmitButton() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = !uploadedFile;
        }

        function submitPayment() {
            if (!uploadedFile) {
                alert('Silakan upload bukti pembayaran terlebih dahulu.');
                return;
            }

            // Simulasi submit
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '⏳ Mengirim...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Bukti pembayaran berhasil dikirim! Tim kami akan segera memverifikasi pembayaran Anda.');
                submitBtn.innerHTML = '✅ Berhasil Dikirim';
                submitBtn.style.background = 'linear-gradient(135deg, #2d6a4f, #1b4332)';
            }, 2000);
        }
    </script>
</body>

</html>