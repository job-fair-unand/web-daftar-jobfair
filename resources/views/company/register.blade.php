<!-- filepath: resources/views/company/register.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Daftarkan perusahaan Anda untuk Job Fair Universitas Andalas 2025.">
    <link rel="icon" href="/assets/icons/aceed.png">
    <title>Daftar Perusahaan - Job Fair Universitas Andalas 2025</title>

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

        .back-btn {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.1) 0%, rgba(34, 197, 94, 0.1) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 215, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.2) 0%, rgba(34, 197, 94, 0.2) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.2);
        }

        /* Fix untuk hidden file input */
        .logo-input-wrapper {
            position: relative;
            display: block;
        }
        
        .logo-input-wrapper input[type="file"] {
            position: absolute;
            left: -9999px;
            opacity: 0;
            pointer-events: none;
        }
    </style>
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="absolute top-6 left-6 z-50">
        <a href="{{ route('home') }}" class="back-btn group flex items-center space-x-2 px-4 py-2 rounded-xl text-gray-700 hover:text-green-600">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span class="font-semibold">Kembali</span>
        </a>
    </div>

    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-10 main-container rounded-2xl p-8">
            <h1 class="text-4xl font-bold header-gradient mb-4">
                Registrasi Perusahaan
            </h1>
            <p class="text-gray-700 text-lg">Bergabunglah dengan <span class="font-semibold text-amber-600">ACEED Universitas Andalas 2025</span> sebagai perusahaan partner</p>
        </div>
        
        <!-- Form Container -->
        <div class="form-container shadow-2xl rounded-2xl p-8">
            <form id="registrationForm" action="{{ route('register.company.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8" novalidate>
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium form-label mb-3">
                                Nama Perusahaan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="form-input w-full px-4 py-3 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-300" 
                                   placeholder="Masukkan nama perusahaan" 
                                   required>
                            <div class="error-message text-red-500 text-xs mt-1 hidden" id="name-error"></div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium form-label mb-3">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   class="form-input w-full px-4 py-3 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-300" 
                                   placeholder="Masukkan email" 
                                   required>
                            <div class="error-message text-red-500 text-xs mt-1 hidden" id="email-error"></div>
                        </div>
                        
                        <div>
                            <label for="address" class="block text-sm font-medium form-label mb-3">
                                Alamat Perusahaan <span class="text-red-500">*</span>
                            </label>
                            <textarea id="address" 
                                      name="address" 
                                      rows="3"
                                      class="form-input w-full px-4 py-3 rounded-xl resize-none focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-300" 
                                      placeholder="Masukkan alamat lengkap perusahaan" 
                                      required>{{ old('address') }}</textarea>
                            <div class="error-message text-red-500 text-xs mt-1 hidden" id="address-error"></div>
                        </div>
                        
                        <div>
                            <label for="phone_number" class="block text-sm font-medium form-label mb-3">
                                Nomor WhatsApp Contact Person <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-500 font-medium">+62</span>
                                </div>
                                <input type="text" 
                                    id="phone_number" 
                                    name="phone_number" 
                                    value="{{ old('phone_number') }}"
                                    class="form-input w-full pl-14 pr-4 py-3 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-300" 
                                    placeholder="8123456789" 
                                    pattern="[0-9]{9,13}"
                                    title="Masukkan nomor telepon tanpa +62, contoh: 8123456789"
                                    required>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Format: +62 diikuti nomor tanpa 0 di depan</p>
                            <div class="error-message text-red-500 text-xs mt-1 hidden" id="phone-error"></div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium form-label mb-3">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="password" 
                                    id="password" 
                                    name="password" 
                                    class="form-input w-full px-4 py-3 pr-12 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-300" 
                                    placeholder="Masukkan password" 
                                    minlength="8"
                                    required>
                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-green-600">
                                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    <svg id="eyeOffIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2 text-xs text-gray-600">
                                <p>Password harus minimal 8 karakter dan mengandung:</p>
                                <ul class="list-disc list-inside mt-1 space-y-1">
                                    <li id="length-check" class="text-red-500">Minimal 8 karakter</li>
                                    <li id="uppercase-check" class="text-red-500">Huruf besar (A-Z)</li>
                                    <li id="lowercase-check" class="text-red-500">Huruf kecil (a-z)</li>
                                    <li id="number-check" class="text-red-500">Angka (0-9)</li>
                                </ul>
                            </div>
                            <div class="error-message text-red-500 text-xs mt-1 hidden" id="password-error"></div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium form-label mb-3">
                                Konfirmasi Password <span class="text-red-500">*</span>
                            </label>
                            <input type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                class="form-input w-full px-4 py-3 rounded-xl focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-300" 
                                placeholder="Masukkan ulang password" 
                                required>
                            <p id="password-match" class="text-xs mt-1 hidden"></p>
                            <div class="error-message text-red-500 text-xs mt-1 hidden" id="password-confirmation-error"></div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Logo upload field -->
                        <div>
                            <label for="logo-label" class="flex items-center text-sm font-medium form-label mb-3">
                                <span>Upload Logo Perusahaan <span class="text-red-500">*</span></span>
                            </label>
                            
                            <!-- Custom file upload wrapper -->
                            <div class="logo-input-wrapper">
                                <input type="file" 
                                       id="logo" 
                                       name="logo" 
                                       accept="image/jpeg,image/jpg,image/png"
                                       data-required="true">
                                
                                <div id="logoUploadArea" class="upload-area rounded-xl p-6 text-center">
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
                            <div class="error-message text-red-500 text-xs mt-1 hidden" id="logo-error"></div>
                        </div>

                        <!-- Info Box untuk Perusahaan -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-200 rounded-xl p-6">
                            <div class="flex items-start space-x-3">
                                <div class="mx-auto w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-blue-800 mb-2">Manfaat Bergabung</h4>
                                    <ul class="text-sm text-blue-700 space-y-2">
                                        <li class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Akses ke ribuan calon karyawan berkualitas</span>
                                        </li>
                                        <li class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Platform rekrutmen yang efektif</span>
                                        </li>
                                        <li class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Branding perusahaan di universitas</span>
                                        </li>
                                        <li class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Networking dengan perusahaan lain</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Info Login -->
                        <div class="bg-gradient-to-br from-amber-50 to-yellow-100 border border-amber-200 rounded-xl p-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-semibold text-amber-800 mb-1">Info Penting</h4>
                                    <ul class="text-xs text-amber-700 space-y-1">
                                        <li>• Email verifikasi akan dikirim setelah pendaftaran</li>
                                        <li>• Logo akan ditampilkan di profil perusahaan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="pt-6">
                    <button type="submit" class="btn-primary w-full py-4 px-6 rounded-xl font-semibold text-lg transition duration-300">
                        Daftar Sebagai Perusahaan Partner
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center pt-4">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun perusahaan? 
                        <a href="{{ route('login') }}" class="font-semibold text-green-600 hover:text-green-700 transition-colors duration-200">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registrationForm');
            const logoInput = document.getElementById('logo');
            const uploadArea = document.getElementById('logoUploadArea');
            const uploadPlaceholder = document.getElementById('uploadPlaceholder');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            const fileName = document.getElementById('fileName');
            const removeImageBtn = document.getElementById('removeImage');
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOffIcon = document.getElementById('eyeOffIcon');

            // Variable untuk track apakah logo sudah dipilih
            let logoSelected = false;

            // Password toggle
            togglePassword.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                eyeIcon.classList.toggle('hidden');
                eyeOffIcon.classList.toggle('hidden');
            });

            const passwordConfirmation = document.getElementById('password_confirmation');
            const lengthCheck = document.getElementById('length-check');
            const uppercaseCheck = document.getElementById('uppercase-check');
            const lowercaseCheck = document.getElementById('lowercase-check');
            const numberCheck = document.getElementById('number-check');
            const passwordMatch = document.getElementById('password-match');

            // Password validation
            passwordInput.addEventListener('input', (e) => {
                const password = e.target.value;
                
                // Length check
                if (password.length >= 8) {
                    lengthCheck.classList.remove('text-red-500');
                    lengthCheck.classList.add('text-green-500');
                } else {
                    lengthCheck.classList.remove('text-green-500');
                    lengthCheck.classList.add('text-red-500');
                }
                
                // Uppercase check
                if (/[A-Z]/.test(password)) {
                    uppercaseCheck.classList.remove('text-red-500');
                    uppercaseCheck.classList.add('text-green-500');
                } else {
                    uppercaseCheck.classList.remove('text-green-500');
                    uppercaseCheck.classList.add('text-red-500');
                }
                
                // Lowercase check
                if (/[a-z]/.test(password)) {
                    lowercaseCheck.classList.remove('text-red-500');
                    lowercaseCheck.classList.add('text-green-500');
                } else {
                    lowercaseCheck.classList.remove('text-green-500');
                    lowercaseCheck.classList.add('text-red-500');
                }
                
                // Number check
                if (/[0-9]/.test(password)) {
                    numberCheck.classList.remove('text-red-500');
                    numberCheck.classList.add('text-green-500');
                } else {
                    numberCheck.classList.remove('text-green-500');
                    numberCheck.classList.add('text-red-500');
                }
            });

            // Password confirmation check
            passwordConfirmation.addEventListener('input', (e) => {
                const password = passwordInput.value;
                const confirmation = e.target.value;
                
                if (confirmation.length > 0) {
                    passwordMatch.classList.remove('hidden');
                    if (password === confirmation) {
                        passwordMatch.textContent = 'Password cocok';
                        passwordMatch.classList.remove('text-red-500');
                        passwordMatch.classList.add('text-green-500');
                    } else {
                        passwordMatch.textContent = 'Password tidak cocok';
                        passwordMatch.classList.remove('text-green-500');
                        passwordMatch.classList.add('text-red-500');
                    }
                } else {
                    passwordMatch.classList.add('hidden');
                }
            });

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
                        title: 'Format File Salah',
                        text: 'Hanya file gambar yang diperbolehkan!',
                        confirmButtonColor: '#22c55e',
                        background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                    });
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'File Terlalu Besar',
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
                    logoSelected = true;
                    
                    // Clear error jika ada
                    clearFieldError('logo');
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
                logoSelected = false;
            }

            // Phone number formatting
            const phoneInput = document.getElementById('phone_number');
            phoneInput.addEventListener('input', (e) => {
                let value = e.target.value.replace(/[^0-9]/g, '');
                
                if (value.startsWith('0')) {
                    value = value.substring(1);
                }

                if (value.length > 13) {
                    value = value.substring(0, 13);
                }

                e.target.value = value;
                
                if (value.length >= 9 && value.length <= 13) {
                    phoneInput.classList.add('success-border');
                    phoneInput.classList.remove('error-border');
                    clearFieldError('phone');
                } else if (value.length > 0) {
                    phoneInput.classList.add('error-border');
                    phoneInput.classList.remove('success-border');
                } else {
                    phoneInput.classList.remove('success-border', 'error-border');
                }
            });

            // Helper function untuk clear error
            function clearFieldError(fieldName) {
                const errorElement = document.getElementById(fieldName + '-error');
                if (errorElement) {
                    errorElement.classList.add('hidden');
                    errorElement.textContent = '';
                }
            }

            // Helper function untuk show error
            function showFieldError(fieldName, message) {
                const errorElement = document.getElementById(fieldName + '-error');
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.classList.remove('hidden');
                }
            }

            // Custom form validation
            function validateForm() {
                let isValid = true;
                
                // Clear semua error sebelumnya
                const errorElements = document.querySelectorAll('.error-message');
                errorElements.forEach(el => {
                    el.classList.add('hidden');
                    el.textContent = '';
                });

                // Validate nama
                const name = document.getElementById('name').value.trim();
                if (!name) {
                    showFieldError('name', 'Nama perusahaan wajib diisi');
                    isValid = false;
                }

                // Validate email
                const email = document.getElementById('email').value.trim();
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!email) {
                    showFieldError('email', 'Email wajib diisi');
                    isValid = false;
                } else if (!emailPattern.test(email)) {
                    showFieldError('email', 'Format email tidak valid');
                    isValid = false;
                }

                // Validate address
                const address = document.getElementById('address').value.trim();
                if (!address) {
                    showFieldError('address', 'Alamat wajib diisi');
                    isValid = false;
                }

                // Validate phone
                const phone = phoneInput.value.trim();
                if (!phone) {
                    showFieldError('phone', 'Nomor telepon wajib diisi');
                    isValid = false;
                } else if (phone.length < 9 || phone.length > 13) {
                    showFieldError('phone', 'Nomor telepon harus 9-13 digit');
                    isValid = false;
                }

                // Validate password
                const password = passwordInput.value;
                const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
                if (!password) {
                    showFieldError('password', 'Password wajib diisi');
                    isValid = false;
                } else if (password.length < 8) {
                    showFieldError('password', 'Password minimal 8 karakter');
                    isValid = false;
                } else if (!passwordPattern.test(password)) {
                    showFieldError('password', 'Password harus mengandung huruf besar, kecil, dan angka');
                    isValid = false;
                }

                // Validate password confirmation
                const passwordConfirm = passwordConfirmation.value;
                if (!passwordConfirm) {
                    showFieldError('password-confirmation', 'Konfirmasi password wajib diisi');
                    isValid = false;
                } else if (password !== passwordConfirm) {
                    showFieldError('password-confirmation', 'Konfirmasi password tidak cocok');
                    isValid = false;
                }

                // Validate logo
                if (!logoSelected) {
                    showFieldError('logo', 'Logo perusahaan wajib diupload');
                    isValid = false;
                }

                return isValid;
            }

            // Form submission with SweetAlert
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                // Validate form terlebih dahulu
                if (!validateForm()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Form Tidak Lengkap',
                        text: 'Silakan lengkapi semua field yang diperlukan!',
                        confirmButtonColor: '#22c55e',
                        background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                    });
                    return;
                }
                
                const formData = new FormData(form);
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;

                // Add +62 to phone number
                const phoneValue = phoneInput.value;
                if (phoneValue && !phoneValue.startsWith('+62')) {
                    formData.set('phone_number', '+62' + phoneValue);
                }       
                
                // Show loading
                Swal.fire({
                    title: 'Memproses Pendaftaran...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)',
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                submitBtn.textContent = 'Memproses...';
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
                            title: 'Pendaftaran Berhasil!',
                            html: `
                                <div class="text-center">
                                    <p class="mb-4">${data.message}</p>
                                    <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                                        <div class="text-sm text-green-800">
                                            <strong>Detail Pendaftaran:</strong><br>
                                            <span class="text-green-600">• Nama: ${data.data.name}</span><br>
                                            <span class="text-green-600">• Email: ${data.data.email}</span><br>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600">
                                        Anda akan dialihkan ke halaman verifikasi email.
                                    </p>
                                </div>
                            `,
                            confirmButtonText: 'Lanjutkan',
                            confirmButtonColor: '#22c55e',
                            background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                        }).then(() => {
                            window.location.href = data.redirect;
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
                                title: 'Terjadi Kesalahan',
                                html: errorMessages.join('<br>'),
                                confirmButtonColor: '#22c55e',
                                background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
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
                        title: 'Koneksi Bermasalah',
                        text: 'Terjadi kesalahan jaringan. Silakan coba lagi nanti!',
                        confirmButtonColor: '#22c55e',
                        background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                    });
                    console.error('Error:', error);
                });
            });

            // Form input validation feedback
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                if (input.type !== 'file') { // Skip file input
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
                        if (!input.value.trim() && input.hasAttribute('required')) {
                            input.classList.add('error-border');
                            input.classList.remove('success-border');
                        }
                    });
                }
            });

            // Email input validation feedback
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('input', () => {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailPattern.test(emailInput.value)) {
                    emailInput.classList.add('success-border');
                    emailInput.classList.remove('error-border');
                    clearFieldError('email');
                } else if (emailInput.value.trim() !== '') {
                    emailInput.classList.add('error-border');
                    emailInput.classList.remove('success-border');
                }
            });

            // Show server-side messages with SweetAlert
            @if ($errors->any())
                let errorMessages = [
                    @foreach ($errors->all() as $error)
                        '{{ $error }}',
                    @endforeach
                ];
                
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    html: errorMessages.join('<br>'),
                    confirmButtonColor: '#22c55e',
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#22c55e',
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#22c55e',
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                });
            @endif
        });
    </script>
</body>
</html>