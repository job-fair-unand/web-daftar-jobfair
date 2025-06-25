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

        <!-- Selected Booths -->
        @if(isset($booths) && $booths[0] !== '')
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-yellow-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m0 0h2M7 7h10M7 11h10M7 15h10"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Booth yang Dipilih</h2>
                </div>
                <div class="flex flex-wrap gap-3">
                    @foreach($booths as $booth)
                        <span class="px-4 py-2 bg-gradient-to-r from-green-600 to-yellow-600 text-white rounded-lg font-medium shadow-sm">
                            {{ $booth }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Booth Details -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-yellow-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m0 0h2M7 7h10M7 11h10M7 15h10"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Detail Booth</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="text-sm font-medium text-gray-500 mb-1">Jenis Booth</div>
                        <div class="text-lg font-bold text-gray-900">Platinum</div>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="text-sm font-medium text-gray-500 mb-1">Lokasi</div>
                        <div class="text-lg font-bold text-gray-900">Area A - Stand 15</div>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="text-sm font-medium text-gray-500 mb-1">Ukuran Booth</div>
                        <div class="text-lg font-bold text-gray-900">3x4m</div>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="text-sm font-medium text-gray-500 mb-1">Fasilitas</div>
                        <div class="text-sm text-gray-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Meja & Kursi</li>
                                <li>Backdrop</li>
                                <li>Listrik</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Booth Preview -->
                <div class="mb-6">
                    <div class="text-sm font-medium text-gray-500 mb-3">Preview Booth</div>
                    <div class="bg-gray-100 rounded-xl p-4 text-center">
                        <img src="https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?w=400&h=250&fit=crop&crop=center" 
                             alt="Booth Preview" 
                             class="w-full h-48 object-cover rounded-lg border-2 border-yellow-400 shadow-sm">
                    </div>
                </div>
            </div>

            <!-- Payment Details -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <!-- Total Payment -->
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-yellow-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Total Pembayaran</h3>
                    </div>
                    <div class="bg-gradient-to-r from-green-600 to-yellow-600 text-white p-4 rounded-xl text-center">
                        <div class="text-2xl font-bold mb-1">Rp 2.500.000</div>
                        <div class="text-sm text-green-100">Booth Platinum (3x4m)</div>
                    </div>
                </div>

                <!-- Payment Details -->
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-yellow-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Informasi Rekening</h3>
                    </div>
                    <div class="p-4 border-2 border-green-200 rounded-xl bg-green-50">
                        <div class="text-center mb-3">
                            <div class="text-lg font-bold text-gray-900">Bank Central Asia (BCA)</div>
                            <div class="text-sm text-gray-600">a.n. ACEED EXPO UNAND</div>
                        </div>
                        <div class="flex items-center justify-center gap-2 p-3 bg-white rounded-lg">
                            <span class="font-mono text-xl font-bold text-green-600">1234567890</span>
                            <button id="copyBtn" type="button" 
                                class="ml-2 px-3 py-1 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition-colors"
                                onclick="copyAccountNumber(event)">
                                <span id="copyBtnText">Copy</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Deadline -->
                <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-medium text-yellow-800">Batas Waktu Pembayaran</span>
                    </div>
                    <div class="text-sm text-yellow-700">
                        <div class="font-bold">25 Juni 2025, 23:59 WIB</div>
                        <div class="text-xs mt-1">Pembayaran harus dilakukan sebelum batas waktu</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Bukti Pembayaran -->
        <div class="mt-6 bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-yellow-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Upload Bukti Pembayaran</h2>
            </div>

            <!-- Upload Area -->
            <div class="mb-6">
                <label for="fileInput" 
                    class="block border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer bg-gray-50 hover:border-green-400 hover:bg-green-50 transition-all duration-200">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <div class="text-lg font-medium text-gray-700 mb-2">Klik atau drag & drop file di sini</div>
                        <div class="text-sm text-gray-500">Format: JPG, PNG, PDF (Maksimal 5MB)</div>
                    </div>
                    <input type="file" id="fileInput" class="hidden" accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileSelect(event)">
                </label>

                <!-- Uploaded File Preview -->
                <div id="uploadedFile" class="mt-4 p-4 bg-green-50 border border-green-200 rounded-xl hidden">
                    <div class="flex items-center gap-4">
                        <div id="filePreview" class="flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <div class="font-medium text-gray-900" id="fileName"></div>
                            <div class="text-sm text-gray-500" id="fileSize"></div>
                        </div>
                        <button type="button" 
                            class="px-3 py-1 bg-red-500 text-white rounded-lg text-sm font-medium hover:bg-red-600 transition-colors"
                            onclick="removeFile()">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button id="submitBtn" 
                disabled
                onclick="submitPayment()"
                class="w-full py-4 px-6 bg-gradient-to-r from-green-600 to-yellow-600 text-white font-bold text-lg rounded-xl shadow-lg hover:from-green-700 hover:to-yellow-700 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed transform hover:scale-[1.02] active:scale-[0.98]">
                <span class="flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    Kirim Bukti Pembayaran
                </span>
            </button>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="modalSuccess" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 shadow-2xl text-center max-w-md w-full mx-4">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-3">Berhasil Dikirim! 🎉</h2>
            <p class="text-gray-600 mb-6">
                Bukti pembayaran Anda telah berhasil dikirim. Tim kami akan memverifikasi pembayaran dalam 1x24 jam.
            </p>
            <button type="button" 
                class="w-full py-3 px-6 bg-gradient-to-r from-green-600 to-yellow-600 text-white font-bold rounded-xl hover:from-green-700 hover:to-yellow-700 transition-all duration-200"
                onclick="closeModal()">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
let uploadedFile = null;

function copyAccountNumber(event) {
    const accountNumber = '1234567890';
    navigator.clipboard.writeText(accountNumber).then(() => {
        const btnText = document.getElementById('copyBtnText');
        btnText.textContent = 'Tersalin!';
        setTimeout(() => {
            btnText.textContent = 'Copy';
        }, 2000);
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
    const filePreview = document.getElementById('filePreview');

    fileName.textContent = file.name;
    fileSize.textContent = formatFileSize(file.size);
    uploadedFileDiv.classList.remove('hidden');

    filePreview.innerHTML = '';
    if (file.type.startsWith('image/')) {
        const img = document.createElement('img');
        img.className = 'w-16 h-16 object-cover rounded-lg border-2 border-green-400';
        img.src = URL.createObjectURL(file);
        img.onload = () => URL.revokeObjectURL(img.src);
        filePreview.appendChild(img);
    } else {
        const icon = document.createElement('div');
        icon.className = 'w-16 h-16 bg-red-100 rounded-lg flex items-center justify-center';
        icon.innerHTML = '<svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>';
        filePreview.appendChild(icon);
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
    document.getElementById('uploadedFile').classList.add('hidden');
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
    submitBtn.innerHTML = `
        <span class="flex items-center justify-center gap-2">
            <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Mengirim...
        </span>
    `;
    submitBtn.disabled = true;

    // Simulate upload process
    setTimeout(() => {
        showModal();
    }, 2000);
}

function showModal() {
    document.getElementById('modalSuccess').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modalSuccess').classList.add('hidden');
    // Reset form
    removeFile();
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.innerHTML = `
        <span class="flex items-center justify-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
            </svg>
            Kirim Bukti Pembayaran
        </span>
    `;
    updateSubmitButton();
}
</script>
@endsection