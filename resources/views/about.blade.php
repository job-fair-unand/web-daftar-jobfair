@extends('layouts.guest')

@section('title', 'Tentang')

@section('content')
    <div class="relative w-full">
        <div class="w-full h-56 md:h-80 flex items-center justify-center" style="background-image: url('/assets/images/background.jpg'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            <h1 class="relative z-10 text-3xl md:text-5xl font-extrabold text-center bg-gradient-to-r from-green-400 to-yellow-300 bg-clip-text text-transparent leading-tight drop-shadow-lg">
                About ACEED EXPO 2025
            </h1>
        </div>
    </div>
    
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <p class="text-gray-700 text-base md:text-lg mb-4 text-justify">
                Universitas Andalas sebagai salah satu perguruan tinggi terkemuka di Indonesia, memiliki tanggung jawab untuk mempersiapkan mahasiswanya agar siap beradaptasi dan bersaing di dunia kerja. Salah satu upaya yang dapat dilakukan adalah melalui penyelenggaraan <span class="font-semibold text-green-600">Andalas Career, Entrepreneurship, Education, and Development Expo (ACEED EXPO 2025)</span>. Acara ini bertujuan untuk memberikan akses yang luas bagi mahasiswa dan lulusan baru (fresh graduate) terhadap berbagai peluang karier, pengembangan diri, serta dukungan kewirausahaan.
            </p>
            <p class="text-gray-700 text-base md:text-lg mb-4 text-justify">
                Dalam expo ini, akan diselenggarakan beberapa rangkaian kegiatan utama, yaitu Expo Internship, Expo Scholarship, Expo Konseling, dan Expo Entrepreneurship oleh UMKM mahasiswa. Kegiatan-kegiatan ini dirancang untuk menjembatani mahasiswa dan fresh graduate dengan berbagai pemangku kepentingan seperti perusahaan, lembaga pendidikan, dan penyedia layanan pengembangan karier.
            </p>
            
            <div class="bg-gradient-to-r from-green-50 to-yellow-50 rounded-xl p-6 mb-6 border border-green-100">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Program Utama ACEED EXPO 2025
                </h3>
                <ul class="list-none space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                            </svg>
                        </div>
                        <div>
                            <b>Expo Internship</b> memberikan kesempatan bagi mahasiswa untuk mendapatkan pengalaman kerja praktis melalui program magang yang ditawarkan oleh berbagai perusahaan dan organisasi.
                        </div>
                    </li>
                    <li class="flex items-start">
                        <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <b>Expo Scholarship</b> menyediakan informasi mengenai berbagai beasiswa yang dapat membantu mahasiswa dalam melanjutkan pendidikan atau meningkatkan keterampilan mereka.
                        </div>
                    </li>
                    <li class="flex items-start">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <b>Expo Konseling</b> berfokus pada penyediaan layanan konseling karier dan pengembangan diri, yang bertujuan untuk membantu mahasiswa mengenali potensi diri, menentukan tujuan karier, dan menghadapi tantangan dalam mencari pekerjaan.
                        </div>
                    </li>
                    <li class="flex items-start">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <b>Expo Entrepreneurship</b> oleh UMKM mahasiswa mendorong jiwa kewirausahaan dan kreativitas mahasiswa, serta memberikan mereka kesempatan untuk memamerkan dan mengembangkan usaha yang telah mereka rintis.
                        </div>
                    </li>
                </ul>
            </div>
            
            <p class="text-gray-700 text-base md:text-lg mb-4 text-justify">
                Dengan sasaran utama mahasiswa aktif dan fresh graduate Universitas Andalas, acara ini diharapkan dapat menjadi wadah yang efektif dalam mempersiapkan para peserta untuk menghadapi dunia kerja dan bisnis yang dinamis. Selain itu, acara ini juga bertujuan untuk mendorong pertumbuhan jiwa kewirausahaan di kalangan mahasiswa, yang pada gilirannya akan berkontribusi pada penciptaan lapangan kerja baru dan pengembangan ekonomi lokal.
            </p>
            <p class="text-gray-700 text-base md:text-lg mb-8 text-justify">
                Melalui Andalas Career, Entrepreneurship, Education, and Development Expo, Universitas Andalas berkomitmen untuk mendukung pengembangan karier dan kewirausahaan mahasiswa, sekaligus memperkuat posisi universitas sebagai lembaga pendidikan yang berperan aktif dalam membangun masa depan bangsa.
            </p>
        </div>

        <div class="max-w-6xl mx-auto mt-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Harapan Peserta</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Berikut adalah harapan dan aspirasi dari para calon peserta ACEED EXPO 2025 yang telah mendaftar. 
                    Setiap harapan mencerminkan semangat dan ekspektasi mereka terhadap acara ini.
                </p>
            </div>

            @if($wishes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="wishesContainer">
                    @foreach($wishes as $wish)
                        <div class="wish-card bg-white rounded-xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-start space-x-4 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                    {{ strtoupper(substr($wish->name, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-gray-800 truncate">{{ $wish->name }}</h3>
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        <span class="inline-flex px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                            {{ ucfirst($wish->participant_category) }}
                                        </span>
                                        @if($wish->institution_name)
                                            <span class="inline-flex px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full truncate max-w-24" title="{{ $wish->institution_name }}">
                                                {{ Str::limit($wish->institution_name, 15) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="relative">
                                <svg class="w-6 h-6 text-gray-300 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                                </svg>
                                <p class="text-gray-700 italic leading-relaxed line-clamp-4">
                                    "{{ $wish->wish_for_event }}"
                                </p>
                            </div>

                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span class="flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $wish->created_at->format('d M Y') }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        {{ $wish->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Harapan Peserta</h3>
                        <p class="text-gray-500 mb-6">
                            Harapan dari para calon peserta akan muncul di sini setelah mereka mendaftar dan mengisi formulir pendaftaran.
                        </p>
                        <a href="{{ route('registration') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-medium hover:from-green-700 hover:to-blue-700 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- CSS -->
    <style>
        .line-clamp-4 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4;
        }
        
        .wish-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .wish-card:hover {
            transform: translateY(-4px);
        }
    </style>
@endsection