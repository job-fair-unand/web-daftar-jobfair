@extends('layouts.guest')

@section('title', 'ACEED EXPO Universitas Andalas 2025')

<style>
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
    <section class="relative bg-gradient-to-br from-white to-green-50 pt-0 overflow-hidden">
        <div class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-yellow-50 to-transparent"></div>
        <div class="max-w-screen-xl px-4 py-4 mx-auto lg:py-8">
            <div class="grid lg:grid-cols-12 gap-8 items-center">
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
                <div class="lg:col-span-5 relative">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
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

    <!-- Event Series Section -->
    <section id="events" class="py-20 bg-gradient-to-br from-yellow-50 to-green-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Rangkaian <span class="text-yellow-600">Acara</span></h2>
                <p class="text-gray-600">Berbagai kegiatan inspiratif untuk mendukung karir, bisnis, dan pengembangan diri.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="p-6 bg-white border-l-4 border-yellow-500 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-start gap-3 mb-3">
                        <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927C9.469 1.837 10.531 1.837 10.951 2.927l1.212 3.327h3.545c1.2 0 1.698 1.545.845 2.318l-2.89 2.647 1.021 3.457c.32 1.085-.94 1.976-1.908 1.316L10 13.187l-3.776 2.805c-.968.66-2.228-.231-1.908-1.316l1.021-3.457-2.89-2.647c-.853-.773-.355-2.318.845-2.318h3.545L9.049 2.927z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Webinar</h3>
                    </div>
                    <p class="text-sm text-gray-600">Webinar profesional seputar kerja, bisnis, dan beasiswa.</p>
                </div>

                <!-- Card 2 -->
                <div class="p-6 bg-white border-l-4 border-green-500 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-start gap-3 mb-3">
                        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 000 2h2v10a1 1 0 001 1h8a1 1 0 001-1V6h2a1 1 0 100-2H3zm6 0h2v2H9V4z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Career & Internship</h3>
                    </div>
                    <p class="text-sm text-gray-600">Akses langsung ke perusahaan & walk-in interview.</p>
                </div>

                <!-- Card 3 -->
                <div class="p-6 bg-white border-l-4 border-indigo-500 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-start gap-3 mb-3">
                        <svg class="w-6 h-6 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 00-2 2v2h16V5a2 2 0 00-2-2H4zm14 5H2v7a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Entrepreneurship</h3>
                    </div>
                    <p class="text-sm text-gray-600">Pameran usaha mahasiswa, alumni, dan kolaborasi bisnis.</p>
                </div>

                <!-- Card 4 -->
                <div class="p-6 bg-white border-l-4 border-blue-500 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-start gap-3 mb-3">
                        <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-1h2v1zm0-2H9V7h2v4z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Scholarship</h3>
                    </div>
                    <p class="text-sm text-gray-600">Informasi lengkap seputar beasiswa nasional & internasional.</p>
                </div>

                <!-- Card 5 -->
                <div class="p-6 bg-white border-l-4 border-purple-500 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-start gap-3 mb-3">
                        <svg class="w-6 h-6 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a1 1 0 00-1 1v4h12V4a1 1 0 00-1-1H5zM4 9v7a1 1 0 001 1h10a1 1 0 001-1V9H4z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Sponsor Session</h3>
                    </div>
                    <p class="text-sm text-gray-600">Talkshow dan seminar bersama sponsor & industri ternama.</p>
                </div>

                <!-- Card 6 -->
                <div class="p-6 bg-white border-l-4 border-pink-500 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-start gap-3 mb-3">
                        <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 3a1 1 0 011-1h3.586a1 1 0 01.707.293l1.414 1.414A1 1 0 0010.414 4H16a1 1 0 011 1v2H3V3zM3 8h14v9a1 1 0 01-1 1H4a1 1 0 01-1-1V8z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Bazaar</h3>
                    </div>
                    <p class="text-sm text-gray-600">Ajang promosi & penjualan UMKM, alumni, dan mahasiswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-yellow-50">
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

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-yellow-600 to-yellow-700">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Memulai Karir Impianmu?
            </h2>
            <p class="text-xl text-yellow-100 mb-8 max-w-2xl mx-auto">
                Jangan lewatkan kesempatan emas ini! Bergabunglah dengan ribuan peserta lainnya di ACEED EXPO 2025.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('registration') }}" 
                   class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-yellow-600 bg-white rounded-lg shadow-lg hover:bg-gray-50 transition duration-200">
                    Daftar Sekarang
                </a>
            </div>
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