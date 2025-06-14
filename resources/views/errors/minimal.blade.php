<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/icons/aceed.png">
    <title>@yield('title') - Job Fair Universitas Andalas 2025</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&family=space-grotesk:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
            50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6); }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            25% { transform: translateY(-10px); }
            50% { transform: translateY(0); }
            75% { transform: translateY(-5px); }
        }
        
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-glow { animation: glow 2s ease-in-out infinite alternate; }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-pulse-custom { animation: pulse 2s ease-in-out infinite; }
        .animate-bounce-custom { animation: bounce 2s infinite; }
        
        .gradient-text {
            background: linear-gradient(135deg, #dc2626, #f59e0b, #10b981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 via-yellow-50 to-green-50 dark:from-gray-900 dark:via-red-900 dark:to-green-900 min-h-screen font-instrument-sans antialiased overflow-x-hidden">
    
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-r from-red-400 to-yellow-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-r from-green-400 to-red-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-yellow-400 to-green-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-float" style="animation-delay: -1.5s;"></div>
    </div>

    <!-- Main Content -->
    <div class="relative flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Logo and Brand -->
            <div class="flex items-center justify-center space-x-4 mb-12 animate-fadeInUp opacity-0">
                <div class="relative">
                    <img src="/assets/icons/aceed.png" alt="ACEED Logo" class="h-16 w-auto object-contain animate-pulse-custom">
                    <div class="absolute inset-0 bg-red-500/20 rounded-full blur-md animate-glow"></div>
                </div>
                <div class="text-4xl font-bold gradient-text tracking-tight font-space-grotesk">
                    Job Fair Unand
                </div>
            </div>

            <!-- Error Code and Icon -->
            <div class="animate-fadeInUp opacity-0 delay-100 mb-8">
                <div class="flex justify-center mb-8">
                    <div class="relative">
                        <!-- Error Icon based on code -->
                        <div class="w-32 h-32 glass-effect rounded-3xl flex items-center justify-center shadow-2xl animate-bounce-custom">
                            @if(isset($exception) && $exception->getStatusCode() == 404)
                                <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            @elseif(isset($exception) && $exception->getStatusCode() == 403)
                                <svg class="w-16 h-16 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            @elseif(isset($exception) && $exception->getStatusCode() == 500)
                                <svg class="w-16 h-16 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.232 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                            @else
                                <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-yellow-500 rounded-3xl blur-2xl opacity-20 animate-glow"></div>
                    </div>
                </div>
                
                <!-- Error Code -->
                <div class="text-8xl sm:text-9xl font-extrabold gradient-text mb-4 font-space-grotesk">
                    @yield('code')
                </div>
            </div>

            <!-- Error Message -->
            <div class="animate-fadeInUp opacity-0 delay-200 mb-12">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 text-shadow font-space-grotesk">
                    @if(isset($exception) && $exception->getStatusCode() == 404)
                        Halaman Tidak Ditemukan
                    @elseif(isset($exception) && $exception->getStatusCode() == 403)
                        Akses Ditolak
                    @elseif(isset($exception) && $exception->getStatusCode() == 500)
                        Terjadi Kesalahan Server
                    @elseif(isset($exception) && $exception->getStatusCode() == 419)
                        Sesi Telah Berakhir
                    @elseif(isset($exception) && $exception->getStatusCode() == 429)
                        Terlalu Banyak Permintaan
                    @elseif(isset($exception) && $exception->getStatusCode() == 503)
                        Layanan Tidak Tersedia
                    @else
                        @yield('message')
                    @endif
                </h1>
                
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                    @if(isset($exception) && $exception->getStatusCode() == 404)
                        Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin halaman telah dipindahkan atau dihapus.
                    @elseif(isset($exception) && $exception->getStatusCode() == 403)
                        Anda tidak memiliki izin untuk mengakses halaman ini. Silakan hubungi administrator jika diperlukan.
                    @elseif(isset($exception) && $exception->getStatusCode() == 500)
                        Terjadi kesalahan internal pada server. Tim kami sedang bekerja untuk memperbaikinya.
                    @elseif(isset($exception) && $exception->getStatusCode() == 419)
                        Sesi Anda telah berakhir karena tidak aktif. Silakan muat ulang halaman untuk melanjutkan.
                    @elseif(isset($exception) && $exception->getStatusCode() == 429)
                        Anda telah melakukan terlalu banyak permintaan. Silakan coba lagi dalam beberapa saat.
                    @elseif(isset($exception) && $exception->getStatusCode() == 503)
                        Layanan sedang dalam pemeliharaan. Silakan coba lagi dalam beberapa saat.
                    @else
                        Terjadi kesalahan yang tidak terduga. Silakan coba lagi atau hubungi administrator.
                    @endif
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="animate-fadeInUp opacity-0 delay-300">
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6 mb-16">
                    <a href="{{ url('/') }}" class="group relative inline-flex justify-center px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-600 text-white font-bold text-lg rounded-2xl hover:from-red-700 hover:to-yellow-700 focus:outline-none focus:ring-4 focus:ring-red-500/50 shadow-2xl transition-all duration-300 transform hover:scale-105">
                        <span class="flex items-center space-x-2">
                            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Kembali ke Beranda</span>
                        </span>
                    </a>
                    
                    <button onclick="history.back()" class="group relative inline-flex justify-center px-8 py-4 glass-effect text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-red-400 rounded-2xl font-bold text-lg focus:outline-none focus:ring-4 focus:ring-red-500/50 shadow-xl transition-all duration-300 transform hover:scale-105">
                        <span class="flex items-center space-x-2">
                            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span>Kembali</span>
                        </span>
                    </button>
                </div>
                
                <!-- Help Text -->
                <div class="glass-effect rounded-2xl p-6 max-w-md mx-auto">
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Butuh bantuan? Hubungi tim support kami:
                    </p>
                    <div class="flex justify-center space-x-6 text-sm">
                        <a href="mailto:jobfair@unand.ac.id" class="flex items-center space-x-1 text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <span>Email</span>
                        </a>
                        <a href="tel:+6275123456" class="flex items-center space-x-1 text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span>Telepon</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Footer -->
    <footer class="absolute bottom-0 w-full py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-gray-500 dark:text-gray-400 text-sm">
                © 2025 Job Fair Universitas Andalas. All rights reserved.
            </div>
        </div>
    </footer> --}}

    <script>
        // Animate elements on load
        window.addEventListener('load', function() {
            const elements = document.querySelectorAll('.animate-fadeInUp');
            elements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                }, index * 100);
            });
        });
        
        // Add some interactive effects
        document.addEventListener('mousemove', function(e) {
            const cursor = document.querySelector('.cursor-effect');
            if (!cursor) {
                const newCursor = document.createElement('div');
                newCursor.className = 'cursor-effect fixed w-4 h-4 bg-gradient-to-r from-red-400 to-yellow-400 rounded-full pointer-events-none mix-blend-multiply filter blur-sm opacity-30 transition-all duration-300 z-50';
                document.body.appendChild(newCursor);
            }
            
            const cursorEl = document.querySelector('.cursor-effect');
            if (cursorEl) {
                cursorEl.style.left = e.clientX - 8 + 'px';
                cursorEl.style.top = e.clientY - 8 + 'px';
            }
        });
    </script>
</body>
</html>