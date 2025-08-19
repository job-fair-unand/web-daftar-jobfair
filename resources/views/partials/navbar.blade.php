<!-- filepath: resources/views/partials/navbar.blade.php -->

<nav class="bg-white border-b border-gray-200 sticky top-0 z-50 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <img src="/assets/icons/aceed.png" alt="ACEED Logo" class="h-10 w-auto object-contain">
                    <div class="absolute inset-0 bg-blue-500/20 rounded-full blur-md opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="text-xl font-bold bg-gradient-to-r from-green-600 to-yellow-600 bg-clip-text text-transparent">
                    ACEED EXPO Unand
                </div>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <!-- Menu Public -->
                <a href="{{ route('home') }}" class="relative {{ request()->routeIs('home') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                    <span class="relative z-10">Beranda</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('home') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                </a>

                <a href="{{ route('company') }}" class="relative {{ request()->routeIs('company') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                    <span class="relative z-10">Perusahaan</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('company') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                </a>

                <a href="{{ route('scholarship') }}" class="relative {{ request()->routeIs('scholarship') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                    <span class="relative z-10">Beasiswa</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('scholarship') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                </a>

                <a href="{{ route('business') }}" class="relative {{ request()->routeIs('business') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                    <span class="relative z-10">UMKM</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('business') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                </a>

                <a href="{{ route('about') }}" class="relative {{ request()->routeIs('about') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                    <span class="relative z-10">Tentang Kami</span>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('about') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                </a>

                <!-- Menu untuk User yang Login -->
                @auth
                    <!-- Dashboard berdasarkan role -->
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="relative {{ request()->routeIs('admin*') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                            <span class="relative z-10">Dashboard Admin</span>
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('admin*') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                        </a>
                    @elseif(auth()->user()->role === 'company')
                        <a href="{{ route('company.dashboard') }}" class="relative {{ request()->routeIs('company.*') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                            <span class="relative z-10">Dashboard Perusahaan</span>
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('company.*') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                        </a>
                    @elseif(auth()->user()->role === 'sponsor')
                        <a href="{{ route('sponsor.dashboard') }}" class="relative {{ request()->routeIs('sponsor*') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                            <span class="relative z-10">Dashboard Sponsor</span>
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('sponsor*') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                        </a>
                    @elseif(auth()->user()->role === 'umkm')
                        <a href="{{ route('umkm.dashboard') }}" class="relative {{ request()->routeIs('umkm*') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                            <span class="relative z-10">Dashboard UMKM</span>
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('umkm*') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                        </a>
                    @elseif (auth()->user()->role === 'scholarship')
                        <a href="{{ route('scholarship.dashboard') }}" class="relative {{ request()->routeIs('scholarship*') ? 'text-green-600' : 'text-gray-700' }} hover:text-green-600 px-3 py-2 text-sm font-medium transition-colors duration-300 group">
                            <span class="relative z-10">Dashboard Beasiswa</span>
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-green-600 transform {{ request()->routeIs('scholarship*') ? 'scale-x-100' : 'scale-x-0' }} group-hover:scale-x-100 transition-transform duration-300"></div>
                        </a>
                    @endif
                @endauth
            </div>
            
            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button id="mobile-menu-button" type="button" class="text-gray-500 hover:text-green-600 focus:outline-none p-2 rounded-md hover:bg-green-50 transition-colors">
                    <svg class="w-6 h-6 block" id="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6 hidden" id="close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="lg:hidden hidden bg-white border-t border-gray-200 shadow-lg">
        <div class="px-4 py-6 space-y-4">
            <!-- Menu Public Mobile -->
            <a href="{{ route('home') }}" class="block px-3 py-2 {{ request()->routeIs('home') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                Beranda
            </a>
            
            <a href="{{ route('company') }}" class="block px-3 py-2 {{ request()->routeIs('company') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                Perusahaan
            </a>

            <a href="{{ route('scholarship') }}" class="block px-3 py-2 {{ request()->routeIs('scholarship') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                Beasiswa
            </a>

            <a href="{{ route('business') }}" class="block px-3 py-2 {{ request()->routeIs('business') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                UMKM
            </a>

            <a href="{{ route('about') }}" class="block px-3 py-2 {{ request()->routeIs('about') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                Tentang Kami
            </a>

            <!-- Menu User Mobile -->
            @auth
                <hr class="my-4 border-gray-200">
                
                <!-- Dashboard berdasarkan role -->
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 {{ request()->routeIs('admin*') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard Admin
                    </a>
                @elseif(auth()->user()->role === 'company')
                    <a href="{{ route('company.dashboard') }}" class="block px-3 py-2 {{ request()->routeIs('company.*') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                        <i class="fas fa-building mr-2"></i> Dashboard Perusahaan
                    </a>
                @elseif(auth()->user()->role === 'sponsor')
                    <a href="{{ route('sponsor.dashboard') }}" class="block px-3 py-2 {{ request()->routeIs('sponsor*') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                        <i class="fas fa-handshake mr-2"></i> Dashboard Sponsor
                    </a>
                @elseif(auth()->user()->role === 'umkm')
                    <a href="{{ route('umkm.dashboard') }}" class="block px-3 py-2 {{ request()->routeIs('umkm*') ? 'text-green-600 bg-green-50' : 'text-gray-700' }} hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-300 font-medium">
                        <i class="fas fa-store mr-2"></i> Dashboard UMKM
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-300 font-medium">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<!-- Alpine.js untuk dropdown -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Existing JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
            
            // Add smooth animation
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.style.maxHeight = '0';
                mobileMenu.style.overflow = 'hidden';
                mobileMenu.style.transition = 'max-height 0.3s ease-out';
                
                setTimeout(() => {
                    mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                }, 10);
            }
        });
        
        // Close mobile menu when clicking on a link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });
    });
</script>