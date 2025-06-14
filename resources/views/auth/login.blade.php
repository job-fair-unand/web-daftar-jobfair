<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/icons/aceed.png">
    <title>Login - Job Fair Universitas Andalas 2025</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&family=space-grotesk:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-glow { animation: glow 2s ease-in-out infinite alternate; }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-slideInLeft { animation: slideInLeft 0.8s ease-out forwards; }
        .animate-slideInRight { animation: slideInRight 0.8s ease-out forwards; }
        .animate-pulse-custom { animation: pulse 2s ease-in-out infinite; }
        .animate-shake { animation: shake 0.5s ease-in-out; }
        
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
        
        .input-focus {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
<body class="bg-gradient-to-br from-red-50 via-yellow-50 to-green-50 dark:from-gray-900 dark:via-red-900 dark:to-green-900 min-h-screen font-instrument-sans antialiased overflow-x-hidden" x-data="loginForm()">
    
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-r from-red-400 to-yellow-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-r from-green-400 to-red-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-yellow-400 to-green-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-float" style="animation-delay: -1.5s;"></div>
    </div>

    <!-- Back to Home Button -->
    <div class="absolute top-6 left-6 z-50 animate-slideInLeft opacity-0">
        <a href="{{ url('/') }}" class="group flex items-center space-x-2 glass-effect px-4 py-2 rounded-full text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-red-400 transition-all duration-300 hover:scale-105">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span class="font-semibold">Kembali</span>
        </a>
    </div>

    <!-- Main Content -->
    <div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-md w-full space-y-8">
            
            <!-- Header -->
            <div class="text-center animate-fadeInUp opacity-0">
                <!-- Logo -->
                <div class="flex items-center justify-center space-x-4 mb-8">
                    <div class="relative">
                        <img src="/assets/icons/aceed.png" alt="ACEED Logo" class="h-16 w-auto object-contain animate-pulse-custom">
                        <div class="absolute inset-0 bg-red-500/20 rounded-full blur-md animate-glow"></div>
                    </div>
                    <div class="text-3xl font-bold gradient-text tracking-tight font-space-grotesk">
                        Job Fair Unand
                    </div>
                </div>
                
                <!-- Welcome Text -->
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white text-shadow font-space-grotesk mb-2">
                    Selamat Datang
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Masuk ke akun Anda untuk melanjutkan
                </p>
            </div>

            <!-- Login Form -->
            <div class="animate-fadeInUp opacity-0 delay-200">
                <div class="glass-effect rounded-3xl shadow-2xl p-8">
                    <form class="space-y-6" method="POST" action="{{ route('login') }}" @submit="loading = true">
                        @csrf
                        
                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    autocomplete="email" 
                                    required 
                                    class="input-focus block w-full pl-10 pr-3 py-4 border border-gray-300 dark:border-gray-600 rounded-2xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 dark:bg-gray-800 dark:text-white text-lg"
                                    placeholder="nama@email.com"
                                    value="{{ old('email') }}"
                                    x-model="email"
                                    :class="{ 'animate-shake border-red-500': emailError }"
                                >
                            </div>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    autocomplete="current-password" 
                                    required 
                                    class="input-focus block w-full pl-10 pr-12 py-4 border border-gray-300 dark:border-gray-600 rounded-2xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 dark:bg-gray-800 dark:text-white text-lg"
                                    placeholder="••••••••"
                                    x-model="password"
                                    :type="showPassword ? 'text' : 'password'"
                                    :class="{ 'animate-shake border-red-500': passwordError }"
                                >
                                <button 
                                    type="button" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200"
                                    @click="showPassword = !showPassword"
                                >
                                    <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input 
                                    id="remember" 
                                    name="remember" 
                                    type="checkbox" 
                                    class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 dark:border-gray-600 rounded transition-all duration-200"
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300 font-medium">
                                    Ingat saya
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}" class="font-medium text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 transition-colors duration-200">
                                        Lupa password?
                                    </a>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button 
                                type="submit" 
                                class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-bold rounded-2xl text-white bg-gradient-to-r from-red-600 to-yellow-600 hover:from-red-700 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-2xl transition-all duration-300 ripple transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                                :disabled="loading"
                                :class="{ 'animate-pulse': loading }"
                            >
                                <span x-show="!loading" class="flex items-center space-x-2">
                                    <span>Masuk</span>
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                                <span x-show="loading" class="flex items-center space-x-2">
                                    <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span>Memproses...</span>
                                </span>
                            </button>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Belum punya akun? 
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="font-medium text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 transition-colors duration-200">
                                        Daftar sekarang
                                    </a>
                                @endif
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="animate-fadeInUp opacity-0 delay-400">
                <div class="glass-effect rounded-2xl p-6 text-center">
                    <div class="flex items-center justify-center space-x-2 text-sm text-gray-600 dark:text-gray-300 mb-4">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Data Anda Aman & Terenkripsi</span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Dengan masuk, Anda menyetujui syarat dan ketentuan Job Fair Universitas Andalas 2025
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js Data -->
    <script>
        function loginForm() {
            return {
                email: '',
                password: '',
                showPassword: false,
                loading: false,
                emailError: false,
                passwordError: false,
                
                init() {
                    // Animate elements on load
                    setTimeout(() => {
                        const elements = document.querySelectorAll('.animate-fadeInUp, .animate-slideInLeft, .animate-slideInRight');
                        elements.forEach((el, index) => {
                            setTimeout(() => {
                                el.style.opacity = '1';
                            }, index * 100);
                        });
                    }, 100);
                },
                
                validateForm() {
                    this.emailError = false;
                    this.passwordError = false;
                    
                    if (!this.email || !this.email.includes('@')) {
                        this.emailError = true;
                        return false;
                    }
                    
                    if (!this.password || this.password.length < 6) {
                        this.passwordError = true;
                        return false;
                    }
                    
                    return true;
                }
            }
        }

        // Add cursor effect
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