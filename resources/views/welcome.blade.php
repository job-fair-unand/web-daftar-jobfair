<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/icons/aceed.png">
    <title>Job Fair Universitas Andalas 2025</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&family=space-grotesk:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS (for utility classes) -->
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
        
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-glow { animation: glow 2s ease-in-out infinite alternate; }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-slideInLeft { animation: slideInLeft 0.8s ease-out forwards; }
        .animate-slideInRight { animation: slideInRight 0.8s ease-out forwards; }
        .animate-pulse-custom { animation: pulse 2s ease-in-out infinite; }
        
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
        
        .feature-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .feature-card:hover {
            transform: translateY(-8px) scale(1.02);
        }
        
        .ripple {
            position: relative;
            overflow: hidden;
        }
        
        .ripple:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .ripple:hover:before {
            width: 300px;
            height: 300px;
        }
        
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 via-yellow-50 to-green-50 dark:from-gray-900 dark:via-red-900 dark:to-green-900 min-h-screen font-instrument-sans antialiased overflow-x-hidden">
    
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-r from-red-400 to-yellow-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-r from-green-400 to-red-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-yellow-400 to-green-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-float" style="animation-delay: -1.5s;"></div>
    </div>

    <!-- Navbar -->
    <nav class="glass-effect fixed w-full z-50 transition-all duration-500 border-b border-white/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-4 animate-slideInLeft">
                    <div class="relative">
                        <img src="/assets/icons/aceed.png" alt="ACEED Logo" class="h-12 w-auto object-contain animate-pulse-custom">
                        <div class="absolute inset-0 bg-red-500/20 rounded-full blur-md animate-glow"></div>
                    </div>
                    <div class="text-3xl font-bold gradient-text tracking-tight font-space-grotesk">
                        Job Fair Unand
                    </div>
                </div>
                <div class="flex items-center space-x-8 animate-slideInRight">
                    <a href="#register" class="relative text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-red-400 px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300 hover:bg-white/20 dark:hover:bg-gray-800/50 backdrop-blur-sm group">
                        <span class="relative z-10">Daftar</span>
                        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-red-500 to-yellow-600 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </a>
                    <a href="#companies" class="relative text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-red-400 px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300 hover:bg-white/20 dark:hover:bg-gray-800/50 backdrop-blur-sm group">
                        <span class="relative z-10">Perusahaan</span>
                        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-red-500 to-yellow-600 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-32 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:justify-between lg:space-x-16">
                <div class="lg:w-1/2 mb-16 lg:mb-0">
                    <div class="space-y-8">
                        <div class="animate-fadeInUp opacity-0 delay-100">
                            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-gray-900 dark:text-white leading-tight mb-8 text-shadow font-space-grotesk">
                                Job Fair 
                                <span class="gradient-text relative">
                                    Unand 2025
                                    <div class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-yellow-600 rounded-full"></div>
                                </span>
                            </h1>
                        </div>
                        
                        <div class="animate-fadeInUp opacity-0 delay-200">
                            <p class="text-xl text-gray-600 dark:text-gray-300 mb-12 max-w-2xl leading-relaxed">
                                <span class="font-semibold text-red-600 dark:text-red-400">Universitas Andalas</span> 
                                menghadirkan Job Fair 2025: Kesempatan emas untuk bertemu perusahaan ternama dan memulai 
                                <span class="font-semibold">karier impianmu</span>.
                            </p>
                        </div>
                        
                        <div class="animate-fadeInUp opacity-0 delay-300">
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                                <a href="#register" class="group relative inline-flex justify-center px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-600 text-white font-bold text-lg rounded-2xl hover:from-red-700 hover:to-yellow-700 focus:outline-none focus:ring-4 focus:ring-red-500/50 shadow-2xl transition-all duration-300 ripple transform hover:scale-105">
                                    <span class="relative z-10 flex items-center space-x-2">
                                        <span>Daftar Sekarang</span>
                                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                    </span>
                                </a>
                                <a href="#companies" class="group relative inline-flex justify-center px-8 py-4 glass-effect text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-red-400 rounded-2xl font-bold text-lg focus:outline-none focus:ring-4 focus:ring-red-500/50 shadow-xl transition-all duration-300 transform hover:scale-105">
                                    <span class="flex items-center space-x-2">
                                        <span>Lihat Perusahaan</span>
                                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Event Details -->
                        <div class="animate-fadeInUp opacity-0 delay-400">
                            <div class="grid grid-cols-3 gap-8 pt-12 border-t border-gray-200/50 dark:border-gray-700/50">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-red-600 dark:text-red-400 mb-2">20-21</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Juni 2025</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-red-600 dark:text-red-400 mb-2">50+</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Perusahaan</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-red-600 dark:text-red-400 mb-2">1000+</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Lowongan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2 flex justify-center animate-slideInRight opacity-0 delay-500">
                    <div class="relative w-full max-w-2xl">
                        <!-- Animated Background Blobs -->
                        <div class="absolute top-0 -left-20 w-80 h-80 bg-gradient-to-r from-red-400 to-yellow-400 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-float"></div>
                        <div class="absolute top-0 -right-20 w-80 h-80 bg-gradient-to-r from-green-400 to-red-400 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-float" style="animation-delay: -2s;"></div>
                        <div class="absolute -bottom-20 left-20 w-80 h-80 bg-gradient-to-r from-yellow-400 to-green-400 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-float" style="animation-delay: -4s;"></div>
                        
                        <!-- Main Image Container -->
                        <div class="relative z-10 group">
                            <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-yellow-600 rounded-3xl blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500"></div>
                            <div class="relative glass-effect rounded-3xl p-8 shadow-2xl transform group-hover:scale-105 transition-all duration-500">
                                <img class="rounded-2xl shadow-2xl w-full h-96 object-cover transform group-hover:scale-110 transition-transform duration-700" 
                                     src="/assets/images/job-fair-preview.jpg" 
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'" 
                                     alt="Job Fair Preview">
                                
                                <!-- Floating UI Elements -->
                                <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-r from-green-400 to-yellow-500 rounded-2xl flex items-center justify-center shadow-2xl animate-float" style="animation-delay: -1s;">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                
                                <div class="absolute -bottom-6 -left-6 w-20 h-20 bg-gradient-to-r from-red-400 to-green-500 rounded-xl flex items-center justify-center shadow-2xl animate-float" style="animation-delay: -3s;">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Companies Section -->
    <section id="companies" class="py-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <div class="animate-fadeInUp opacity-0">
                    <span class="inline-block px-6 py-2 bg-gradient-to-r from-red-100 to-yellow-100 dark:from-red-900 dark:to-yellow-900 text-red-600 dark:text-red-400 rounded-full text-sm font-semibold mb-6">
                        Perusahaan Peserta
                    </span>
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-white mb-6 font-space-grotesk">
                        Perusahaan <span class="gradient-text">Ternama</span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        Temui perusahaan-perusahaan terkemuka dari berbagai industri yang siap merekrut talenta terbaik.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="glass-effect rounded-2xl p-6 flex items-center justify-center animate-fadeInUp opacity-0 delay-100">
                    <img src="/assets/images/company1.png" alt="Company 1" class="h-16 w-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="glass-effect rounded-2xl p-6 flex items-center justify-center animate-fadeInUp opacity-0 delay-200">
                    <img src="/assets/images/company2.png" alt="Company 2" class="h-16 w-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="glass-effect rounded-2xl p-6 flex items-center justify-center animate-fadeInUp opacity-0 delay-300">
                    <img src="/assets/images/company3.png" alt="Company 3" class="h-16 w-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="glass-effect rounded-2xl p-6 flex items-center justify-center animate-fadeInUp opacity-0 delay-400">
                    <img src="/assets/images/company4.png" alt="Company 4" class="h-16 w-auto opacity-70 hover:opacity-100 transition-opacity duration-300">
                </div>
            </div>
        </div>
    </section>

    <!-- Event Details Section -->
    <section class="py-32 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 animate-fadeInUp opacity-0">
                <span class="inline-block px-6 py-2 bg-gradient-to-r from-red-100 to-yellow-100 dark:from-red-900 dark:to-yellow-900 text-red-600 dark:text-red-400 rounded-full text-sm font-semibold mb-6">
                    Informasi Acara
                </span>
                <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 dark:text-white mb-6 font-space-grotesk">
                    Detail <span class="gradient-text">Job Fair</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Semua yang perlu kamu ketahui tentang Job Fair Universitas Andalas 2025.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="feature-card glass-effect rounded-3xl p-8 shadow-2xl hover:shadow-3xl group animate-fadeInUp opacity-0 delay-100">
                    <div class="relative mb-8">
                        <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-yellow-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:shadow-2xl transition-all duration-300 animate-glow">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors duration-300">Tanggal & Waktu</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">20-21 Juni 2025<br>08:00 - 17:00 WIB</p>
                </div>

                <div class="feature-card glass-effect rounded-3xl p-8 shadow-2xl hover:shadow-3xl group animate-fadeInUp opacity-0 delay-200">
                    <div class="relative mb-8">
                        <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-green-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:shadow-2xl transition-all duration-300 animate-glow" style="animation-delay: -1s;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-yellow-600 dark:group-hover:text-yellow-400 transition-colors duration-300">Lokasi</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Gedung Serba Guna Universitas Andalas, Padang, Sumatera Barat</p>
                </div>

                <div class="feature-card glass-effect rounded-3xl p-8 shadow-2xl hover:shadow-3xl group animate-fadeInUp opacity-0 delay-300">
                    <div class="relative mb-8">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-red-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:shadow-2xl transition-all duration-300 animate-glow" style="animation-delay: -2s;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors duration-300">Pendaftaran</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Gratis untuk mahasiswa dan alumni Universitas Andalas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-32 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-red-600 via-yellow-600 to-green-600"></div>
        <div class="absolute inset-0 bg-black/20"></div>
        
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-20 -left-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float" style="animation-delay: -2s;"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fadeInUp opacity-0">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white mb-8 text-shadow font-space-grotesk">
                    Wujudkan 
                    <span class="text-yellow-300">Karier Impianmu</span>
                </h2>
                <p class="text-xl text-red-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Jangan lewatkan kesempatan untuk bertemu langsung dengan perekrut dari perusahaan top dan temukan 
                    <span class="font-bold text-white">pekerjaan idealmu</span> di Job Fair Universitas Andalas 2025.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-6 sm:space-y-0 sm:space-x-8 mb-16">
                    <a href="#register" class="group relative inline-flex justify-center px-10 py-5 bg-white text-red-600 font-bold text-xl rounded-2xl hover:bg-red-50 focus:outline-none focus:ring-4 focus:ring-white/50 shadow-2xl transition-all duration-300 ripple transform hover:scale-110">
                        <span class="flex items-center space-x-3">
                            <span>Daftar Sekarang</span>
                            <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </a>
                    
                    <div class="flex items-center space-x-2 text-red-100">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Gratis untuk Mahasiswa & Alumni</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="text-red-100">
                        <div class="text-3xl font-bold text-white mb-2">50+</div>
                        <div class="text-sm">Perusahaan</div>
                    </div>
                    <div class="text-red-100">
                        <div class="text-3xl font-bold text-white mb-2">1000+</div>
                        <div class="text-sm">Lowongan</div>
                    </div>
                    <div class="text-red-100">
                        <div class="text-3xl font-bold text-white mb-2">5000+</div>
                        <div class="text-sm">Pengunjung</div>
                    </div>
                    <div class="text-red-100">
                        <div class="text-3xl font-bold text-white mb-2">4.8★</div>
                        <div class="text-sm">Rating Acara</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 via-red-900 to-green-900 dark:from-gray-950 dark:via-red-950 dark:to-green-950 py-20 relative overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -left-40 w-80 h-80 bg-red-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -right-40 w-80 h-80 bg-green-500/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="relative">
                            <img src="/assets/icons/aceed.png" alt="Universitas Andalas Logo" class="h-12 w-auto">
                            <div class="absolute inset-0 bg-red-500/20 rounded-full blur-md animate-glow"></div>
                        </div>
                        <span class="text-3xl font-bold text-white font-space-grotesk">Job Fair Unand</span>
                    </div>
                    <p class="text-gray-300 text-lg mb-8 max-w-md">
                        Job Fair Universitas Andalas 2025 menghubungkan talenta terbaik dengan peluang karier dari perusahaan terkemuka.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h5 class="text-lg font-bold text-white mb-6">Navigasi</h5>
                    <ul class="space-y-4">
                        <li><a href="#register" class="text-gray-300 hover:text-white transition-colors duration-300">Daftar</a></li>
                        <li><a href="#companies" class="text-gray-300 hover:text-white transition-colors duration-300">Perusahaan</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors duration-300">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-lg font-bold text-white mb-6">Dukungan</h5>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">FAQ</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">Bantuan</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-lg font-bold text-white mb-6">Kontak Kami</h5>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span>+62 751 123 456</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <span>jobfair@unand.ac.id</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Padang, Sumatera Barat</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-700/50 text-center">
                <p class="text-gray-400 text-sm">© 2025 Job Fair Universitas Andalas. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>