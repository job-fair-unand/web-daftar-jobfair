@extends('layouts.guest')

@section('title', 'Perusahaan')

@section('content')
    <div class="relative w-full">
        <div class="w-full h-56 md:h-80 flex items-center justify-center" style="background-image: url('/assets/images/background.jpg'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            <h1 class="relative z-10 text-3xl md:text-5xl font-extrabold text-center bg-gradient-to-r from-green-400 to-yellow-300 bg-clip-text text-transparent leading-tight drop-shadow-lg">
                Perusahaan
            </h1>
        </div>
    </div>
    
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-4xl mx-auto text-center mb-10">
            <p class="text-gray-700 text-base md:text-lg mb-4">
                Berikut adalah daftar perusahaan yang berpartisipasi dalam ACEED EXPO Universitas Andalas. 
                Temukan peluang karier dan informasi lebih lanjut mengenai perusahaan-perusahaan terbaik di Indonesia.
            </p>
            <div class="flex items-center justify-center gap-4 text-sm text-gray-600">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                    <span>{{ $companies->total() }} Perusahaan Terdaftar</span>
                </div>
            </div>
        </div>

        @if($companies->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto" data-has-more="{{ $companies->hasMorePages() ? 'true' : 'false' }}">
                @foreach($companies as $company)
                    <!-- Company Card -->
                    <div class="company-card bg-white rounded-xl shadow-lg p-6 flex flex-col items-center border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-id="{{ $company->id }}">
                        <!-- Company Logo -->
                        <div class="w-20 h-20 mb-4 flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 rounded-full shadow-inner">
                            @if($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" 
                                     alt="{{ $company->user->name }} Logo" 
                                     class="h-14 w-14 object-contain rounded-full"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg" style="display: none;">
                                    {{ substr($company->user->name, 0, 1) }}
                                </div>
                            @else
                                <div class="h-14 w-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    {{ substr($company->user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>

                        <!-- Company Info -->
                        <h3 class="text-lg font-bold mb-2 text-center text-gray-800">{{ $company->user->name }}</h3>
                        <p class="text-gray-600 text-sm text-center mb-4 line-clamp-3">
                            {{ Str::limit($company->user->address ?? 'Perusahaan terpercaya yang bergerak di berbagai bidang industri dan menyediakan peluang karir yang menarik untuk para profesional muda.', 100) }}
                        </p>

                        <!-- Company Stats -->
                        <div class="flex items-center gap-4 mb-4 text-xs text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Terverifikasi
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ Str::limit(explode(',', $company->user->address)[0] ?? 'Jakarta', 15) }}
                            </div>
                        </div>

                        <!-- Action Button -->
                        <button onclick="openModal('modal-{{ $company->id }}')" class="inline-flex items-center px-6 py-2 rounded-lg bg-gradient-to-r from-green-600 to-yellow-400 text-white font-semibold shadow-lg hover:from-green-700 hover:to-yellow-500 transition-all duration-300 transform hover:scale-105 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat Detail
                        </button>
                    </div>

                    <!-- Modal Company Detail -->
                    <div id="modal-{{ $company->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-60 backdrop-blur-sm">
                        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
                            <!-- Modal Container -->
                            <div class="inline-block w-full max-w-4xl my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                                
                                <!-- Modal Header -->
                                <div class="relative bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 text-white">
                                    <div class="absolute inset-0 bg-black/20"></div>
                                    
                                    <!-- Close Button -->
                                    <button onclick="closeModal('modal-{{ $company->id }}')" 
                                            class="absolute top-4 right-4 z-20 text-white/80 hover:text-white hover:bg-white/20 rounded-full p-2 transition-all duration-200">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    
                                    <div class="relative z-10 p-8">
                                        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                                            <!-- Company Logo -->
                                            <div class="flex-shrink-0">
                                                @if($company->logo)
                                                    <img src="{{ asset('storage/' . $company->logo) }}" 
                                                         alt="{{ $company->user->name }} Logo" 
                                                         class="h-24 w-24 object-contain bg-white rounded-2xl p-3 shadow-lg"
                                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                    <div class="h-24 w-24 bg-white rounded-2xl flex items-center justify-center text-gray-700 font-bold text-2xl shadow-lg" style="display: none;">
                                                        {{ substr($company->user->name, 0, 1) }}
                                                    </div>
                                                @else
                                                    <div class="h-24 w-24 bg-white rounded-2xl flex items-center justify-center text-gray-700 font-bold text-2xl shadow-lg">
                                                        {{ substr($company->user->name, 0, 1) }}
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <!-- Company Header Info -->
                                            <div class="flex-1 text-center md:text-left">
                                                <h3 class="text-3xl font-bold mb-2">{{ $company->user->name }}</h3>
                                                <p class="text-white/90 text-lg mb-3">Perusahaan Resmi ACEED EXPO 2025</p>
                                                
                                                <!-- Quick Stats -->
                                                <div class="flex flex-wrap justify-center md:justify-start gap-3 text-sm">
                                                    <div class="bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 flex items-center">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        Terverifikasi
                                                    </div>
                                                    <div class="bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 flex items-center">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                        {{ $company->created_at->format('M Y') }}
                                                    </div>
                                                    <div class="bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 flex items-center">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                        {{ Str::limit(explode(',', $company->user->address)[0] ?? 'Indonesia', 15) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Body -->
                                <div class="p-8 max-h-[60vh] overflow-y-auto">
                                    <div class="mb-8">
                                        <h4 class="text-2xl font-bold text-gray-800 mb-4">Tentang {{ $company->user->name }}</h4>
                                        <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-6 rounded-xl border border-blue-100">
                                            <p class="text-gray-700 leading-relaxed text-lg">
                                                <span class="font-semibold text-blue-600">{{ $company->user->name }}</span> adalah perusahaan terpercaya yang berpartisipasi dalam ACEED EXPO & COMPETIFEST 2025 Universitas Andalas. 
                                                Kami berkomitmen untuk memberikan peluang karir terbaik bagi para mahasiswa, fresh graduate, dan profesional muda yang berkualitas.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Contact Information -->
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                        <div>
                                            <h4 class="text-xl font-bold text-gray-800 mb-4">📧 Informasi Kontak</h4>
                                            <div class="space-y-4">
                                                <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-600 mb-1">Email Perusahaan</p>
                                                        <a href="mailto:{{ $company->user->email }}" class="text-green-600 hover:text-green-700 font-semibold">
                                                            {{ $company->user->email }}
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                @if($company->user->phone_number)
                                                <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-600 mb-1">Nomor Telepon</p>
                                                        <a href="tel:{{ $company->user->phone_number }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                                                            {{ $company->user->phone_number }}
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif

                                                @if($company->user->address)
                                                <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-600 mb-1">Alamat Kantor</p>
                                                        <p class="text-gray-800 font-medium">{{ $company->user->address }}</p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div>
                                            <h4 class="text-xl font-bold text-gray-800 mb-4">📊 Status & Info</h4>
                                            <div class="space-y-4">
                                                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                                    <p class="font-semibold text-green-800">✅ Status Verifikasi</p>
                                                    <p class="text-green-700 text-sm">Email Terverifikasi & Perusahaan Aktif</p>
                                                </div>
                                                
                                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                                    <p class="font-semibold text-blue-800">📅 Tanggal Bergabung</p>
                                                    <p class="text-blue-700 text-sm">{{ $company->created_at->format('d F Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Call to Action -->
                                    <div class="bg-gradient-to-r from-green-50 via-blue-50 to-purple-50 border border-gray-200 rounded-2xl p-6 mt-8">
                                        <div class="text-center mb-6">
                                            <h4 class="text-xl font-bold text-gray-800 mb-2">Punya pertanyaan?</h4>
                                            <p class="text-gray-600">Kirim pertanyaan Anda ke {{ $company->user->name }}</p>
                                        </div>
                                        
                                        <div class="flex flex-col sm:flex-row gap-4">
                                            <a href="mailto:{{ $company->user->email }}?subject=Inquiry%20from%20ACEED%20EXPO%202025" 
                                               class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-4 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition-all duration-300 text-center">
                                                📧 Kirim Email Pertanyaan
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
            @if($companies->hasMorePages())
                <div class="text-center mt-12">
                    <button id="loadMore" 
                            data-page="{{ $companies->currentPage() + 1 }}" 
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        <span>Muat Lebih Banyak</span>
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
                        Memuat...
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
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Perusahaan Terdaftar</h3>
                    <p class="text-gray-500 mb-6">Saat ini belum ada perusahaan yang mendaftar untuk ACEED EXPO.</p>
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

        // Load More Functionality - Simple & Direct
        document.addEventListener('DOMContentLoaded', function() {
            const loadMoreBtn = document.getElementById('loadMore');
            const loadingBtn = document.getElementById('loading');
            const container = document.querySelector('.grid');
            
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
                        const newItems = doc.querySelector('.grid').innerHTML;
                        
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
                        
                        const hasMore = doc.querySelector('.grid').dataset.hasMore === 'true';
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
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Semua Perusahaan Telah Dimuat!</h3>
                                        <p class="text-gray-600 text-sm">Total: ${container.children.length} perusahaan</p>
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
        
        .company-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .company-card:hover {
            transform: translateY(-8px);
        }
    </style>
@endsection