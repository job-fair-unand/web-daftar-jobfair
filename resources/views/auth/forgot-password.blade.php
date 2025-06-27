<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Reset password untuk akun ACEED EXPO Universitas Andalas 2025.">
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

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            
            <h1 class="text-3xl font-bold header-gradient mb-2">
                Reset Password
            </h1>
            <p class="text-gray-600">Masukkan email Anda untuk menerima link reset password</p>
        </div>
        
        <!-- Form Container -->
        <div class="form-container shadow-2xl rounded-2xl p-8">
            <!-- Info Message -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-200 rounded-xl p-4 mb-6">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-800 mb-1">Informasi Reset Password</h4>
                        <ul class="text-xs text-blue-700 space-y-1">
                            <li>• Masukkan email yang terdaftar dalam sistem</li>
                            <li>• Kami akan mengirimkan link reset password ke email Anda</li>
                            <li>• Link akan berlaku selama 60 menit</li>
                        </ul>
                    </div>
                </div>
            </div>

            <form id="resetForm" action="{{ route('password.email') }}" method="POST" class="space-y-6" novalidate>
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium form-label mb-3">
                        Email Terdaftar <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           class="form-input w-full px-4 py-3 rounded-xl" 
                           placeholder="Masukkan email Anda" 
                           required>
                    <div class="error-message text-red-500 text-xs mt-1 hidden" id="email-error"></div>
                </div>
                
                <div class="pt-4">
                    <button type="submit" class="btn-primary w-full py-3 px-6 rounded-xl font-semibold text-lg transition duration-300">
                        <span id="button-text">Kirim Link Reset Password</span>
                        <span id="loading-text" class="hidden">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mengirim Email...
                        </span>
                    </button>
                </div>

                <!-- Additional Links -->
                <div class="text-center pt-4 space-y-2">
                    <p class="text-sm text-gray-600">
                        Sudah ingat password Anda? 
                        <a href="{{ route('login') }}" class="font-semibold text-green-600 hover:text-green-700 transition-colors duration-200">
                            Login di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Help Section -->
        <div class="mt-8 bg-gradient-to-br from-amber-50 to-yellow-100 border border-amber-200 rounded-xl p-4">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <h4 class="text-sm font-semibold text-amber-800 mb-1">Butuh Bantuan?</h4>
                    <p class="text-xs text-amber-700">
                        Jika Anda mengalami masalah dalam reset password, silakan hubungi admin ACEED EXPO melalui email: 
                        <a href="mailto:admin@aceedexpo.unand.ac.id" class="font-semibold underline">admin@aceedexpo.unand.ac.id</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resetForm');
            const emailInput = document.getElementById('email');
            const buttonText = document.getElementById('button-text');
            const loadingText = document.getElementById('loading-text');

            // Helper function untuk clear error
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

            // Helper function untuk show error
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

            // Email validation
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

            // Form submission
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                // Clear previous errors
                clearFieldError('email');
                
                // Validate email
                const email = emailInput.value.trim();
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                let isValid = true;
                
                if (!email) {
                    showFieldError('email', 'Email wajib diisi');
                    isValid = false;
                } else if (!emailPattern.test(email)) {
                    showFieldError('email', 'Format email tidak valid');
                    isValid = false;
                }
                
                if (!isValid) {
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
                            title: 'Email Terkirim! 📧',
                            html: `
                                <div class="text-center">
                                    <p class="mb-4">${data.message}</p>
                                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                        <div class="text-sm text-green-800">
                                            <strong>Langkah selanjutnya:</strong><br>
                                            <span class="text-green-600">1. Cek inbox email Anda</span><br>
                                            <span class="text-green-600">2. Klik link reset password</span><br>
                                            <span class="text-green-600">3. Buat password baru</span>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-600 mt-3">
                                        Tidak menerima email? Cek folder spam/junk atau tunggu beberapa menit.
                                    </p>
                                </div>
                            `,
                            confirmButtonText: 'Mengerti',
                            confirmButtonColor: '#22c55e',
                            background: 'linear-gradient(135deg, #fef3c7 0%, #dcfce7 100%)'
                        }).then(() => {
                            // Clear form
                            emailInput.value = '';
                            emailInput.classList.remove('success-border', 'error-border');
                        });
                    } else {
                        if (data.errors && data.errors.email) {
                            showFieldError('email', data.errors.email[0]);
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: data.message || 'Email tidak ditemukan dalam sistem kami.',
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

            // Show server-side messages with SweetAlert
            @if (session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Email Terkirim! 📧',
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
            @endif
        });
    </script>
</body>
</html>