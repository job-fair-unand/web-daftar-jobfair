@extends('layouts.guest')

@section('title', 'Tentang')

@section('content')
    <div class="relative w-full">
        <div class="w-full h-56 md:h-80 flex items-center justify-center" style="background-image: url('/assets/images/background.jpg'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            <h1 class="relative z-10 text-3xl md:text-5xl font-extrabold text-center bg-gradient-to-r from-green-400 to-yellow-300 bg-clip-text text-transparent leading-tight drop-shadow-lg">
                About ACEED
            </h1>
        </div>
    </div>
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <p class="text-gray-700 text-base md:text-lg mb-4 text-justify">
                Universitas Andalas sebagai salah satu perguruan tinggi terkemuka di Indonesia, memiliki tanggung jawab untuk mempersiapkan mahasiswanya agar siap beradaptasi dan bersaing di dunia kerja. Salah satu upaya yang dapat dilakukan adalah melalui penyelenggaraan Andalas Career, Entrepreneurship, Education, and Development Expo. Acara ini bertujuan untuk memberikan akses yang luas bagi mahasiswa dan lulusan baru (fresh graduate) terhadap berbagai peluang karier, pengembangan diri, serta dukungan kewirausahaan.
            </p>
            <p class="text-gray-700 text-base md:text-lg mb-4 text-justify">
                Dalam expo ini, akan diselenggarakan beberapa rangkaian kegiatan utama, yaitu Expo Internship, Expo Scholarship, Expo Konseling, dan Expo Entrepreneurship oleh UMKM mahasiswa. Kegiatan-kegiatan ini dirancang untuk menjembatani mahasiswa dan fresh graduate dengan berbagai pemangku kepentingan seperti perusahaan, lembaga pendidikan, dan penyedia layanan pengembangan karier.
            </p>
            <ul class="list-disc pl-6 text-gray-700 mb-4 space-y-2">
                <li><b>Expo Internship</b> memberikan kesempatan bagi mahasiswa untuk mendapatkan pengalaman kerja praktis melalui program magang yang ditawarkan oleh berbagai perusahaan dan organisasi.</li>
                <li><b>Expo Scholarship</b> menyediakan informasi mengenai berbagai beasiswa yang dapat membantu mahasiswa dalam melanjutkan pendidikan atau meningkatkan keterampilan mereka.</li>
                <li><b>Expo Konseling</b> berfokus pada penyediaan layanan konseling karier dan pengembangan diri, yang bertujuan untuk membantu mahasiswa mengenali potensi diri, menentukan tujuan karier, dan menghadapi tantangan dalam mencari pekerjaan.</li>
                <li><b>Expo Entrepreneurship</b> oleh UMKM mahasiswa mendorong jiwa kewirausahaan dan kreativitas mahasiswa, serta memberikan mereka kesempatan untuk memamerkan dan mengembangkan usaha yang telah mereka rintis.</li>
            </ul>
            <p class="text-gray-700 text-base md:text-lg mb-4 text-justify">
                Dengan sasaran utama mahasiswa aktif dan fresh graduate Universitas Andalas, acara ini diharapkan dapat menjadi wadah yang efektif dalam mempersiapkan para peserta untuk menghadapi dunia kerja dan bisnis yang dinamis. Selain itu, acara ini juga bertujuan untuk mendorong pertumbuhan jiwa kewirausahaan di kalangan mahasiswa, yang pada gilirannya akan berkontribusi pada penciptaan lapangan kerja baru dan pengembangan ekonomi lokal.
            </p>
            <p class="text-gray-700 text-base md:text-lg mb-8 text-justify">
                Melalui Andalas Career, Entrepreneurship, Education, and Development Expo, Universitas Andalas berkomitmen untuk mendukung pengembangan karier dan kewirausahaan mahasiswa, sekaligus memperkuat posisi universitas sebagai lembaga pendidikan yang berperan aktif dalam membangun masa depan bangsa.
            </p>
            <div class="flex justify-center">
                <!-- Button dihapus sesuai permintaan -->
            </div>
        </div>

        <div class="max-w-5xl mx-auto mt-16">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8">Harapan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border border-gray-100">
                    <svg class="w-10 h-10 text-green-600 mb-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.5-1.8 4.5-4.5S14.7 3 12 3 7.5 4.8 7.5 7.5 9.3 12 12 12zm0 2c-3 0-9 1.5-9 4.5V21h18v-2.5c0-3-6-4.5-9-4.5z"/></svg>
                    <p class="text-gray-700 text-center mb-2">Semoga para peserta ACEED EXPO dapat menemukan inspirasi, memperluas jejaring, dan semakin siap menghadapi tantangan dunia kerja serta mengembangkan potensi diri secara optimal.</p>
                    <div class="mt-3 text-sm text-gray-500 font-semibold">Untuk Peserta</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border border-gray-100">
                    <svg class="w-10 h-10 text-green-600 mb-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.5-1.8 4.5-4.5S14.7 3 12 3 7.5 4.8 7.5 7.5 9.3 12 12 12zm0 2c-3 0-9 1.5-9 4.5V21h18v-2.5c0-3-6-4.5-9-4.5z"/></svg>
                    <p class="text-gray-700 text-center mb-2">Semoga Universitas Andalas terus menjadi pelopor dalam pengembangan karier dan kewirausahaan, serta mampu mencetak lulusan yang inovatif dan berdaya saing global.</p>
                    <div class="mt-3 text-sm text-gray-500 font-semibold">Untuk Universitas</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center border border-gray-100">
                    <svg class="w-10 h-10 text-green-600 mb-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.5-1.8 4.5-4.5S14.7 3 12 3 7.5 4.8 7.5 7.5 9.3 12 12 12zm0 2c-3 0-9 1.5-9 4.5V21h18v-2.5c0-3-6-4.5-9-4.5z"/></svg>
                    <p class="text-gray-700 text-center mb-2">Semoga perusahaan dan mitra dapat menemukan talenta terbaik serta terjalin kolaborasi yang saling menguntungkan untuk kemajuan bersama.</p>
                    <div class="mt-3 text-sm text-gray-500 font-semibold">Untuk Perusahaan & Mitra</div>
                </div>
            </div>
        </div>
    </div>
@endsection