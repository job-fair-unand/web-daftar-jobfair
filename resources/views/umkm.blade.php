@extends('layouts.guest')

@section('title', 'UMKM')

@section('content')
    <div class="relative w-full">
        <div class="w-full h-56 md:h-80 flex items-center justify-center" style="background-image: url('/assets/images/background.jpg'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            <h1 class="relative z-10 text-3xl md:text-5xl font-extrabold text-center bg-gradient-to-r from-green-400 to-yellow-300 bg-clip-text text-transparent leading-tight drop-shadow-lg">
                UMKM & Usaha Mikro
            </h1>
        </div>
    </div>
    
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-4xl mx-auto text-center mb-10">
            <p class="text-gray-700 text-base md:text-lg mb-4">
                Temukan berbagai UMKM dan usaha mikro kreatif yang berpartisipasi dalam ACEED EXPO 2025. 
                Dukung produk lokal dan inovasi dari para pengusaha muda Indonesia.
            </p>
        </div>

        @if($businesses->count() > 0)
            <div id="businessGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto" data-has-more="{{ $businesses->hasMorePages() ? 'true' : 'false' }}">
                @foreach($businesses as $business)
                    <!-- Business Card -->
                    <div class="business-card bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-id="{{ $business->id }}">
                        <!-- Business Header -->
                        <div class="w-20 h-20 mb-4 mx-auto flex items-center justify-center bg-gradient-to-br from-green-100 to-emerald-100 rounded-full shadow-inner">
                            @if($business->logo)
                                <img src="{{ asset('storage/' . $business->logo) }}" 
                                     alt="{{ $business->user->name }} Logo" 
                                     class="h-14 w-14 object-contain rounded-full"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg" style="display: none;">
                                    {{ substr($business->user->name, 0, 1) }}
                                </div>
                            @else
                                <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    {{ substr($business->user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>

                        <!-- Business Info -->
                        <h3 class="text-lg font-bold mb-2 text-center text-gray-800">{{ $business->user->name }}</h3>
                        <p class="text-gray-600 text-sm text-center mb-4 line-clamp-3">
                            {{ Str::limit($business->description, 100) ?: 'UMKM berkualitas yang menyediakan produk dan layanan terbaik untuk mendukung perekonomian lokal.' }}
                        </p>

                        <!-- Business Stats -->
                        <div class="grid grid-cols-2 gap-2 mb-4 text-xs">
                            <div class="bg-green-50 rounded-lg p-2 text-center">
                                <div class="flex items-center justify-center mb-1">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <span class="text-green-700 font-semibold">{{ ucfirst($business->type ?: 'UMKM') }}</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <button onclick="openModal('modal-{{ $business->id }}')" 
                                class="w-full inline-flex items-center justify-center px-6 py-2 rounded-lg bg-gradient-to-r from-green-600 to-emerald-400 text-white font-semibold shadow-lg hover:from-green-700 hover:to-emerald-500 transition-all duration-300 transform hover:scale-105 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat Detail
                        </button>
                    </div>

                    <!-- Modal untuk setiap business -->
                    <div id="modal-{{ $business->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-60 backdrop-blur-sm">
                        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                            <div class="inline-block w-full max-w-4xl my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                                
                                <!-- Modal Header -->
                                <div class="relative bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 text-white">
                                    <div class="absolute inset-0 bg-black/20"></div>
                                    
                                    <!-- Close Button -->
                                    <button onclick="closeModal('modal-{{ $business->id }}')" 
                                            class="absolute top-4 right-4 z-20 text-white/80 hover:text-white hover:bg-white/20 rounded-full p-2 transition-all duration-200">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    
                                    <div class="relative z-10 p-8">
                                        <div class="flex items-center space-x-6">
                                            <div class="h-24 w-24 bg-white rounded-2xl flex items-center justify-center shadow-lg overflow-hidden">
                                                @if($business->logo)
                                                    <img src="{{ asset('storage/' . $business->logo) }}" 
                                                        alt="{{ $business->user->name }} Logo" 
                                                        class="h-14 w-14 object-contain rounded-full"
                                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                    <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg" style="display: none;">
                                                        {{ substr($business->user->name, 0, 1) }}
                                                    </div>
                                                @else
                                                    <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                                        {{ substr($business->user->name, 0, 1) }}
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <div class="flex-1">
                                                <h3 class="text-3xl font-bold mb-2">{{ $business->user->name }}</h3>
                                                <p class="text-white/90 text-lg mb-3">{{ ucfirst($business->type ?: 'UMKM') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Body -->
                                <div class="p-8 max-h-[60vh] overflow-y-auto">
                                    <div class="mb-8">
                                        <h4 class="text-2xl font-bold text-gray-800 mb-4">Tentang {{ $business->user->name }}</h4>
                                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                                            <p class="text-gray-700 leading-relaxed text-lg">
                                                <span class="font-semibold text-green-600">{{ $business->user->name }}</span> adalah UMKM berkualitas yang berpartisipasi dalam ACEED EXPO 2025.
                                                <br><br>
                                                {{ $business->description ?: 'Kami berkomitmen menyediakan produk dan layanan terbaik untuk mendukung perekonomian lokal dan memberikan nilai tambah bagi masyarakat.' }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Business Information -->
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                                        <div>
                                            <h4 class="text-xl font-bold text-gray-800 mb-4">Informasi Kontak</h4>
                                            <div class="space-y-4">
                                                <div class="flex items-start p-4 bg-blue-50 rounded-lg">
                                                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-blue-800">Email</p>
                                                        <p class="text-blue-700 text-sm">{{ $business->user->email }}</p>
                                                    </div>
                                                </div>
                                                
                                                @if($business->user->phone_number)
                                                <div class="flex items-start p-4 bg-green-50 rounded-lg">
                                                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-green-800">Telepon</p>
                                                        <p class="text-green-700 text-sm">{{ $business->user->phone_number }}</p>
                                                    </div>
                                                </div>
                                                @endif

                                                @if($business->user->address)
                                                <div class="flex items-start p-4 bg-purple-50 rounded-lg">
                                                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-purple-800">Alamat</p>
                                                        <p class="text-purple-700 text-sm">{{ $business->user->address }}</p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Call to Action -->
                                    <div class="bg-gradient-to-r from-green-50 via-emerald-50 to-teal-50 border border-green-200 rounded-2xl p-6">
                                        <div class="text-center mb-6">
                                            <h4 class="text-xl font-bold text-gray-800 mb-2">Tertarik Berkolaborasi?</h4>
                                            <p class="text-gray-600">Hubungi langsung UMKM ini untuk informasi produk, kerjasama, atau partnership.</p>
                                        </div>
                                        
                                        <div class="flex flex-col sm:flex-row gap-4">
                                            <a href="mailto:{{ $business->user->email }}" 
                                               class="flex-1 bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-4 rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 text-center flex items-center justify-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                Hubungi UMKM
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Section -->
            @if($businesses->hasMorePages())
                <div class="text-center mt-12">
                    <button id="loadMore" 
                            data-page="{{ $businesses->currentPage() + 1 }}" 
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-lg font-medium hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        <span>Muat UMKM Lainnya</span>
                        <svg class="w-5 h-5 ml-2 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Loading State -->
                    <button id="loading" class="hidden inline-flex items-center px-8 py-4 bg-gray-500 text-white rounded-lg font-medium">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memuat UMKM...
                    </button>
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada UMKM Terdaftar</h3>
                    <p class="text-gray-500 mb-6">Saat ini belum ada UMKM yang mendaftar untuk ACEED EXPO.</p>
                </div>
            </div>
        @endif
    </div>

    <!-- JavaScript -->
    <script>
        // Modal Functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        // Load More Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const loadMoreBtn = document.getElementById('loadMore');
            const loadingBtn = document.getElementById('loading');
            const container = document.getElementById('businessGrid');
            
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', async function() {
                    loadMoreBtn.classList.add('hidden');
                    loadingBtn.classList.remove('hidden');
                    
                    const nextPage = loadMoreBtn.dataset.page;
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.set('page', nextPage);
                    
                    try {
                        const response = await fetch(currentUrl.toString(), {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        
                        if (!response.ok) throw new Error('Network response was not ok');
                        
                        const html = await response.text();
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newItems = doc.querySelector('#businessGrid').innerHTML;
                        
                        const tempContainer = document.createElement('div');
                        tempContainer.innerHTML = newItems;
                        
                        const existingIds = Array.from(container.querySelectorAll('[data-id]')).map(el => el.dataset.id);
                        const newElements = Array.from(tempContainer.children).filter(el => {
                            return !existingIds.includes(el.dataset.id);
                        });
                        
                        newElements.forEach((el, index) => {
                            el.style.opacity = '0';
                            el.style.transform = 'translateY(20px)';
                            container.appendChild(el);
                            
                            setTimeout(() => {
                                el.style.transition = 'all 0.5s ease-out';
                                el.style.opacity = '1';
                                el.style.transform = 'translateY(0)';
                            }, index * 100);
                        });
                        
                        const hasMore = doc.querySelector('#businessGrid').dataset.hasMore === 'true';
                        if (hasMore) {
                            loadMoreBtn.dataset.page = parseInt(nextPage) + 1;
                            loadMoreBtn.classList.remove('hidden');
                        } else {
                            // Show completion message
                            loadingBtn.outerHTML = `
                                <div class="text-center">
                                    <div class="bg-green-50 border border-green-200 rounded-lg p-6 max-w-md mx-auto">
                                        <svg class="w-12 h-12 mx-auto text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Semua UMKM Telah Dimuat!</h3>
                                        <p class="text-gray-600 text-sm">Total: ${container.children.length} UMKM</p>
                                    </div>
                                </div>
                            `;
                        }
                        
                    } catch (error) {
                        console.error('Error:', error);
                        loadMoreBtn.textContent = 'Gagal Memuat - Coba Lagi';
                        loadMoreBtn.classList.remove('hidden');
                        loadMoreBtn.classList.add('bg-red-500', 'hover:bg-red-600');
                    } finally {
                        loadingBtn.classList.add('hidden');
                    }
                });
            }

            // Modal event listeners
            document.addEventListener('click', function(event) {
                if (event.target.id && event.target.id.startsWith('modal-') && 
                    event.target.classList.contains('fixed')) {
                    closeModal(event.target.id);
                }
            });

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    const openModals = document.querySelectorAll('[id^="modal-"]:not(.hidden)');
                    openModals.forEach(modal => {
                        closeModal(modal.id);
                    });
                }
            });
        });
    </script>

    <!-- CSS -->
    <style>
        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
        
        .business-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .business-card:hover {
            transform: translateY(-8px);
        }
    </style>
@endsection