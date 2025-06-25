<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dewi Booth - Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#1b4332] to-[#2d6a4f]">
    <div class="w-full max-w-3xl bg-white/90 rounded-3xl shadow-2xl p-8 flex flex-col gap-0 justify-center">
        <a href="/company/dashboard"
           class="group inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/60 border border-yellow-400 shadow-md backdrop-blur-md text-[#2d6a4f] font-bold text-base mb-6 transition-all duration-200 hover:bg-yellow-400/90 hover:text-[#1b4332] hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-400/60">
            <svg class="w-6 h-6 text-yellow-500 group-hover:-translate-x-1 group-hover:text-[#1b4332] transition-all duration-200"
                 fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Dashboard
        </a>
        <div class="mb-6">
            <h1 class="text-3xl font-extrabold bg-gradient-to-r from-yellow-400 to-yellow-700 bg-clip-text text-transparent tracking-wide mb-1">Dewi Booth</h1>
            <p class="text-slate-500 font-medium">Sistem Pembayaran Booth</p>
        </div>
        @if(isset($booths) && $booths[0] !== '')
            <div class="bg-green-50 border border-green-700 rounded-xl p-4 mb-4">
                <div class="flex items-center gap-2 mb-2">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 text-yellow-600"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M16 3v4M8 3v4"/></svg>
                    <span class="font-bold text-green-900">Booth yang Dipilih</span>
                </div>
                <div class="flex flex-wrap gap-2">
                    @foreach($booths as $booth)
                        <span class="bg-gradient-to-r from-[#2d6a4f] to-yellow-400 text-white px-3 py-1 rounded-full font-semibold text-sm shadow">{{ $booth }}</span>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="border-t border-slate-200 my-6"></div>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="bg-slate-50 rounded-xl p-4 flex-1 border border-slate-200 shadow-sm">
                <div class="flex items-center gap-2 mb-3">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 text-yellow-600"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 2v4M16 2v4M2 10h20"/></svg>
                    <span class="font-bold text-slate-800">Detail Booth</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="bg-white rounded-lg border border-slate-200 p-3">
                        <div class="text-xs font-semibold text-slate-500 uppercase mb-1">Jenis Booth</div>
                        <div class="font-bold text-slate-800">Platinum</div>
                    </div>
                    <div class="bg-white rounded-lg border border-slate-200 p-3">
                        <div class="text-xs font-semibold text-slate-500 uppercase mb-1">Lokasi</div>
                        <div class="font-bold text-slate-800">Area A - Stand 15</div>
                    </div>
                    <div class="bg-white rounded-lg border border-slate-200 p-3">
                        <div class="text-xs font-semibold text-slate-500 uppercase mb-1">Ukuran Booth</div>
                        <div class="font-bold text-slate-800">3x4m</div>
                    </div>
                    <div class="bg-white rounded-lg border border-slate-200 p-3">
                        <div class="text-xs font-semibold text-slate-500 uppercase mb-1">Gambar Booth</div>
                        <img src="https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?w=300&h=200&fit=crop&crop=center" alt="Booth Platinum" class="w-full h-16 object-cover rounded-md border-2 border-yellow-400">
                    </div>
                </div>
            </div>
            <div class="bg-slate-50 rounded-xl p-4 flex flex-col gap-4 border border-slate-200 shadow-sm max-w-xs w-full">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 text-yellow-600"><path d="M12 1v22M19 5H5v14h14V5z"/></svg>
                        <span class="font-bold text-slate-800">Total Pembayaran</span>
                    </div>
                    <div class="bg-gradient-to-r from-[#2d6a4f] to-[#1b4332] text-yellow-400 px-4 py-3 rounded-lg text-center text-lg font-extrabold border-2 border-yellow-400 shadow">Rp. 2.500.000</div>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-2 mt-4">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 text-yellow-600"><rect x="2" y="7" width="20" height="13" rx="2"/><path d="M16 3v4M8 3v4"/></svg>
                        <span class="font-bold text-slate-800">Informasi Rekening</span>
                    </div>
                    <div class="bg-white border-2 border-[#2d6a4f] rounded-lg p-3 flex flex-col gap-1">
                        <div class="font-bold text-slate-800">Bank Central Asia (BCA)</div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="font-mono text-base font-bold text-[#2d6a4f]">1234567890</span>
                            <button id="copyBtn" type="button" class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-[#2d6a4f] text-white font-semibold text-sm hover:bg-[#1b4332] transition focus:outline-none focus:ring-2 focus:ring-yellow-400" onclick="copyAccountNumber(event)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16.5V19a2.5 2.5 0 002.5 2.5h7A2.5 2.5 0 0020 19V8.5A2.5 2.5 0 0017.5 6h-7A2.5 2.5 0 008 8.5V11" /><path stroke-linecap="round" stroke-linejoin="round" d="M16 3.5V6a2.5 2.5 0 01-2.5 2.5h-7A2.5 2.5 0 014 6V3.5A2.5 2.5 0 016.5 1h7A2.5 2.5 0 0116 3.5z" /></svg>
                                <span id="copyBtnText">Copy</span>
                            </button>
                        </div>
                        <div class="text-slate-500 text-sm">a.n. Dewi Sartika</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-200 my-6"></div>
        <div class="bg-slate-50 rounded-xl p-4 border border-slate-200 shadow-sm">
            <div class="flex items-center gap-2 mb-3">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 text-yellow-600"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M16 3v4M8 3v4"/></svg>
                <span class="font-bold text-slate-800">Upload Bukti Pembayaran</span>
            </div>
            <label for="fileInput" class="block border-2 border-dashed border-slate-300 rounded-lg p-6 text-center cursor-pointer bg-white hover:border-[#2d6a4f] hover:bg-green-50 transition">
                <div class="text-3xl mb-2">📁</div>
                <div class="text-slate-500 mb-1">Klik atau drag & drop file di sini</div>
                <div class="text-slate-400 text-sm">Format: JPG, PNG, PDF (Maksimal 5MB)</div>
                <input type="file" id="fileInput" class="hidden" accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileSelect(event)">
            </label>
            <div id="uploadedFile" class="flex items-center gap-3 bg-green-50 border border-[#2d6a4f] rounded-lg p-3 mt-4" style="display: none;">
                <span id="filePreview"></span>
                <div class="flex-1">
                    <div class="font-semibold text-slate-800" id="fileName"></div>
                    <div class="text-slate-500 text-xs" id="fileSize"></div>
                </div>
                <button class="bg-red-500 text-white rounded-md px-3 py-1 text-xs font-semibold hover:bg-red-600 transition" onclick="removeFile()">Hapus</button>
            </div>
            <div class="mt-6"></div>
            <button
                id="submitBtn"
                disabled
                onclick="submitPayment()"
                class="group relative w-full flex justify-center items-center px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-700 text-[#1b4332] font-bold text-lg rounded-2xl shadow-2xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-yellow-400/50 overflow-hidden
                    hover:from-yellow-500 hover:to-yellow-800 hover:scale-105 hover:shadow-yellow-300/40 active:scale-95 disabled:bg-slate-300 disabled:text-slate-400"
            >
                <span class="relative z-10 flex items-center space-x-2">
                    <span class="text-white">Kirim Bukti Pembayaran</span>
                    <svg class="w-5 h-5 text-white group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </span>
                <!-- Ripple effect -->
                <span class="absolute inset-0 rounded-2xl bg-white opacity-0 group-active:opacity-10 transition duration-300"></span>
            </button>
        </div>
        <div id="modalSuccess" class="fixed inset-0 bg-black/30 flex items-center justify-center z-50" style="display:none;">
            <div class="bg-white rounded-2xl p-8 shadow-xl text-center max-w-xs w-full">
                <div class="text-4xl mb-2">🎉</div>
                <h2 class="text-xl font-bold text-[#2d6a4f] mb-2">Bukti Pembayaran Berhasil Dikirim!</h2>
                <p class="text-slate-600 mb-4">Tim kami akan segera memverifikasi pembayaran Anda.<br>Terima kasih telah melakukan pembayaran booth.</p>
                <button class="bg-gradient-to-r from-yellow-400 to-yellow-700 text-[#1b4332] font-bold py-2 px-6 rounded-lg hover:from-yellow-500 hover:to-yellow-800 transition" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>
    <script>
        let uploadedFile = null;
        function copyAccountNumber(event) {
            const accountNumber = '1234567890';
            navigator.clipboard.writeText(accountNumber).then(() => {
                const btn = document.getElementById('copyBtn');
                const btnText = document.getElementById('copyBtnText');
                btnText.textContent = 'Tersalin!';
                btn.classList.add('bg-yellow-400', 'text-[#1b4332]');
                setTimeout(() => {
                    btnText.textContent = 'Copy';
                    btn.classList.remove('bg-yellow-400', 'text-[#1b4332]');
                }, 1500);
            });
        }
        function handleFileSelect(e) {
            const file = e.target.files[0];
            if (file) {
                processFile(file);
            }
        }
        function processFile(file) {
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
            const maxSize = 5 * 1024 * 1024;
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
            const filePreview = document.getElementById('filePreview');
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            uploadedFileDiv.style.display = 'flex';
            filePreview.innerHTML = '';
            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.className = 'w-12 h-12 object-cover rounded border border-yellow-400 mr-2';
                img.src = URL.createObjectURL(file);
                img.onload = () => URL.revokeObjectURL(img.src);
                filePreview.appendChild(img);
            }
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
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<span class="inline-block align-middle">⏳</span> Mengirim...';
            submitBtn.disabled = true;
            setTimeout(() => {
                submitBtn.innerHTML = '✅ Berhasil Dikirim';
                submitBtn.classList.add('bg-gradient-to-r', 'from-[#2d6a4f]', 'to-[#1b4332]', 'text-yellow-400');
                showModal();
            }, 2000);
        }
        function showModal() {
            document.getElementById('modalSuccess').style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('modalSuccess').style.display = 'none';
            removeFile();
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = 'Kirim Bukti Pembayaran';
            submitBtn.classList.remove('bg-gradient-to-r', 'from-[#2d6a4f]', 'to-[#1b4332]', 'text-yellow-400');
        }
    </script>
</body>

</html>