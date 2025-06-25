<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daftarkan perusahaan Anda untuk Job Fair Universitas Andalas 2025.">
    <link rel="icon" href="/assets/icons/aceed.png">
    <title>Daftar Perusahaan - Job Fair Universitas Andalas 2025</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&family=space-grotesk:400,500,600,700" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .input-focus {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .input-focus:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(234, 179, 8, 0.15);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #fef3c7 0%, #dcfce7 50%, #dbeafe 100%);
        }
    </style>
</head>

<body class="gradient-bg min-h-screen font-instrument-sans antialiased" x-data="registerForm()">
    
    <!-- Floating Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-r from-yellow-300/20 to-green-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-r from-green-400/20 to-yellow-300/20 rounded-full blur-3xl animate-pulse" style="animation-delay: -2s;"></div>
    </div>

    <!-- Back to Home Button -->
    <div class="absolute top-6 left-6 z-50">
        <a href="{{ route('home') }}" class="group flex items-center space-x-2 px-4 py-2 rounded-xl glass-effect text-gray-700 hover:text-green-600 transition-all duration-300 hover:scale-105">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span class="font-semibold">Kembali</span>
        </a>
    </div>

    <!-- Main Content -->
    <div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        <div class="max-w-5xl w-full">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <!-- Logo -->
                <div class="flex items-center justify-center space-x-3 mb-6">
                    <div class="relative">
                        <img src="/assets/icons/aceed.png" alt="Job Fair Logo" class="h-12 w-auto object-contain">
                        <div class="absolute inset-0 bg-yellow-400/20 rounded-full blur-md animate-pulse"></div>
                    </div>
                    <div class="text-2xl font-bold bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text text-transparent font-space-grotesk">
                        ACEED Universitas Andalas 2025
                    </div>
                </div>
                
                <!-- Welcome Text -->
                <h1 class="text-3xl font-bold text-gray-900 mb-2 font-space-grotesk">
                    Daftar Perusahaan
                </h1>
                <p class="text-gray-600">
                    Bergabunglah dengan Job Fair Universitas Andalas 2025 sebagai perusahaan
                </p>
            </div>

            <!-- Register Form -->
            <div class="glass-effect rounded-2xl p-8 shadow-xl">
                <form class="space-y-6" method="POST" action="{{ route('register') }}" @submit="if(!validateForm()) { $event.preventDefault(); } else { loading = true; }" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Hidden Role Field -->
                    <input type="hidden" name="role" value="company">

                    <!-- Form Fields in 2 Columns -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Company Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nama Perusahaan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        id="name" 
                                        name="name" 
                                        type="text" 
                                        autocomplete="organization" 
                                        required 
                                        class="input-focus block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-base bg-white/50"
                                        placeholder="Contoh: PT ABC Tbk"
                                        value="{{ old('name') }}"
                                        x-model="name"
                                        :class="{ 'border-red-400 bg-red-50': nameError }"
                                    >
                                </div>
                                <div x-show="nameError" class="mt-1 text-red-500 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Nama perusahaan harus minimal 3 karakter
                                </div>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Company Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email Perusahaan <span class="text-red-500">*</span>
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
                                        class="input-focus block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-base bg-white/50"
                                        placeholder="hr@perusahaan.com"
                                        value="{{ old('email') }}"
                                        x-model="email"
                                        :class="{ 'border-red-400 bg-red-50': emailError }"
                                    >
                                </div>
                                <div x-show="emailError" class="mt-1 text-red-500 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Masukkan alamat email perusahaan yang valid
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Company Address Field -->
                            <div>
                                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Alamat Perusahaan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 pt-3 flex items-start pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <textarea 
                                        id="address" 
                                        name="address" 
                                        rows="3"
                                        required 
                                        class="input-focus block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-base bg-white/50 resize-none"
                                        placeholder="Masukkan alamat lengkap perusahaan"
                                        x-model="address"
                                        :class="{ 'border-red-400 bg-red-50': addressError }"
                                    >{{ old('address') }}</textarea>
                                </div>
                                <div x-show="addressError" class="mt-1 text-red-500 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Alamat perusahaan wajib diisi
                                </div>
                                @error('address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Contact Person Phone Field -->
                            <div>
                                <label for="phone_number" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nomor WhatsApp Contact Person <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        id="phone_number" 
                                        name="phone_number" 
                                        type="tel" 
                                        autocomplete="tel" 
                                        required
                                        class="input-focus block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-base bg-white/50"
                                        placeholder="08123456789"
                                        value="{{ old('phone_number') }}"
                                        x-model="phone_number"
                                        :class="{ 'border-red-400 bg-red-50': phoneError }"
                                    >
                                </div>
                                <div x-show="phoneError" class="mt-1 text-red-500 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Nomor WhatsApp harus minimal 8 digit
                                </div>
                                @error('phone_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Company Logo Upload -->
                            <div>
                                <label for="logo" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Logo Perusahaan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input 
                                        id="logo" 
                                        name="logo" 
                                        type="file" 
                                        accept="image/*"
                                        required
                                        class="hidden"
                                        x-ref="logoInput"
                                        @change="handleLogoUpload($event)"
                                    >
                                    <div 
                                        @click="$refs.logoInput.click()"
                                        class="cursor-pointer border-2 border-dashed border-gray-300 rounded-xl p-4 hover:border-yellow-400 transition-colors duration-200"
                                        :class="{ 'border-red-400 bg-red-50': logoError }"
                                    >
                                        <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-600">
                                                    <span class="font-medium text-green-600 hover:text-green-500">Klik untuk upload</span> atau drag & drop
                                                </p>
                                                <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="logoPreview" class="mt-2">
                                        <img :src="logoPreview" alt="Logo Preview" class="w-20 h-20 object-contain rounded-lg border border-gray-200">
                                    </div>
                                </div>
                                <div x-show="logoError" class="mt-1 text-red-500 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Logo perusahaan wajib diupload
                                </div>
                                @error('logo')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Password <span class="text-red-500">*</span>
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
                                        autocomplete="new-password" 
                                        required 
                                        class="input-focus block w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-base bg-white/50"
                                        placeholder="Minimal 8 karakter"
                                        x-model="password"
                                        :type="showPassword ? 'text' : 'password'"
                                        :class="{ 'border-red-400 bg-red-50': passwordError }"
                                    >
                                    <button 
                                        type="button" 
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200"
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
                                <div x-show="passwordError" class="mt-1 text-red-500 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Password harus minimal 8 karakter
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Konfirmasi Password <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        id="password_confirmation" 
                                        name="password_confirmation" 
                                        autocomplete="new-password" 
                                        required 
                                        class="input-focus block w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-base bg-white/50"
                                        placeholder="Ulangi password Anda"
                                        x-model="password_confirmation"
                                        :type="showConfirmPassword ? 'text' : 'password'"
                                        :class="{ 'border-red-400 bg-red-50': confirmPasswordError }"
                                    >
                                    <button 
                                        type="button" 
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200"
                                        @click="showConfirmPassword = !showConfirmPassword"
                                    >
                                        <svg x-show="!showConfirmPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <svg x-show="showConfirmPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div x-show="confirmPasswordError" class="mt-1 text-red-500 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Password tidak sama
                                </div>
                                @error('password_confirmation')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Info Box -->
                            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <h4 class="text-sm font-semibold text-blue-800 mb-1">Info Penting</h4>
                                        <ul class="text-xs text-blue-700 space-y-1">
                                            <li>• Email verifikasi akan dikirim setelah pendaftaran</li>
                                            <li>• Logo akan ditampilkan di profil perusahaan</li>
                                            <li>• Data perusahaan akan diverifikasi oleh admin</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-base font-semibold rounded-xl text-white bg-gradient-to-r from-green-600 to-yellow-500 hover:from-green-700 hover:to-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed transform hover:scale-[1.02]"
                            :disabled="loading"
                        >
                            <span x-show="!loading" class="flex items-center space-x-2">
                                <span>Daftar Perusahaan</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                            <span x-show="loading" class="flex items-center space-x-2">
                                <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Mendaftarkan...</span>
                            </span>
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

            <!-- Additional Info -->
            <div class="mt-6 text-center">
                <div class="glass-effect rounded-xl p-4">
                    <div class="flex items-center justify-center space-x-2 text-sm text-gray-600 mb-2">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-semibold">Data Aman & Terverifikasi</span>
                    </div>
                    <p class="text-xs text-gray-500">
                        Akun perusahaan akan diverifikasi melalui email dan admin
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js Data -->
    <script>
        function registerForm() {
            return {
                name: '',
                email: '',
                address: '',
                phone_number: '',
                password: '',
                password_confirmation: '',
                showPassword: false,
                showConfirmPassword: false,
                loading: false,
                nameError: false,
                emailError: false,
                addressError: false,
                phoneError: false,
                passwordError: false,
                confirmPasswordError: false,
                logoError: false,
                logoPreview: null,
                
                handleLogoUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        // Validate file type
                        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                        if (!allowedTypes.includes(file.type)) {
                            this.logoError = true;
                            return;
                        }

                        // Validate file size (2MB)
                        if (file.size > 2 * 1024 * 1024) {
                            this.logoError = true;
                            return;
                        }

                        // Show preview
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.logoPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                        
                        this.logoError = false;
                    }
                },
                
                validateForm() {
                    // Reset errors
                    this.nameError = false;
                    this.emailError = false;
                    this.addressError = false;
                    this.phoneError = false;
                    this.passwordError = false;
                    this.confirmPasswordError = false;
                    this.logoError = false;
                    
                    let isValid = true;
                    
                    // Validate company name
                    if (!this.name || this.name.length < 3) {
                        this.nameError = true;
                        isValid = false;
                    }
                    
                    // Validate email
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!this.email || !emailRegex.test(this.email)) {
                        this.emailError = true;
                        isValid = false;
                    }
                    
                    // Validate address
                    if (!this.address || this.address.length < 10) {
                        this.addressError = true;
                        isValid = false;
                    }
                    
                    // Validate phone
                    if (!this.phone_number || this.phone_number.length < 8) {
                        this.phoneError = true;
                        isValid = false;
                    }
                    
                    // Validate logo
                    const logoInput = this.$refs.logoInput;
                    if (!logoInput.files || logoInput.files.length === 0) {
                        this.logoError = true;
                        isValid = false;
                    }
                    
                    // Validate password
                    if (!this.password || this.password.length < 8) {
                        this.passwordError = true;
                        isValid = false;
                    }
                    
                    // Validate password confirmation
                    if (this.password !== this.password_confirmation) {
                        this.confirmPasswordError = true;
                        isValid = false;
                    }
                    
                    return isValid;
                }
            }
        }
        
        // Auto-hide error messages after input
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    // Remove error styling when user starts typing
                    this.classList.remove('border-red-400', 'bg-red-50');
                });
            });
        });
    </script>
</body>
</html>