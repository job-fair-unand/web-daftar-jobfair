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
            0%, 100% { box-shadow: 0 0 20px rgba(234, 179, 8, 0.3); }
            50% { box-shadow: 0 0 40px rgba(234, 179, 8, 0.6); }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-glow { animation: glow 2s ease-in-out infinite alternate; }
        .animate-fadeInUp { animation: fadeInUp 2s ease-in-out infinite; }
        .animate-pulse-custom { animation: slide-up 0.2s ease-in-out; }
        
        .gradient-text {
            background: linear-gradient(135deg, #eab308, #10b981);
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
        
        .delay-100 { animation-delay: 0.1s }
        .delay-200 { animation-delay: 0.2s }
        .delay-300 { animation-delay: 0.3s }
    </style>
</head>
<body class="bg-gradient-to-br from-yellow-50 to-green-50 dark:from-gray-900 dark:via-green-900 dark:to-yellow-900 min-h-screen font-instrument-sans antialiased overflow-x-hidden">
    
    <!-- Navigation Bar -->
    <nav class="bg-gradient-to-r from-yellow-600 to-green-600 shadow-lg">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <img src="/assets/icons/aceed.png" alt="ACEED Logo" class="h-10 w-auto">
                    <span class="text-2xl font-bold text-white font-space-grotesk">Job Fair Unand</span>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="#home" class="text-white hover:text-yellow-200 transition-colors">Home</a>
                    <a href="#events" class="text-white hover:text-yellow-200 transition-colors">Events</a>
                    <a href="#sponsors" class="text-white hover:text-yellow-200 transition-colors">Sponsors</a>
                    <a href="#follow-us" class="text-white hover:text-yellow-200 transition-colors">Follow Us</a>
                </div>
                <div class="md:hidden">
                    <button class="text-white focus:outline-none" onclick="toggleMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="hidden md:hidden bg-green-700">
                <a href="#home" class="block px-4 py-2 text-white hover:bg-yellow-600">Home</a>
                <a href="#events" class="block px-4 py-2 text-white hover:bg-yellow-600">Events</a>
                <a href="#sponsors" class="block px-4 py-2 text-white hover:bg-yellow-600">Sponsors</a>
                <a href="#follow-us" class="block px-4 py-2 text-white hover:bg-yellow-600">Follow Us</a>
            </div>
        </div>
    </nav>

    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-r from-yellow-400 to-green-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-r from-green-400 to-yellow-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-yellow-400 to-green-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-float" style="animation-delay: -1.5s;"></div>
    </div>

    <!-- Main Content -->
    <div class="relative flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Logo and Brand -->
            <div class="flex items-center justify-center space-x-4 mb-12 animate-fadeInUp opacity-0">
                <div class="relative">
                    <img src="/assets/icons/aceed.png" alt="ACEED Logo" class="h-16 w-auto object-contain animate-pulse-custom">
                    <div class="absolute inset-0 bg-yellow-500/20 rounded-full blur-md animate-glow"></div>
                </div>
                <div class="text-4xl font-bold gradient-text tracking-tight font-space-grotesk">
                    Job Fair Unand
                </div>
            </div>

            <!-- Content Area -->
            <div class="animate-fadeInUp opacity-0 delay-100 mb-12">
                <div class="glass-effect rounded-2xl p-8 shadow-2xl">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 text-shadow font-space-grotesk">
                        @yield('message')
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                        Terjadi kesalahan. Silakan coba lagi atau hubungi administrator untuk bantuan lebih lanjut.
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="animate-fadeInUp opacity-0 delay-200">
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6 mb-16">
                    <a href="{{ url('/') }}" class="group relative inline-flex justify-center px-8 py-4 bg-gradient-to-r from-yellow-600 to-green-600 text-white font-bold text-lg rounded-2xl hover:from-yellow-700 hover:to-green-700 focus:outline-none focus:ring-4 focus:ring-yellow-500/50 shadow-2xl transition-all duration-300 transform hover:scale-105">
                        <span class="flex items-center space-x-2">
                            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Kembali ke Beranda</span>
                        </span>
                    </a>
                    
                    <button onclick="history.back()" class="group relative inline-flex justify-center px-8 py-4 glass-effect text-gray-700 dark:text-gray-200 hover:text-yellow-600 dark:hover:text-yellow-400 rounded-2xl font-bold text-lg focus:outline-none focus:ring-4 focus:ring-yellow-500/50 shadow-xl transition-all duration-300 transform hover:scale-105">
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
                        <a href="mailto:jobfair@unand.ac.id" class="flex items-center space-x-1 text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300 transition-colors duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002 2V8.118z"/>
                            </svg>
                            <span>Email</span>
                        </a>
                        <a href="tel:+6275123456" class="flex items-center space-x-1 text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300 transition-colors duration-300">
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

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-green-900 to-yellow-900 py-12">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <img src="/assets/icons/aceed.png" alt="Universitas Andalas Logo" class="h-10 w-auto">
                        <span class="text-2xl font-bold text-white font-space-grotesk">Job Fair Unand</span>
                    </div>
                    <p class="text-gray-300 text-base max-w-md">
                        Job Fair Universitas Andalas 2025 menghubungkan talenta terbaik dengan peluang karier dari perusahaan terkemuka.
                    </p>
                </div>
                <div>
                    <h5 class="text-base font-semibold text-white mb-4">Navigasi</h5>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-300 hover:text-white transition-colors">Home</a></li>
                        <li><a href="#events" class="text-gray-300 hover:text-white transition-colors">Events</a></li>
                        <li><a href="#sponsors" class="text-gray-300 hover:text-white transition-colors">Sponsors</a></li>
                        <li><a href="#follow-us" class="text-gray-300 hover:text-white transition-colors">Follow Us</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-base font-semibold text-white mb-4">Kontak Kami</h5>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span>+62 751 123 456</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <span>jobfair@unand.ac.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-4 border-t border-gray-700 text-center">
                <p class="text-sm text-gray-400">© 2025 Job Fair Universitas Andalas. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Toggle mobile menu
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Animate elements on load
        window.addEventListener('load', function() {
            const elements = document.querySelectorAll('.animate-fadeInUp');
            elements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                }, index * 100);
            });
        });
    </script>
</body>
</html>