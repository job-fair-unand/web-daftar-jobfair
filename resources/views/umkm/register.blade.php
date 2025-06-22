<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi UMKM</title>
    <link rel="icon" href="/assets/icons/aceed.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            background: linear-gradient(135deg, #f7f3d0 0%, #e8f5e8 50%, #faf5e4 100%);
            min-height: 100vh;
        }
        
        .main-container {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, rgba(34, 197, 94, 0.1) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 215, 0, 0.2);
        }
        
        .header-gradient {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 215, 0, 0.3);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Input Styling */
        .form-input {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #fbbf24, #22c55e) border-box;
            transition: all 0.3s ease;
            outline: none;
        }
        
        .form-input:focus {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #f59e0b, #16a34a) border-box;
            box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.2);
        }
        
        .form-input:hover {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #f59e0b, #16a34a) border-box;
        }
        
        .upload-area {
            border: 2px dashed #fbbf24;
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.1) 0%, rgba(34, 197, 94, 0.1) 100%);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .upload-area:hover {
            border-color: #22c55e;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(251, 191, 36, 0.15) 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .upload-area.dragover {
            border-color: #16a34a;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(251, 191, 36, 0.2) 100%);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(251, 191, 36, 0.3);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #f59e0b 0%, #16a34a 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px 0 rgba(251, 191, 36, 0.4);
        }
        
        .form-label {
            background: linear-gradient(135deg, #92400e 0%, #166534 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
        }
        
        .success-border {
            border: 2px solid transparent !important;
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #22c55e, #10b981) border-box !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2) !important;
        }
        
        .error-border {
            border: 2px solid transparent !important;
            background: linear-gradient(white, white) padding-box, 
                        linear-gradient(135deg, #ef4444, #dc2626) border-box !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2) !important;
        }
        
        .upload-success {
            border: 2px dashed #22c55e !important;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(251, 191, 36, 0.1) 100%) !important;
        }
        
        .preview-container {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            padding: 4px;
            border-radius: 12px;
        }
        
        .remove-btn {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            transition: all 0.3s ease;
        }
        
        .remove-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }
        
        .business-type-icon {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            color: white;
            border-radius: 50%;
            padding: 4px;
            transition: all 0.3s ease;
        }
        
        .business-type-icon:hover {
            transform: scale(1.1) rotate(15deg);
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.4);
        }
    </style>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-10 main-container rounded-2xl p-8">
            <h1 class="text-4xl font-bold header-gradient mb-4">
                Registrasi UMKM
            </h1>
            <p class="text-gray-700 text-lg">Bergabunglah dengan <span class="font-semibold text-amber-600">ACEED Universitas Andalas 2025</span> sebagai UMKM partner</p>
        </div>
        
        <!-- Form Container -->
        <div class="form-container shadow-2xl rounded-2xl p-8">
            <form id="registrationForm" action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium form-label mb-3">
                                Nama UMKM <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="form-input w-full px-4 py-3 rounded-xl" 
                                   placeholder="Masukkan nama UMKM" 
                                   required>
                        </div>
                        
                        <div>
                            <label for="address" class="block text-sm font-medium form-label mb-3">
                                Alamat <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="address" 
                                   name="address" 
                                   value="{{ old('address') }}"
                                   class="form-input w-full px-4 py-3 rounded-xl" 
                                   placeholder="Masukkan alamat lengkap" 
                                   required>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium form-label mb-3">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   class="form-input w-full px-4 py-3 rounded-xl" 
                                   placeholder="Contoh: 08123456789" 
                                   required>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium form-label mb-3">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   class="form-input w-full px-4 py-3 rounded-xl" 
                                   placeholder="Masukkan email aktif" 
                                   required>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="type" class="flex items-center text-sm font-medium form-label mb-3">
                                <span>Bidang UMKM <span class="text-red-500">*</span></span>
                                <button type="button" id="typeInfoIcon" class="ml-3 business-type-icon hover:text-white focus:outline-none" title="Informasi bidang UMKM">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </label>
                            <select id="type" 
                                    name="type" 
                                    required 
                                    class="form-input w-full px-4 py-3 rounded-xl">
                                <option value="">Pilih Bidang UMKM</option>
                                <option value="kuliner" {{ old('type') == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                                <option value="fashion" {{ old('type') == 'fashion' ? 'selected' : '' }}>Fashion & Tekstil</option>
                                <option value="kerajinan" {{ old('type') == 'kerajinan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                                <option value="teknologi" {{ old('type') == 'teknologi' ? 'selected' : '' }}>Teknologi & Digital</option>
                                <option value="pertanian" {{ old('type') == 'pertanian' ? 'selected' : '' }}>Pertanian & Perkebunan</option>
                                <option value="jasa" {{ old('type') == 'jasa' ? 'selected' : '' }}>Jasa</option>
                                <option value="lainnya" {{ old('type') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                        
                        <!-- Logo upload field -->
                        <div>
                            <label for="logo" class="block text-sm font-medium form-label mb-3">
                                Upload Logo <span class="text-red-500">*</span>
                            </label>
                            <div id="logoUploadArea" class="upload-area rounded-xl p-6 text-center">
                                <input type="file" id="logo" name="logo" class="hidden" accept="image/*" required>
                                
                                <!-- Upload placeholder -->
                                <div id="uploadPlaceholder">
                                    <div class="mx-auto w-16 h-16 bg-gradient-to-br from-amber-400 to-green-500 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-700 mb-2">Klik untuk upload atau drag & drop</p>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG (max. 2MB)</p>
                                </div>
                                
                                <!-- Image preview -->
                                <div id="imagePreview" class="hidden">
                                    <div class="relative inline-block preview-container">
                                        <img id="previewImg" src="" alt="Preview" class="mx-auto h-24 w-24 object-cover rounded-lg">
                                        <button type="button" id="removeImage" class="absolute -top-2 -right-2 remove-btn text-white rounded-full w-7 h-7 flex items-center justify-center text-sm font-bold">
                                            ×
                                        </button>
                                    </div>
                                    <p id="fileName" class="text-sm text-gray-600 mt-3 font-medium"></p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label for="description" class="block text-sm font-medium form-label mb-3">
                                Deskripsi UMKM <span class="text-red-500">*</span>
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="4" 
                                      class="form-input w-full px-4 py-3 rounded-xl resize-none" 
                                      placeholder="Deskripsikan produk/jasa UMKM Anda..." 
                                      required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="pt-6">
                    <button type="submit" class="btn-primary w-full py-4 px-6 rounded-xl font-semibold text-lg transition duration-300">
                        Daftar Sebagai UMKM Partner
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Business Type Info Modal -->
    <div id="businessTypeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden p-4 z-50">
        <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] flex flex-col overflow-hidden">
            <div class="flex justify-between items-center p-6 bg-gradient-to-r from-amber-400 to-green-500 text-white">
                <h3 class="text-2xl font-bold">Informasi Bidang UMKM</h3>
                <button id="closeBusinessTypeModalBtn" class="text-white hover:text-gray-200 text-3xl font-bold transition-colors">&times;</button>
            </div>
            <div class="p-6 overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl border border-orange-200">
                        <h4 class="text-lg font-bold text-orange-800 mb-2">Kuliner</h4>
                        <p class="text-sm text-orange-700">Usaha makanan dan minuman, restoran, catering, produk olahan makanan lokal dan tradisional.</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                        <h4 class="text-lg font-bold text-purple-800 mb-2">Fashion & Tekstil</h4>
                        <p class="text-sm text-purple-700">Produksi pakaian, aksesoris, tas, sepatu, dan produk tekstil lainnya dengan desain lokal.</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-pink-50 to-pink-100 p-4 rounded-xl border border-pink-200">
                        <h4 class="text-lg font-bold text-pink-800 mb-2">Kerajinan Tangan</h4>
                        <p class="text-sm text-pink-700">Produk seni dan kerajinan seperti ukiran, anyaman, batik, keramik, dan souvenir tradisional.</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                        <h4 class="text-lg font-bold text-blue-800 mb-2">Teknologi & Digital</h4>
                        <p class="text-sm text-blue-700">Usaha berbasis teknologi seperti aplikasi mobile, e-commerce, digital marketing, dan IT services.</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                        <h4 class="text-lg font-bold text-green-800 mb-2">Pertanian & Perkebunan</h4>
                        <p class="text-sm text-green-700">Produk pertanian organik, hasil perkebunan, pupuk organik, dan teknologi pertanian modern.</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-4 rounded-xl border border-indigo-200">
                        <h4 class="text-lg font-bold text-indigo-800 mb-2">Jasa</h4>
                        <p class="text-sm text-indigo-700">Layanan konsultasi, pendidikan, kesehatan, kecantikan, transportasi, dan jasa profesional lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registrationForm');
            const businessTypeModal = document.getElementById('businessTypeModal');
            const typeInfoIcon = document.getElementById('typeInfoIcon');
            const closeBusinessTypeModalBtn = document.getElementById('closeBusinessTypeModalBtn');
            const logoInput = document.getElementById('logo');
            const uploadArea = document.getElementById('logoUploadArea');
            const uploadPlaceholder = document.getElementById('uploadPlaceholder');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            const fileName = document.getElementById('fileName');
            const removeImageBtn = document.getElementById('removeImage');

            // File upload functionality
            uploadArea.addEventListener('click', () => logoInput.click());

            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });

            uploadArea.addEventListener('dragleave', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    handleFile(files[0]);
                }
            });

            logoInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    handleFile(e.target.files[0]);
                }
            });

            removeImageBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                resetFileUpload();
            });

            function handleFile(file) {
                if (!file.type.startsWith('image/')) {
                    Swal.fire({
                        icon: 'error',
                        title: '❌ Format File Salah',
                        text: 'Hanya file gambar yang diperbolehkan!',
                        confirmButtonColor: '#22c55e',
                        background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                    });
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: '📏 File Terlalu Besar',
                        text: 'Ukuran file maksimal 2MB!',
                        confirmButtonColor: '#22c55e',
                        background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                    });
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImg.src = e.target.result;
                    fileName.textContent = file.name;
                    uploadPlaceholder.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                    uploadArea.classList.add('upload-success');
                };
                reader.readAsDataURL(file);

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                logoInput.files = dataTransfer.files;
            }

            function resetFileUpload() {
                logoInput.value = '';
                uploadPlaceholder.classList.remove('hidden');
                imagePreview.classList.add('hidden');
                uploadArea.classList.remove('upload-success');
            }

            // Form submission with SweetAlert
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                const formData = new FormData(form);
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                
                // Show loading
                Swal.fire({
                    title: '⏳ Memproses Pendaftaran...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)',
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                submitBtn.textContent = '⏳ Memproses...';
                submitBtn.disabled = true;
                
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    Swal.close();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '🎉 Pendaftaran Berhasil!',
                            text: data.message || 'Pendaftaran UMKM Anda telah berhasil dikirim!',
                            confirmButtonColor: '#22c55e',
                            background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                        }).then(() => {
                            form.reset();
                            resetFileUpload();
                            window.location.href = data.redirect || '/';
                        });
                    } else {
                        if (data.errors) {
                            let errorMessages = [];
                            Object.values(data.errors).forEach(messages => {
                                if (Array.isArray(messages)) {
                                    errorMessages = errorMessages.concat(messages);
                                } else {
                                    errorMessages.push(messages);
                                }
                            });
                            
                            Swal.fire({
                                icon: 'error',
                                title: '❌ Terjadi Kesalahan',
                                html: errorMessages.join('<br>'),
                                confirmButtonColor: '#22c55e',
                                background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '❌ Terjadi Kesalahan',
                                text: data.message || 'Silakan periksa kembali data yang Anda masukkan!',
                                confirmButtonColor: '#22c55e',
                                background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                            });
                        }
                    }
                })
                .catch(error => {
                    Swal.close();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    Swal.fire({
                        icon: 'error',
                        title: '❌ Koneksi Bermasalah',
                        text: 'Terjadi kesalahan jaringan. Silakan coba lagi nanti!',
                        confirmButtonColor: '#22c55e',
                        background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                    });
                    console.error('Error:', error);
                });
            });

            // Business Type Modal functionality
            typeInfoIcon.addEventListener('click', () => {
                businessTypeModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            closeBusinessTypeModalBtn.addEventListener('click', () => {
                businessTypeModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Close modal when clicking outside
            businessTypeModal.addEventListener('click', (e) => {
                if (e.target === businessTypeModal) {
                    businessTypeModal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });

            // Form input validation feedback
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    if (input.checkValidity() && input.value.trim() !== '') {
                        input.classList.add('success-border');
                        input.classList.remove('error-border');
                    } else {
                        input.classList.remove('success-border');
                        input.classList.remove('error-border');
                    }
                });

                input.addEventListener('blur', () => {
                    if (!input.value.trim()) {
                        input.classList.add('error-border');
                        input.classList.remove('success-border');
                    }
                });
            });

            // Phone input validation (only numbers)
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', (e) => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
            });

            // Email input validation feedback
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('input', () => {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailPattern.test(emailInput.value)) {
                    emailInput.classList.add('success-border');
                    emailInput.classList.remove('error-border');
                } else if (emailInput.value.trim() !== '') {
                    emailInput.classList.add('error-border');
                    emailInput.classList.remove('success-border');
                }
            });

            // Show server-side errors with SweetAlert if any
            @if ($errors->any())
                let errorMessages = [
                    @foreach ($errors->all() as $error)
                        '{{ $error }}',
                    @endforeach
                ];
                
                Swal.fire({
                    icon: 'error',
                    title: '❌ Terjadi Kesalahan',
                    html: errorMessages.join('<br>'),
                    confirmButtonColor: '#22c55e',
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                });
            @endif

            // Show success message if any
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '🎉 Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#22c55e',
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                });
            @endif

            // Show error message if any
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '❌ Terjadi Kesalahan',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#22c55e',
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                });
            @endif
        });
    </script>
</body>
</html>