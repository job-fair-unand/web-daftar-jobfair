<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Sponsor</title>
    <link rel="icon" href="/assets/icons/aceed.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
        
        .table-container::-webkit-scrollbar {
            height: 8px;
        }
        .table-container::-webkit-scrollbar-track {
            background: linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%);
        }
        .table-container::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            border-radius: 4px;
        }
        .table-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #f59e0b 0%, #16a34a 100%);
        }
        
        .modal-header {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            color: white;
        }
        
        .benefit-table {
            background: rgba(255, 255, 255, 0.95);
        }
        
        .benefit-table thead {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            color: white;
        }
        
        .benefit-table tbody tr:nth-child(odd) {
            background: rgba(251, 191, 36, 0.1);
        }
        
        .benefit-table tbody tr:nth-child(even) {
            background: rgba(34, 197, 94, 0.1);
        }
        
        .category-row {
            background: linear-gradient(135deg, #92400e 0%, #166534 100%) !important;
            color: white !important;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .info-icon {
            background: linear-gradient(135deg, #fbbf24 0%, #22c55e 100%);
            color: white;
            border-radius: 50%;
            padding: 4px;
            transition: all 0.3s ease;
        }
        
        .info-icon:hover {
            transform: scale(1.1) rotate(15deg);
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.4);
        }
        
        .success-border {
            border-color: #22c55e !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1) !important;
        }
        
        .error-border {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }
        
        .upload-success {
            border-color: #22c55e !important;
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
    </style>
     @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-10 main-container rounded-2xl p-8">
            <h1 class="text-4xl font-bold header-gradient mb-4 floating-icon">
                Registrasi Sponsor
            </h1>
            <p class="text-gray-700 text-lg">Bergabunglah sebagai sponsor dalam <span class="font-semibold text-amber-600">ACEED Universitas Andalas 2025</span></p>
        </div>
        
        <!-- Form Container -->
        <div class="form-container shadow-2xl rounded-2xl p-8">
            <form id="registrationForm" action="{{ route('sponsor.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium form-label mb-3">
                                Nama Perusahaan/Instansi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="w-full px-4 py-3 rounded-xl" 
                                   placeholder="Masukkan nama perusahaan" 
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
                                   class="w-full px-4 py-3 rounded-xl" 
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
                                   class="w-full px-4 py-3 rounded-xl" 
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
                                   class="w-full px-4 py-3 rounded-xl" 
                                   placeholder="Masukkan email aktif" 
                                   required>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="sponsor_package" class="flex items-center text-sm font-medium form-label mb-3">
                                <span>Paket Sponsorship <span class="text-red-500">*</span></span>
                                <button type="button" id="infoIcon" class="ml-3 info-icon hover:text-white focus:outline-none" title="Lihat detail benefit paket">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </label>
                            <select id="sponsor_package" 
                                    name="sponsor_package" 
                                    required 
                                    class="w-full px-4 py-3 rounded-xl">
                                <option value="">Pilih Paket</option>
                                <option value="platinum" {{ old('sponsor_package') == 'platinum' ? 'selected' : '' }}>Platinum</option>
                                <option value="gold" {{ old('sponsor_package') == 'gold' ? 'selected' : '' }}>Gold</option>
                                <option value="silver" {{ old('sponsor_package') == 'silver' ? 'selected' : '' }}>Silver</option>
                                <option value="bronze" {{ old('sponsor_package') == 'bronze' ? 'selected' : '' }}>Bronze</option>
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
                                    <div class="mx-auto w-16 h-16 bg-gradient-to-br from-amber-400 to-green-500 rounded-full flex items-center justify-center mb-4 floating-icon">
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
                            <label for="wish_for_event" class="block text-sm font-medium form-label mb-3">
                                Harapan untuk Acara <span class="text-red-500">*</span>
                            </label>
                            <textarea id="wish_for_event" 
                                      name="wish_for_event" 
                                      rows="4" 
                                      class="w-full px-4 py-3 rounded-xl resize-none" 
                                      placeholder="Tuliskan harapan atau tujuan Anda berpartisipasi... " 
                                      required>{{ old('wish_for_event') }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="pt-6">
                    <button type="submit" class="btn-primary w-full py-4 px-6 rounded-xl font-semibold text-lg transition duration-300">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Benefit Modal -->
    <div id="benefitModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden p-4 z-50">
        <div class="bg-white rounded-2xl shadow-2xl max-w-6xl w-full max-h-[90vh] flex flex-col overflow-hidden">
            <div class="modal-header flex justify-between items-center p-6">
                <h3 class="text-2xl font-bold">Detail Benefit Paket Sponsorship</h3>
                <button id="closeBenefitModalBtn" class="text-white hover:text-gray-200 text-3xl font-bold transition-colors">&times;</button>
            </div>
            <div class="p-6 overflow-y-auto table-container">
                <table class="benefit-table min-w-full border-collapse text-sm rounded-xl overflow-hidden">
                    <thead>
                        <tr>
                            <th class="p-4 text-left font-bold">BENEFIT</th>
                            <th class="p-4 text-center font-bold">PLATINUM</th>
                            <th class="p-4 text-center font-bold">GOLD</th>
                            <th class="p-4 text-center font-bold">SILVER</th>
                            <th class="p-4 text-center font-bold">BRONZE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="category-row"><td colspan="5" class="p-3 font-bold text-left">BRANDING</td></tr>
                        <tr><td class="p-3 text-left">Booth</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td></tr>
                        <tr><td class="p-3 text-left">Promosi di Sosial Media</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td></tr>
                        
                        <tr class="category-row"><td colspan="5" class="p-3 font-bold text-left">LOGO PLACEMENT</td></tr>
                        <tr><td class="p-3 text-left">Event Marketing Kit</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td></tr>
                        <tr><td class="p-3 text-left">Pre-Event Landing Page</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td></tr>
                        <tr><td class="p-3 text-left">D-Day Home Page</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td></tr>
                        <tr><td class="p-3 text-left">Thank You Email</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td></tr>
                        <tr><td class="p-3 text-left">ACEED Promotional Video</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td></tr>
                        
                        <tr class="category-row"><td colspan="5" class="p-3 font-bold text-left">ACARA LAINNYA</td></tr>
                        <tr><td class="p-3 text-left">Campus Hiring</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td></tr>
                        <tr><td class="p-3 text-left">Webinar</td><td class="p-3 text-center">3x</td><td class="p-3 text-center">2x</td><td class="p-3 text-center">1x</td><td class="p-3 text-center">1x</td></tr>
                        <tr><td class="p-3 text-left">Seminar</td><td class="p-3 text-center">2x</td><td class="p-3 text-center">1x</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td></tr>
                        <tr><td class="p-3 text-left">Exclusive Company Session</td><td class="p-3 text-center">2x</td><td class="p-3 text-center">1x</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td></tr>
                        <tr><td class="p-3 text-left">Candidate Screening</td><td class="p-3 text-center">Unlimited</td><td class="p-3 text-center">Unlimited</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td></tr>
                        <tr><td class="p-3 text-left">Special Opening Speech</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td></tr>
                        
                        <tr class="category-row"><td colspan="5" class="p-3 font-bold text-left">MISCELLANEOUS</td></tr>
                        <tr><td class="p-3 text-left">Job Applicant Database</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">❌</td><td class="p-3 text-center">❌</td></tr>
                        <tr><td class="p-3 text-left">Plakat</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td></tr>
                        <tr><td class="p-3 text-left">Konsumsi</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td><td class="p-3 text-center">✅</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registrationForm');
            const benefitModal = document.getElementById('benefitModal');
            const infoIcon = document.getElementById('infoIcon');
            const closeBenefitModalBtn = document.getElementById('closeBenefitModalBtn');
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
                
                submitBtn.textContent = '⏳ Mengirim...';
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
                            text: data.message || 'Pendaftaran sponsor Anda telah berhasil dikirim!',
                            confirmButtonColor: '#22c55e',
                            background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                        }).then(() => {
                            form.reset();
                            resetFileUpload();
                            window.location.href = data.redirect || '/';
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

            // Benefit Modal functionality
            infoIcon.addEventListener('click', () => {
                benefitModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            closeBenefitModalBtn.addEventListener('click', () => {
                benefitModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Close modal when clicking outside
            benefitModal.addEventListener('click', (e) => {
                if (e.target === benefitModal) {
                    benefitModal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });

            // Form input validation feedback
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    if (input.checkValidity()) {
                        input.classList.add('success-border');
                        input.classList.remove('error-border');
                    } else {
                        input.classList.add('error-border');
                        input.classList.remove('success-border');
                    }
                });

                input.addEventListener('blur', () => {
                    if (!input.value) {
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
                } else {
                    emailInput.classList.add('error-border');
                    emailInput.classList.remove('success-border');
                }
            });
        });
    </script>
</body>
</html>