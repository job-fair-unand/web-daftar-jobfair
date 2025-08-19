@extends('layouts.company')

@section('title', 'Detail Pembayaran Booth')

@section('content')
<div class="p-4 md:p-6">
    <a href="{{ route('company.dashboard') }}" class="inline-flex items-center text-emerald-700 hover:text-emerald-800 font-medium mb-4 transition-all duration-200 hover:gap-2">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali ke Dashboard
    </a>
    
    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-emerald-800 to-emerald-700 py-8 px-6 text-center text-white">
            <img src="{{ asset('assets/icons/aceed.png') }}" alt="ACEED Logo" class="h-16 w-16 object-cover mx-auto rounded-full bg-white p-2 shadow-lg">
            <h1 class="text-3xl font-bold mt-4 mb-1">Detail Pembayaran Booth</h1>
            <p class="text-emerald-100">ACEED EXPO Universitas Andalas 2025</p>
            
            <div class="inline-flex items-center gap-2 bg-white/20 px-3 py-2 rounded-full mt-4">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
                </span>
                <span class="font-medium">Menunggu Pembayaran</span>
            </div>
        </div>
        
        <div class="p-6">
            <!-- Detail Booth Section -->
            <div class="mb-8 pb-8 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4">
                    Detail Booth
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($booths as $booth)
                    <input type="hidden" id="booth_id" value="{{ $booths[0]->id }}">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-500 mb-1">Jenis Booth</div>
                        <div class="font-semibold text-gray-800">{{ $booth->name }}</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-500 mb-1">Ukuran</div>
                        <div class="font-semibold text-gray-800">{{ $booth->size }}</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-500 mb-1">Fasilitas</div>
                        <div class="font-semibold text-gray-800">{{ $booth->facility }}</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-sm text-gray-500 mb-1">Gambar Booth</div>
                        <div>
                            <img src="{{ asset('storage/' . $booth->picture) }}" 
                                alt="{{ $booth->name }}"
                                class="w-full h-28 object-cover rounded-md border-2 border-amber-300">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Company Data Section -->
            <div class="mb-8 pb-8 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4">
                    Data Perusahaan
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="company_nib">
                            Nomor Induk Berusaha (NIB)
                        </label>
                        <input type="text" id="company_nib" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Contoh: 0123456789">
                        <p class="mt-1 text-xs text-gray-500">Wajib diisi sesuai dengan dokumen resmi</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="company_npwp">
                            NPWP Perusahaan
                        </label>
                        <input type="text" id="company_npwp" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Contoh: 01.234.567.8-123.000">
                        <p class="mt-1 text-xs text-gray-500">Format: 00.000.000.0-000.000</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="company_address">
                            Alamat Perusahaan
                        </label>
                        <textarea id="company_address" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Alamat lengkap kantor pusat"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="company_pic">
                            Nama PIC (Person In Charge)
                        </label>
                        <input type="text" id="company_pic" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Nama lengkap PIC">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="company_pic_position">
                            Jabatan PIC
                        </label>
                        <input type="text" id="company_pic_position" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Contoh: HR Manager">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="company_pic_phone">
                            Nomor Telepon PIC
                        </label>
                        <input type="text" id="company_pic_phone" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Contoh: 08123456789">
                    </div>
                </div>
            </div>

            <!-- Harga Section -->
            <div class="mb-8 pb-8 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4">
                    Total Pembayaran
                </h2>
                <div class="text-3xl font-extrabold text-emerald-700 text-center py-6 bg-emerald-50 rounded-lg border border-emerald-200">
                    Rp. {{ number_format($booths->sum('price'), 0, ',', '.') }}
                </div>
            </div>

            <!-- Rekening Section -->
            <div class="mb-8 pb-8 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4">
                    Informasi Rekening
                </h2>
                <div class="flex justify-between items-center p-5 bg-amber-50 rounded-lg border border-amber-200">
                    <div>
                        <div class="font-bold text-amber-800">Bank Central Asia (BCA)</div>
                        <div class="text-xl font-extrabold tracking-wider text-amber-800">1234567890</div>
                        <div class="text-sm text-amber-800">a.n. Dewi Sartika</div>
                    </div>
                    <button class="bg-emerald-700 hover:bg-emerald-800 text-white font-semibold py-2 px-4 rounded transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md" 
                        onclick="copyAccountNumber(event)">
                        Copy Nomor
                    </button>
                </div>
            </div>

            <!-- Upload Bukti Pembayaran Section -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">
                    Upload Bukti Pembayaran
                </h2>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer hover:bg-gray-50 hover:border-indigo-500 transition-colors duration-300"
                    onclick="document.getElementById('fileInput').click()"
                    ondragover="handleDragOver(event)" 
                    ondrop="handleDrop(event)" 
                    ondragenter="handleDragEnter(event)"
                    ondragleave="handleDragLeave(event)">
                    <div class="font-semibold text-gray-800 mb-1">Klik atau drag & drop file di sini</div>
                    <div class="text-sm text-gray-500">Format: JPG, PNG, PDF (Maksimal 5MB)</div>
                </div>
                <input type="file" id="fileInput" class="hidden" accept=".jpg,.jpeg,.png,.pdf"
                    onchange="handleFileSelect(event)">
                <div id="uploadedFile" class="hidden flex items-center p-4 mt-3 bg-gray-100 rounded-lg border border-gray-200">
                    <div class="flex-grow">
                        <div id="fileName" class="font-semibold text-gray-800 break-all"></div>
                        <div id="fileSize" class="text-sm text-gray-500"></div>
                    </div>
                    <button class="text-red-500 hover:text-red-700" onclick="removeFile()">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <button id="submitBtn" disabled 
                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-lg transition-all duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed"
                onclick="submitPayment()">
                Kirim Bukti Pembayaran
            </button>
        </div>
    </div>
