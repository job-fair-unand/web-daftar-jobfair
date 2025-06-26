<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Verifikasi email Anda untuk Job Fair Universitas Andalas 2025.">
    <link rel="icon" href="{{ asset('assets/icons/aceed.png') }}">
    <title>Verifikasi Email - Job Fair Universitas Andalas 2025</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&family=space-grotesk:400,500,600,700" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #fef3c7 0%, #dcfce7 50%, #dbeafe 100%);
        }

        .pulse-animation {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: .5;
            }
        }
    </style>
</head>

<body class="gradient-bg min-h-screen font-instrument-sans antialiased" x-data="verifyEmailForm()">
    
    <!-- Floating Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-r from-yellow-300/20 to-green-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-r from-green-400/20 to-yellow-300/20 rounded-full blur-3xl animate-pulse" style="animation-delay: -2s;"></div>
    </div>

    <!-- Main Content -->
    <div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        <div class="max-w-2xl w-full"> <!-- Increased from max-w-md to max-w-2xl -->
            
            <!-- Header -->
            <div class="text-center mb-10">
                <!-- Logo -->
                <div class="flex items-center justify-center space-x-4 mb-8">
                    <div class="relative">
                        <img src="/assets/icons/aceed.png" alt="Job Fair Logo" class="h-20 w-auto object-contain">
                        <div class="absolute inset-0 bg-yellow-400/20 rounded-full blur-md animate-pulse"></div>
                    </div>
                    <div class="text-3xl font-bold bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text text-transparent font-space-grotesk">
                        ACEED Universitas Andalas 2025
                    </div>
                </div>
                
                <!-- Welcome Text -->
                <h1 class="text-4xl font-bold text-gray-900 mb-3 font-space-grotesk">
                    Verifikasi Email
                </h1>
                <p class="text-lg text-gray-600">
                    Satu langkah lagi untuk menyelesaikan pendaftaran Anda
                </p>
            </div>

            <!-- Verification Card -->
            <div class="glass-effect rounded-2xl p-10 shadow-xl text-center">
                
                <!-- Email Icon Animation -->
                <div class="mb-8">
                    <div class="mx-auto w-24 h-24 bg-gradient-to-r from-green-100 to-yellow-100 rounded-full flex items-center justify-center pulse-animation">
                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Main Message -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                        Cek Email Anda!
                    </h2>
                    <p class="text-gray-600 leading-relaxed text-base">
                        Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan.
                    </p>
                </div>

                <!-- User Email Display -->
                @if(auth()->user() && auth()->user()->email)
                <div class="mb-8">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                        <div class="flex items-center justify-center space-x-3">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <span class="text-sm font-medium text-blue-800">
                                {{ auth()->user()->email }}
                            </span>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Instructions -->
                <div class="mb-10">
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-5">
                        <h3 class="text-base font-semibold text-gray-800 mb-4">Langkah Selanjutnya:</h3>
                        <ol class="text-sm text-gray-600 space-y-3 text-left">
                            <li class="flex items-start space-x-3">
                                <span class="flex-shrink-0 w-6 h-6 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs font-bold">1</span>
                                <span>Buka aplikasi email Anda</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <span class="flex-shrink-0 w-6 h-6 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs font-bold">2</span>
                                <span>Cari email dari Job Fair Unand (cek folder spam jika perlu)</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <span class="flex-shrink-0 w-6 h-6 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs font-bold">3</span>
                                <span>Klik tombol "Verifikasi Email" atau tautan yang disediakan</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-5">
                    <!-- Resend Email Button -->
                    <form method="POST" action="{{ route('verification.send') }}" x-data="{ sending: false }" @submit="sending = true">
                        @csrf
                        <button 
                            type="submit" 
                            class="w-full flex justify-center items-center space-x-3 py-3 px-6 border border-transparent text-lg font-semibold rounded-xl text-white bg-gradient-to-r from-green-600 to-yellow-500 hover:from-green-700 hover:to-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed transform hover:scale-[1.02]"
                            :disabled="sending"
                        >
                            <span x-show="!sending" class="flex items-center space-x-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                <span>Kirim Ulang Email Verifikasi</span>
                            </span>
                            <span x-show="sending" class="flex items-center space-x-3">
                                <svg class="animate-spin h-6 w-6" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Mengirim...</span>
                            </span>
                        </button>
                    </form>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button 
                            type="submit" 
                            class="w-full py-3 px-6 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-all duration-300"
                        >
                            Keluar & Masuk dengan Akun Lain
                        </button>
                    </form>
                </div>

                <!-- Success Message -->
                @if (session('status') == 'verification-link-sent')
                    <div class="mt-8" id="success-message">
                        <div class="bg-green-50 border border-green-200 rounded-xl p-5">
                            <div class="flex items-center justify-center space-x-3 mb-3">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-semibold text-green-800">Email Berhasil Dikirim!</span>
                            </div>
                            <p class="text-sm text-green-700">
                                Tautan verifikasi baru telah dikirim ke alamat email Anda. Silakan cek email (termasuk folder spam).
                            </p>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mt-8">
                        <div class="bg-red-50 border border-red-200 rounded-xl p-5">
                            <div class="flex items-center justify-center space-x-3 mb-3">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base font-semibold text-red-800">Gagal Mengirim Email</span>
                            </div>
                            <p class="text-sm text-red-700">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Help Section -->
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500 mb-4">
                        Tidak menerima email setelah beberapa menit?
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center space-y-3 sm:space-y-0 sm:space-x-6 text-sm">
                        <span class="text-gray-600">Hubungi kami:</span>
                        <a href="mailto:jobfair@unand.ac.id" class="text-green-600 hover:text-green-700 font-medium transition-colors">
                            📧 jobfair@unand.ac.id
                        </a>
                        <a href="https://wa.me/6275112345678" class="text-green-600 hover:text-green-700 font-medium transition-colors">
                            📱 WhatsApp Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js Data -->
    <script>
        // Auto-hide success message after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.querySelector('.bg-green-50');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.transition = 'opacity 0.5s ease-out';
                    successMessage.style.opacity = '0';
                    setTimeout(() => {
                        successMessage.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>
</body>
</html>