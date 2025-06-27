<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Buat password baru untuk akun ACEED EXPO Universitas Andalas 2025.">
    <link rel="icon" href="/assets/icons/aceed.png">
    <title>Reset Password - ACEED EXPO Universitas Andalas 2025</title>

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
    </style>
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="absolute top-6 left-6 z-50">
        <a href="{{ route('login') }}" class="back-btn group flex items-center space-x-2 px-4 py-2 rounded-xl text-gray-700 hover:text-green-600">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span class="font-semibold">Kembali ke Login</span>
        </a>
    </div>

    <div class="max-w-md mx-auto">
        <!-- Header -->
        <div class="text-center mb-8 main-container rounded-2xl p-6">
            <!-- Logo/Icon -->
            <div class="mx-auto w-20 h-20 bg-gradient-to-br from-amber-400 to-green-500 rounded-full flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            
            <h1 class="text-3xl font-bold header-gradient mb-2">
                Buat Password Baru
            </h1>
            <p class="text-gray-600">Masukkan password baru untuk akun Anda</p>
        </div>
        
        <!-- Form Container -->
        <div class="form-container shadow-2xl rounded-2xl p-8">
            <!-- Security Notice -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-100 border border-green-200 rounded-xl p-4 mb-6">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-green-800 mb-1">Keamanan Terjamin</h4>
                        <p class="text-xs text-green-700">
                            Link reset password ini hanya berlaku sekali dan akan kedaluwarsa setelah digunakan untuk menjaga keamanan akun Anda.
                        </p>
                    </div>
                </div>
            </div>

            <form id="resetPasswordForm" action="{{ route('password.store') }}" method="POST" class="space-y-6" novalidate>
                @csrf
                
                <!-- Hidden token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                
                <!-- Email (readonly) -->
                <div>
                    <label for="email" class="block text-sm font-medium form-label mb-3">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', $request->email) }}"
                           class="form-input w-full px-4 py-3 rounded-xl bg-gray-50" 
                           readonly
                           >
                    <p class="text-xs text-gray-500 mt-1">Email ini tidak dapat diubah</p>
                    <div class="error-message text-red-500 text-xs mt-1 hidden" id="email-error"></div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium form-label mb-3">
                        Password Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="password" 
                            id="password" 
                            name="password" 
                            class="form-input w-full px-4 py-3 pr-12 rounded-xl" 
                            placeholder="Masukkan password baru" 
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
                        <p>Password harus memenuhi kriteria berikut:</p>
                        <ul class="list-disc list-inside mt-1 space-y-1">
                            <li id="length-check" class="text-red-500">Minimal 8 karakter</li>
                            <li id="uppercase-check" class="text-red-500">Huruf besar (A-Z)</li>
                            <li id="lowercase-check" class="text-red-500">Huruf kecil (a-z)</li>
                            <li id="number-check" class="text-red-500">Angka (0-9)</li>
                        </ul>
                    </div>
                    <div class="error-message text-red-500 text-xs mt-1 hidden" id="password-error"></div>
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium form-label mb-3">
                        Konfirmasi Password Baru <span class="text-red-500">*</span>
                    </label>
                    <input type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        class="form-input w-full px-4 py-3 rounded-xl" 
                        placeholder="Masukkan ulang password baru" 
                        required>
                    <p id="password-match" class="text-xs mt-1 hidden"></p>
                    <div class="error-message text-red-500 text-xs mt-1 hidden" id="password-confirmation-error"></div>
                </div>
                
                <div class="pt-4">
                    <button type="submit" class="btn-primary w-full py-3 px-6 rounded-xl font-semibold text-lg transition duration-300">
                        <span id="button-text">Reset Password</span>
                        <span id="loading-text" class="hidden">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memproses...
                        </span>
                    </button>
                </div>

                <!-- Additional Links -->
                <div class="text-center pt-4">
                    <p class="text-sm text-gray-600">
                        Ingat password lama Anda? 
                        <a href="{{ route('login') }}" class="font-semibold text-green-600 hover:text-green-700 transition-colors duration-200">
                            Login di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Security Tips -->
        <div class="mt-8 bg-gradient-to-br from-amber-50 to-yellow-100 border border-amber-200 rounded-xl p-4">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <h4 class="text-sm font-semibold text-amber-800 mb-1">Tips Keamanan</h4>
                    <ul class="text-xs text-amber-700 space-y-1">
                        <li>• Gunakan kombinasi huruf besar, kecil, angka, dan simbol</li>
                        <li>• Hindari menggunakan informasi pribadi seperti nama atau tanggal lahir</li>
                        <li>• Jangan gunakan password yang sama untuk akun lain</li>
                        <li>• Simpan password di tempat yang aman</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resetPasswordForm');
            const passwordInput = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');
            const togglePassword = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOffIcon = document.getElementById('eyeOffIcon');
            const buttonText = document.getElementById('button-text');
            const loadingText = document.getElementById('loading-text');

            // Password checks
            const lengthCheck = document.getElementById('length-check');
            const uppercaseCheck = document.getElementById('uppercase-check');
            const lowercaseCheck = document.getElementById('lowercase-check');
            const numberCheck = document.getElementById('number-check');
            const passwordMatch = document.getElementById('password-match');

            // Password toggle
            togglePassword.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                eyeIcon.classList.toggle('hidden');
                eyeOffIcon.classList.toggle('hidden');
            });

            // Helper functions
            function clearFieldError(fieldName) {
                const errorElement = document.getElementById(fieldName + '-error');
                if (errorElement) {
                    errorElement.classList.add('hidden');
                    errorElement.textContent = '';
                }
                
                const inputElement = document.getElementById(fieldName);
                if (inputElement) {
                    inputElement.classList.remove('error-border');
                }
            }

            function showFieldError(fieldName, message) {
                const errorElement = document.getElementById(fieldName + '-error');
                const inputElement = document.getElementById(fieldName);
                
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.classList.remove('hidden');
                }
                
                if (inputElement) {
                    inputElement.classList.add('error-border');
                    inputElement.classList.remove('success-border');
                }
            }

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

                // Visual feedback
                const isValid = password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password);
                if (isValid) {
                    passwordInput.classList.add('success-border');
                    passwordInput.classList.remove('error-border');
                    clearFieldError('password');
                } else if (password.length > 0) {
                    passwordInput.classList.remove('success-border');
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
                        passwordConfirmation.classList.add('success-border');
                        passwordConfirmation.classList.remove('error-border');
                        clearFieldError('password-confirmation');
                    } else {
                        passwordMatch.textContent = 'Password tidak cocok ✗';
                        passwordMatch.classList.remove('text-green-500');
                        passwordMatch.classList.add('text-red-500');
                        passwordConfirmation.classList.add('error-border');
                        passwordConfirmation.classList.remove('success-border');
                    }
                } else {
                    passwordMatch.classList.add('hidden');
                    passwordConfirmation.classList.remove('success-border', 'error-border');
                }
            });

            // Form validation
            function validateForm() {
                let isValid = true;
                
                // Clear previous errors
                const errorElements = document.querySelectorAll('.error-message');
                errorElements.forEach(el => {
                    el.classList.add('hidden');
                    el.textContent = '';
                });

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

                return isValid;
            }

            // Form submission
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                if (!validateForm()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Form Tidak Valid',
                        text: 'Silakan periksa kembali password yang Anda masukkan!',
                        confirmButtonColor: '#22c55e',
                        background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                    });
                    return;
                }
                
                // Show loading state
                buttonText.classList.add('hidden');
                loadingText.classList.remove('hidden');
                form.querySelector('button[type="submit"]').disabled = true;
                
                // Submit form via AJAX
                const formData = new FormData(form);
                
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
                    // Reset button state
                    buttonText.classList.remove('hidden');
                    loadingText.classList.add('hidden');
                    form.querySelector('button[type="submit"]').disabled = false;

                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Berhasil Direset! 🎉',
                            html: `
                                <div class="text-center">
                                    <p class="mb-4">${data.message}</p>
                                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                        <div class="text-sm text-green-800">
                                            <strong>Berhasil!</strong><br>
                                            <span class="text-green-600">Password Anda telah diperbarui</span><br>
                                            <span class="text-green-600">Silakan login dengan password baru</span>
                                        </div>
                                    </div>
                                </div>
                            `,
                            confirmButtonText: 'Login Sekarang',
                            confirmButtonColor: '#22c55e',
                            background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                        }).then(() => {
                            window.location.href = data.redirect;
                        });
                    } else {
                        if (data.errors && data.errors.email) {
                            showFieldError('email', data.errors.email[0]);
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Reset Password',
                            text: data.message || 'Terjadi kesalahan saat mereset password.',
                            confirmButtonColor: '#22c55e',
                            background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                        });
                    }
                })
                .catch(error => {
                    // Reset button state
                    buttonText.classList.remove('hidden');
                    loadingText.classList.add('hidden');
                    form.querySelector('button[type="submit"]').disabled = false;

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

            // Show server-side messages
            @if (session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('status') }}',
                    confirmButtonColor: '#22c55e',
                    background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                });
            @endif

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

                // Show field specific errors
                @if ($errors->has('email'))
                    showFieldError('email', '{{ $errors->first('email') }}');
                @endif
                @if ($errors->has('password'))
                    showFieldError('password', '{{ $errors->first('password') }}');
                @endif
                @if ($errors->has('password_confirmation'))
                    showFieldError('password-confirmation', '{{ $errors->first('password_confirmation') }}');
                @endif
            @endif
        });
    </script>
</body>
</html>