</div>

<script>
    let uploadedFile = null;

    function copyAccountNumber(event) {
        const accountNumber = '1234567890';
        
        // Create a temporary input element
        const tempInput = document.createElement('input');
        tempInput.value = accountNumber;
        document.body.appendChild(tempInput);
        tempInput.select();
        
        try {
            // Execute copy command
            document.execCommand('copy');
            
            // Update button to show success
            const btn = event.currentTarget;
            const originalText = btn.innerText;
            btn.innerText = 'Tersalin';
            btn.classList.add('bg-green-600');
            
            setTimeout(() => {
                btn.innerText = originalText;
                btn.classList.remove('bg-green-600');
            }, 2000);
        } catch (err) {
            console.error('Failed to copy: ', err);
            Swal.fire({
                title: 'Gagal menyalin',
                text: 'Nomor rekening tidak dapat disalin. Silakan coba lagi.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#059669'
            });
        } finally {
            // Remove the temporary element
            document.body.removeChild(tempInput);
        }
    }

    function handleDragOver(e) {
        e.preventDefault();
    }

    function handleDragEnter(e) {
        e.preventDefault();
        e.currentTarget.classList.add('border-indigo-500', 'bg-indigo-50');
    }

    function handleDragLeave(e) {
        e.preventDefault();
        e.currentTarget.classList.remove('border-indigo-500', 'bg-indigo-50');
    }

    function handleDrop(e) {
        e.preventDefault();
        e.currentTarget.classList.remove('border-indigo-500', 'bg-indigo-50');
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
            Swal.fire({
                title: 'Format tidak didukung',
                text: 'Format file tidak didukung. Gunakan JPG, PNG, atau PDF.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#059669'
            });
            return;
        }

        if (file.size > maxSize) {
            Swal.fire({
                title: 'File terlalu besar',
                text: 'Ukuran file terlalu besar. Maksimal 5MB.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#059669'
            });
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
        uploadedFileDiv.classList.remove('hidden');
        uploadedFileDiv.classList.add('flex');
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
        document.getElementById('uploadedFile').classList.remove('flex');
        document.getElementById('fileInput').value = '';
        updateSubmitButton();
    }

    function updateSubmitButton() {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = !uploadedFile;
    }

    function submitPayment() {
        const booth_id = document.getElementById('booth_id').value;
        const nib = document.getElementById('company_nib').value;
        const npwp = document.getElementById('company_npwp').value;
        const address = document.getElementById('company_address').value;
        const pic = document.getElementById('company_pic').value;
        const position = document.getElementById('company_pic_position').value;
        const phone = document.getElementById('company_pic_phone').value;

        if (!uploadedFile) {
            Swal.fire({
                title: 'Error',
                text: 'Silakan upload bukti pembayaran terlebih dahulu',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#059669'
            });
            return;
        }
        if (!nib || !npwp || !address || !pic || !position || !phone) {
            Swal.fire({
                title: 'Data Tidak Lengkap',
                text: 'Mohon lengkapi semua data perusahaan yang diperlukan',
                icon: 'warning',
                confirmButtonText: 'OK',
                confirmButtonColor: '#059669'
            });
            return;
        }

        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="inline-block animate-spin mr-2">⏳</span> Mengirim...';

        // Kirim data pakai FormData
        const formData = new FormData();
        formData.append('booth_id', booth_id);
        formData.append('bukti_pembayaran', uploadedFile);
        formData.append('nib', nib);
        formData.append('npwp', npwp);
        formData.append('address', address);
        formData.append('pic', pic);
        formData.append('pic_position', position);
        formData.append('pic_phone', phone);

        fetch('{{ route('company.transaksi.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(async response => {
            const data = await response.json();
            if (response.ok && data.success) {
                Swal.fire({
                    title: 'Berhasil',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#059669'
                }).then(() => {
                    window.location.href = '{{ route("company.dashboard") }}';
                });
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Gagal',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#059669'
            });
            submitBtn.disabled = false;
            submitBtn.innerText = 'Kirim Bukti Pembayaran';
        });
    }
</script>
@endsection