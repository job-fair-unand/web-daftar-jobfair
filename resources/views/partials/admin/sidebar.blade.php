<aside class="w-64 bg-white shadow-lg hidden md:flex md:flex-col sticky top-0 h-screen overflow-y-auto">
    <div class="p-6 flex items-center space-x-3">
        <img src="{{ asset('assets/icons/aceed.png') }}" alt="NEO Logo" class="h-8 w-auto object-contain">
        <h2 class="text-xl font-bold text-blue-700">Job Fair</h2>
    </div>
    
    <nav class="mt-5 px-4 flex-grow">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-4 py-2.5 mt-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors duration-150 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'font-medium' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('admin.company') }}" 
           class="flex items-center px-4 py-2.5 mt-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors duration-150 {{ request()->routeIs('admin.company') ? 'bg-blue-100 text-blue-700 font-semibold' : 'font-medium' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            <span>Perusahaan</span>
        </a>
        <a href="{{ route('admin.sponsor') }}" 
           class="flex items-center px-4 py-2.5 mt-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors duration-150 {{ request()->routeIs('admin.sponsor') ? 'bg-blue-100 text-blue-700 font-semibold' : 'font-medium' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Sponsor</span>
        </a>
        <a href="{{ route('admin.umkm') }}" 
           class="flex items-center px-4 py-2.5 mt-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors duration-150 {{ request()->routeIs('admin.umkm') ? 'bg-blue-100 text-blue-700 font-semibold' : 'font-medium' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            <span>UMKM</span>
        </a>
        <a href="{{ route('admin.scholarship') }}" 
           class="flex items-center px-4 py-2.5 mt-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors duration-150 {{ request()->routeIs('admin.scholarship') ? 'bg-blue-100 text-blue-700 font-semibold' : 'font-medium' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            <span>Beasiswa</span>
        </a>
        <a href="{{ route('admin.participant') }}" 
           class="flex items-center px-4 py-2.5 mt-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors duration-150 {{ request()->routeIs('admin.participant') ? 'bg-blue-100 text-blue-700 font-semibold' : 'font-medium' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span>Peserta</span>
        </a>
       
        <!-- Fixed Dropdown Menu untuk Piket -->
        {{-- <div x-data="{ isOpen: {{ request()->routeIs('admin.delegations.index') || request()->routeIs('duty.index') || request()->routeIs('admin.qrduty.index') ? 'true' : 'false' }} }" class="relative mt-2">
            <button @click="isOpen = !isOpen" type="button" class="w-full flex items-center justify-between px-4 py-2.5 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all duration-200 ease-in-out font-medium {{ request()->routeIs('admin.delegations') || request()->routeIs('duty.index') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Piket</span>
                </div>
                <svg class="w-4 h-4 transform transition-transform duration-200" :class="{'rotate-180': isOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            
            <div x-show="isOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                 x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                 @click.away="isOpen = {{ request()->routeIs('admin.delegations.index') || request()->routeIs('duty.index') || request()->routeIs('admin.qrduty.index') ? 'true' : 'false' }}"
                 class="pl-4 mt-1 space-y-1">
                <a href="{{ route('admin.qrduty.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all duration-200 ease-in-out {{ request()->routeIs('admin.qrduty') ? 'bg-blue-50 text-blue-700 font-semibold' : 'font-medium' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                    </svg>
                    <span>QR Code Piket</span>
                </a>
                <a href="{{ route('duty.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all duration-200 ease-in-out {{ request()->routeIs('duty.index') ? 'bg-blue-50 text-blue-700 font-semibold' : 'font-medium' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Manajemen Piket</span>
                </a>
                <a href="{{ route('admin.delegations.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all duration-200 ease-in-out {{ request()->routeIs('admin.delegations.index') ? 'bg-blue-50 text-blue-700 font-semibold' : 'font-medium' }}">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                    <span>Pergantian Piket</span>
                </a>
            </div>
        </div> --}}
        
    </nav>
    
    <div class="px-6 py-4 mt-auto border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-2.5 text-red-600 hover:bg-red-50 hover:text-red-700 hover:cursor-pointer rounded-lg transition-colors duration-150 font-medium">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>