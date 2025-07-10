@extends('layouts.guest')

@section('title', 'ACEED EXPO Universitas Andalas 2025')

<style>
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}
.animate-float {
    animation: float infinite ease-in-out;
}
@keyframes sponsor-marquee {
  0% { transform: translateX(0%); }
  100% { transform: translateX(-50%); }
}
.marquee-wrapper {
  overflow: hidden;
  position: relative;
}
.marquee-track {
  display: flex;
  width: max-content;
  animation: sponsor-marquee 20s linear infinite;
}
.marquee-track:hover {
  animation-play-state: paused;
}
.marquee-track img {
  height: 3rem;
  margin-right: 4rem;
  object-fit: contain;
}
</style>


@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative bg-gradient-to-br from-white to-green-50 pt-0 overflow-hidden">
        <div class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-yellow-50 to-transparent"></div>
        <div class="max-w-screen-xl px-4 py-4 mx-auto lg:py-8">
            <div class="grid lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-7 space-y-8 relative">
                    <div class="space-y-4">
                        <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-yellow-100 bg-yellow-50">
                            <span class="text-sm font-medium text-yellow-600">ACEED EXPO UNAND</span>
                        </div>
                        <h1 class="text-4xl font-bold tracking-tight md:text-5xl lg:text-6xl text-gray-900">
                            Andalas Career, Entrepreneurship, Education, And Development Expo
                            <span class="text-yellow-600 inline-block">Unand 2025</span>
                        </h1>
                        <p class="text-lg text-gray-600 leading-relaxed max-w-2xl">
                            <span class="font-semibold text-yellow-600">Universitas Andalas</span>
                            menghadirkan Andalas Career, Entrepreneurship, Education, And Development Expo 2025: Kesempatan emas untuk bertemu perusahaan ternama dan memulai
                            <span class="font-semibold">karier impianmu</span>.
                        </p>
                    </div>
                    
                    <!-- CTA Button moved to hero section -->
                    <div class="pt-4">
                        <a href="{{ route('registration') }}" 
                           class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-white bg-yellow-600 rounded-lg shadow-lg hover:bg-yellow-700 transition duration-200 transform hover:scale-105">
                            Daftar Sekarang
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-8 pt-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-600 mb-2">9-11</div>
                            <div class="text-sm text-gray-600">September 2025</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-600 mb-2">50+</div>
                            <div class="text-sm text-gray-600">Perusahaan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-600 mb-2">1000+</div>
                            <div class="text-sm text-gray-600">Lowongan</div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-5 relative mt-24">
                    <div class="absolute inset-0 bg-yellow-100 rounded-xl opacity-20 blur-3xl"></div>
                    <img src="/assets/images/job-fair-preview.jpg" 
                         alt="Job Fair Preview" 
                         class="relative rounded-lg shadow-lg w-full h-auto transform hover:scale-[1.02] transition duration-300"
                         onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'">
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-gradient-to-br from-white to-yellow-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Tentang <span class="text-yellow-600">Universitas Andalas</span></h2>
                <p class="text-gray-600">Fakta menarik tentang komunitas akademik kami yang siap mendukung karir impianmu.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-white rounded-xl border border-gray-100 shadow-lg hover:shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out" style="animation-delay: 0.1s;">
                    <svg class="w-10 h-10 mx-auto text-yellow-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <div class="text-3xl font-bold text-yellow-600 mb-2">33.506</div>
                    <div class="text-sm text-gray-600">Jumlah Mahasiswa</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl border border-gray-100 shadow-lg hover:shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out" style="animation-delay: 0.2s;">
                    <svg class="w-10 h-10 mx-auto text-yellow-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    <div class="text-3xl font-bold text-yellow-600 mb-2">3.002</div>
                    <div class="text-sm text-gray-600">Jumlah Wisudawan 2024</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl border border-gray-100 shadow-lg hover:shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out" style="animation-delay: 0.3s;">
                    <svg class="w-10 h-10 mx-auto text-yellow-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m0 0h2M7 7h10M7 11h10M7 15h10"/>
                    </svg>
                    <div class="text-3xl font-bold text-yellow-600 mb-2">15</div>
                    <div class="text-sm text-gray-600">Jumlah Fakultas</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl border border-gray-100 shadow-lg hover:shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out" style="animation-delay: 0.4s;">
                    <svg class="w-10 h-10 mx-auto text-yellow-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253"/>
                    </svg>
                    <div class="text-3xl font-bold text-yellow-600 mb-2">56</div>
                    <div class="text-sm text-gray-600">Jumlah Program Studi</div>
                </div>
            </div>
        </div>
    </section>

    <section id="sponsors" class="py-20 bg-gradient-to-br from-yellow-50 to-green-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Our <span class="text-yellow-600">Sponsors</span></h2>
            <p class="text-gray-600">Kami berterima kasih atas dukungan luar biasa dari para sponsor kami.</p>
            </div>

            <div class="marquee-wrapper py-6">
            <div class="marquee-track">
                <!-- 1 set logo sponsor -->
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 1">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 2">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 3">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 4">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 5">
                <!-- Duplicate untuk looping -->
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 1">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 2">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 3">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 4">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Sponsor 5">
            </div>
            </div>
        </div>
    </section>

    <section id="timeline-interactive" class="py-20 bg-gradient-to-br from-yellow-50 to-green-50 overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Rangkaian <span class="text-yellow-600">Timeline</span> Acara ACEED 2025</h2>
                <p class="text-gray-600">Jelajahi setiap fase penting dari ACEED EXPO & COMPETIFEST 2025: Job For Youth: From Campus to Career, mulai dari persiapan hingga pengumuman pemenang.</p>
            </div>

            <div class="relative w-full">
                <div class="absolute hidden md:block left-1/2 transform -translate-x-1/2 w-1 bg-gray-300 h-full"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-12 md:gap-y-24">

                    <div class="md:col-start-1 md:text-right relative">
                        <div class="md:pr-10">
                            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-yellow-500 md:border-l-0 md:border-r-4 md:border-yellow-500 transition hover:shadow-xl group">
                                <div class="absolute hidden md:block right-0 top-1/2 transform translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-yellow-500 rounded-full z-10 border-4 border-white"></div>
                                <div class="absolute hidden md:block right-0 top-1/2 transform translate-x-1/2 -translate-y-1/2 -mr-6 w-0 h-0 border-t-[8px] border-b-[8px] border-l-[16px] border-t-transparent border-b-transparent border-l-yellow-500"></div>

                                <h3 class="text-lg font-bold text-yellow-700 mb-2">ACEED Competifest Dimulai</h3>
                                <p class="text-sm font-medium text-gray-500 mb-3">7 Juli 2025</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>Pembukaan Pendaftaran & Pengumpulan Karya untuk:
                                        <ul class="list-disc list-inside ml-4">
                                            <li>Lomba Reels</li>
                                            <li>Career Escape Room</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-start-2 relative">
                        <div class="md:pl-10">
                            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-500 transition hover:shadow-xl group">
                                <div class="absolute hidden md:block left-0 top-1/2 transform -translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-green-500 rounded-full z-10 border-4 border-white"></div>
                                <div class="absolute hidden md:block left-0 top-1/2 transform -translate-x-1/2 -translate-y-1/2 -ml-6 w-0 h-0 border-t-[8px] border-b-[8px] border-r-[16px] border-t-transparent border-b-transparent border-r-green-500"></div>

                                <h3 class="text-lg font-bold text-green-700 mb-2">ACEED Webinar Pekan 1</h3>
                                <p class="text-sm font-medium text-gray-500 mb-3">4 - 7 Agustus 2025</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>4 Agustus: Pembukaan Rangkaian Acara & Sesi "Ready2Work By ACEED".</li>
                                    <li>5 - 7 Agustus: Sesi Webinar Slot 1 - 12.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-start-1 md:text-right relative">
                        <div class="md:pr-10">
                            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-blue-500 md:border-l-0 md:border-r-4 md:border-blue-500 transition hover:shadow-xl group">
                                <div class="absolute hidden md:block right-0 top-1/2 transform translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-blue-500 rounded-full z-10 border-4 border-white"></div>
                                <div class="absolute hidden md:block right-0 top-1/2 transform translate-x-1/2 -translate-y-1/2 -mr-6 w-0 h-0 border-t-[8px] border-b-[8px] border-l-[16px] border-t-transparent border-b-transparent border-l-blue-500"></div>

                                <h3 class="text-lg font-bold text-blue-700 mb-2">ACEED Webinar Pekan 2</h3>
                                <p class="text-sm font-medium text-gray-500 mb-3">12 - 14 Agustus 2025</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>Lanjutan Sesi Webinar Slot 13 - 23.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-start-2 relative">
                        <div class="md:pl-10">
                            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-purple-500 transition hover:shadow-xl group">
                                <div class="absolute hidden md:block left-0 top-1/2 transform -translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-purple-500 rounded-full z-10 border-4 border-white"></div>
                                <div class="absolute hidden md:block left-0 top-1/2 transform -translate-x-1/2 -translate-y-1/2 -ml-6 w-0 h-0 border-t-[8px] border-b-[8px] border-r-[16px] border-t-transparent border-b-transparent border-r-purple-500"></div>

                                <h3 class="text-lg font-bold text-purple-700 mb-2">Penutupan Kompetisi & Webinar Akhir</h3>
                                <p class="text-sm font-medium text-gray-500 mb-3">21 - 24 Agustus 2025</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>21 - 24 Agustus: Sesi Webinar Slot 24 - 29.</li>
                                    <li>23 Agustus: Penutupan Pendaftaran & Pengumpulan Karya Kompetisi (Lomba Reels & Career Escape Room).</li>
                                    <li>24 Agustus: Penutupan Rangkaian ACEED Webinar 2025.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-start-1 md:text-right relative">
                        <div class="md:pr-10">
                            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-indigo-500 md:border-l-0 md:border-r-4 md:border-indigo-500 transition hover:shadow-xl group">
                                <div class="absolute hidden md:block right-0 top-1/2 transform translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-indigo-500 rounded-full z-10 border-4 border-white"></div>
                                <div class="absolute hidden md:block right-0 top-1/2 transform translate-x-1/2 -translate-y-1/2 -mr-6 w-0 h-0 border-t-[8px] border-b-[8px] border-l-[16px] border-t-transparent border-b-transparent border-l-indigo-500"></div>

                                <h3 class="text-lg font-bold text-indigo-700 mb-2">ACEED EXPO & ACEED SEMINAR Hari 1</h3>
                                <p class="text-sm font-medium text-gray-500 mb-3">Selasa, 9 September 2025</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>Upacara Pembukaan Formal ACEED EXPO.</li>
                                    <li>Sesi Inspiration Talk & Company Talk.</li>
                                    <li>Seminar Sesi 1 & 2 (Insight Session by Company).</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-start-2 relative">
                        <div class="md:pl-10">
                            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-pink-500 transition hover:shadow-xl group">
                                <div class="absolute hidden md:block left-0 top-1/2 transform -translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-pink-500 rounded-full z-10 border-4 border-white"></div>
                                <div class="absolute hidden md:block left-0 top-1/2 transform -translate-x-1/2 -translate-y-1/2 -ml-6 w-0 h-0 border-t-[8px] border-b-[8px] border-r-[16px] border-t-transparent border-b-transparent border-r-pink-500"></div>

                                <h3 class="text-lg font-bold text-pink-700 mb-2">ACEED EXPO & ACEED SEMINAR Hari 2</h3>
                                <p class="text-sm font-medium text-gray-500 mb-3">Rabu, 10 September 2025</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>Ready2Work by ACEED: Talkshow Career Preparation.</li>
                                    <li>ACEED Competifest: Career Innovation Challenge.</li>
                                    <li>Seminar Sesi 3 & 4.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-start-1 md:text-right relative">
                        <div class="md:pr-10">
                            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-teal-500 md:border-l-0 md:border-r-4 md:border-teal-500 transition hover:shadow-xl group">
                                <div class="absolute hidden md:block right-0 top-1/2 transform translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-teal-500 rounded-full z-10 border-4 border-white"></div>
                                <div class="absolute hidden md:block right-0 top-1/2 transform translate-x-1/2 -translate-y-1/2 -mr-6 w-0 h-0 border-t-[8px] border-b-[8px] border-l-[16px] border-t-transparent border-b-transparent border-l-teal-500"></div>

                                <h3 class="text-lg font-bold text-teal-700 mb-2">ACEED EXPO Hari & ACEED SEMINAR Hari 3 </h3>
                                <p class="text-sm font-medium text-gray-500 mb-3">Kamis, 11 September 2025</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>Insight Session by Entrepreneurship & Scholarship.</li>
                                    <li>Seminar Sesi 5 & 6.</li>
                                    <li>Pengumuman Pemenang ACEED Competifest.</li>
                                    <li>Penutupan Resmi ACEED EXPO 2025.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-gradient-to-br from-gray-50 to-yellow-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Pertanyaan <span class="text-yellow-600">Umum</span></h2>
                <p class="text-gray-600">Temukan jawaban untuk pertanyaan yang sering diajukan seputar ACEED EXPO 2025.</p>
            </div>
            <div class="max-w-4xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition faq-toggle" aria-expanded="false" aria-controls="faq-answer-1">
                        <span class="font-medium text-gray-900">Bagaimana cara mendaftar sebagai peserta job fair?</span>
                        <svg class="w-5 h-5 text-gray-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq-answer-1" class="hidden px-6 pb-4 text-gray-600 text-sm">
                        <p>Untuk mendaftar sebagai peserta, kunjungi website resmi ACEED EXPO 2025 di <a href="{{ route('home') }}" class="text-yellow-600 hover:underline">www.aceed.unand.ac.id</a> dan klik tombol "Daftar Sekarang". Isi formulir pendaftaran dengan data diri lengkap, lalu ikuti petunjuk untuk konfirmasi pembayaran (jika ada). Pendaftaran juga tersedia onsite selama acara, tergantung ketersediaan kuota.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition faq-toggle" aria-expanded="false" aria-controls="faq-answer-3">
                        <span class="font-medium text-gray-900">Bisakah alumni dari universitas lain ikut berpartisipasi?</span>
                        <svg class="w-5 h-5 text-gray-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq-answer-3" class="hidden px-6 pb-4 text-gray-600 text-sm">
                        <p>Ya, ACEED EXPO 2025 terbuka untuk alumni dari universitas lain. Peserta dari luar Universitas Andalas dapat mendaftar sebagai peserta job fair, mengikuti webinar, atau berpartisipasi dalam acara lainnya seperti bazar dan sesi sponsor, dengan mengikuti prosedur pendaftaran yang sama melalui website resmi acara.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition faq-toggle" aria-expanded="false" aria-controls="faq-answer-4">
                        <span class="font-medium text-gray-900">Apakah ada biaya untuk mengikuti acara ini?</span>
                        <svg class="w-5 h-5 text-gray-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq-answer-4" class="hidden px-6 pb-4 text-gray-600 text-sm">
                        <p>Partisipasi dalam job fair dan beberapa acara seperti webinar bersifat gratis untuk mahasiswa Universitas Andalas. Namun, beberapa kegiatan seperti workshop atau bazar mungkin memerlukan biaya pendaftaran. Informasi lengkap mengenai biaya dapat ditemukan di website resmi atau hubungi panitia di <a href="mailto:info@aceed.unand.ac.id" class="text-yellow-600 hover:underline">info@aceed.unand.ac.id</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gradient-to-br from-yellow-600 via-green-600 to-yellow-500 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0 bg-gradient-to-r from-yellow-600/30 to-green-600/30"></div>
        <div class="absolute top-0 left-0 w-80 h-80 bg-white/10 rounded-full blur-3xl -translate-x-40 -translate-y-40 opacity-70"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 bg-white/10 rounded-full blur-3xl translate-x-40 translate-y-40 opacity-70"></div>
        
        <!-- Floating particles -->
        <div class="absolute top-16 left-16 w-3 h-3 bg-yellow-200/50 rounded-full animate-float" style="animation-duration: 6s;"></div>
        <div class="absolute top-24 right-24 w-4 h-4 bg-green-200/40 rounded-full animate-float" style="animation-duration: 8s; animation-delay: 1s;"></div>
        <div class="absolute bottom-16 left-32 w-2 h-2 bg-yellow-300/30 rounded-full animate-float" style="animation-duration: 7s; animation-delay: 2s;"></div>
        <div class="absolute bottom-24 right-16 w-3 h-3 bg-green-300/40 rounded-full animate-float" style="animation-duration: 9s; animation-delay: 3s;"></div>
        
        <!-- Main content -->
        <div class="max-w-screen-xl mx-auto px-4 text-center relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Icon/Badge -->
                <div class="inline-flex items-center justify-center w-14 h-14 bg-white/10 backdrop-blur-md rounded-full mb-8 border border-white/20 shadow-lg">
                    <svg class="w-7 h-7 text-yellow-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                
                <!-- Main heading -->
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white mb-6 leading-tight tracking-tight">
                    Bergabunglah dengan
                    <span class="relative inline-block">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-100 via-white to-yellow-200 transition-all duration-500 ease-in-out hover:bg-gradient-to-r hover:from-yellow-200 hover:via-white hover:to-yellow-100">
                            Komunitas Profesional
                        </span>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-yellow-200/60 to-transparent rounded-full"></div>
                    </span>
                </h2>
                
                <!-- Description -->
                <div class="backdrop-blur-md bg-white/5 rounded-2xl p-8 mb-8 border border-white/10 shadow-xl">
                    <p class="text-lg md:text-xl text-white/90 leading-relaxed max-w-3xl mx-auto font-sans">
                        Ratusan alumni telah memulai karir cemerlang mereka melalui ACEED EXPO. 
                        <span class="font-medium text-yellow-100">Jadilah bagian dari kesuksesan ini!</span>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Bottom wave decoration -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-16">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="fill-gray-50"></path>
            </svg>
        </div>
    </section>
    
    <script>
        // FAQ Toggle Functionality
        document.querySelectorAll('.faq-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                const icon = button.querySelector('svg');
                const isExpanded = button.getAttribute('aria-expanded') === 'true';

                // Toggle answer visibility
                answer.classList.toggle('hidden');

                // Rotate icon
                icon.classList.toggle('rotate-180');

                // Update aria-expanded
                button.setAttribute('aria-expanded', !isExpanded);
            });
        });
    </script>
@endsection