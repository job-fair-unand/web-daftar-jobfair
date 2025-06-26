@extends('layouts.guest')

@section('title', 'Perusahaan')

@section('content')
    <div class="relative w-full">
        <div class="w-full h-56 md:h-80 flex items-center justify-center" style="background-image: url('/assets/images/background.jpg'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            <h1 class="relative z-10 text-3xl md:text-5xl font-extrabold text-center bg-gradient-to-r from-green-400 to-yellow-300 bg-clip-text text-transparent leading-tight drop-shadow-lg">
                Daftar Perusahaan
            </h1>
        </div>
    </div>
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-4xl mx-auto text-center mb-10">
            <p class="text-gray-700 text-base md:text-lg mb-4">Berikut adalah daftar perusahaan yang berpartisipasi dalam ACEED EXPO Universitas Andalas. Temukan peluang karier dan informasi lebih lanjut mengenai perusahaan-perusahaan terbaik di Indonesia.</p>
        </div>
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card Dummy Unilever -->
            <div x-data="{ open: false }" class="bg-white rounded-xl shadow p-6 flex flex-col items-center border border-gray-100">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-gray-100 rounded-full">
                    <img src="{{ asset('assets/images/unilever.png') }}" alt="Unilever Logo" class="h-14 w-14 object-contain">
                </div>
                <h3 class="text-lg font-bold mb-2">Unilever Indonesia</h3>
                <p class="text-gray-600 text-sm text-center mb-4">Perusahaan multinasional terkemuka di bidang barang konsumen yang berfokus pada inovasi dan keberlanjutan.</p>
                <button @click="open = true" class="inline-block px-4 py-2 rounded-lg bg-gradient-to-r from-green-600 to-yellow-400 text-white font-semibold shadow hover:from-green-700 hover:to-yellow-500 transition text-sm">Lihat Detail</button>
                <!-- Modal Unilever -->
                <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
                    <div 
                        class="absolute inset-0 bg-black/50 backdrop-blur-md transition-all duration-500"
                        :class="open ? 'opacity-100' : 'opacity-0'"
                        aria-hidden="true">
                    </div>
                    <div @click.away="open = false"
                        x-transition:enter="transition transform ease-in-out duration-500"
                        x-transition:enter-start="opacity-0 scale-90 translate-y-8"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition transform ease-in-out duration-400"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-90 translate-y-8"
                        class="bg-white rounded-xl shadow-lg max-w-lg w-full p-8 relative z-10">
                        <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('assets/images/unilever.png') }}" alt="Unilever Logo" class="h-20 w-20 object-contain mb-4">
                            <h3 class="text-2xl font-bold mb-2">Unilever Indonesia</h3>
                            <p class="text-gray-700 text-center mb-4">Unilever Indonesia adalah perusahaan multinasional yang bergerak di bidang barang konsumen, memproduksi berbagai produk kebutuhan sehari-hari seperti makanan, minuman, perawatan rumah tangga, dan perawatan diri. Berkomitmen pada inovasi dan keberlanjutan, Unilever telah menjadi pemimpin pasar di Indonesia.</p>
                            <ul class="text-gray-600 text-sm mb-2">
                                <li><b>Industri:</b> Barang Konsumen</li>
                                <li><b>Website:</b> <a href="https://www.unilever.co.id" class="text-green-600 hover:underline" target="_blank">unilever.co.id</a></li>
                                <li><b>Lokasi:</b> Jakarta, Indonesia</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Dummy Telkom -->
            <div x-data="{ open: false }" class="bg-white rounded-xl shadow p-6 flex flex-col items-center border border-gray-100">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-gray-100 rounded-full">
                    <img src="{{ asset('assets/images/telkom.png') }}" alt="Telkom Logo" class="h-14 w-14 object-contain">
                </div>
                <h3 class="text-lg font-bold mb-2">Telkom Indonesia</h3>
                <p class="text-gray-600 text-sm text-center mb-4">Perusahaan telekomunikasi terbesar di Indonesia yang menyediakan layanan digital dan konektivitas terbaik.</p>
                <button @click="open = true" class="inline-block px-4 py-2 rounded-lg bg-gradient-to-r from-green-600 to-yellow-400 text-white font-semibold shadow hover:from-green-700 hover:to-yellow-500 transition text-sm">Lihat Detail</button>
                <!-- Modal Telkom -->
                <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
                    <div 
                        class="absolute inset-0 bg-black/50 backdrop-blur-md transition-all duration-500"
                        :class="open ? 'opacity-100' : 'opacity-0'"
                        aria-hidden="true">
                    </div>
                    <div @click.away="open = false"
                        x-transition:enter="transition transform ease-in-out duration-500"
                        x-transition:enter-start="opacity-0 scale-90 translate-y-8"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition transform ease-in-out duration-400"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-90 translate-y-8"
                        class="bg-white rounded-xl shadow-lg max-w-lg w-full p-8 relative z-10">
                        <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('assets/images/telkom.png') }}" alt="Telkom Logo" class="h-20 w-20 object-contain mb-4">
                            <h3 class="text-2xl font-bold mb-2">Telkom Indonesia</h3>
                            <p class="text-gray-700 text-center mb-4">Telkom Indonesia adalah perusahaan telekomunikasi terbesar di Indonesia yang menyediakan layanan digital, internet, dan konektivitas untuk masyarakat dan bisnis. Telkom berperan penting dalam transformasi digital nasional.</p>
                            <ul class="text-gray-600 text-sm mb-2">
                                <li><b>Industri:</b> Telekomunikasi</li>
                                <li><b>Website:</b> <a href="https://www.telkom.co.id" class="text-green-600 hover:underline" target="_blank">telkom.co.id</a></li>
                                <li><b>Lokasi:</b> Jakarta, Indonesia</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Dummy Astra -->
            <div x-data="{ open: false }" class="bg-white rounded-xl shadow p-6 flex flex-col items-center border border-gray-100">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-gray-100 rounded-full">
                    <img src="{{ asset('assets/images/astra.png') }}" alt="Astra Logo" class="h-14 w-14 object-contain">
                </div>
                <h3 class="text-lg font-bold mb-2">Astra International</h3>
                <p class="text-gray-600 text-sm text-center mb-4">Grup perusahaan nasional yang bergerak di bidang otomotif, agribisnis, alat berat, dan jasa keuangan.</p>
                <button @click="open = true" class="inline-block px-4 py-2 rounded-lg bg-gradient-to-r from-green-600 to-yellow-400 text-white font-semibold shadow hover:from-green-700 hover:to-yellow-500 transition text-sm">Lihat Detail</button>
                <!-- Modal Astra -->
                <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
                    <div 
                        class="absolute inset-0 bg-black/50 backdrop-blur-md transition-all duration-500"
                        :class="open ? 'opacity-100' : 'opacity-0'"
                        aria-hidden="true">
                    </div>
                    <div @click.away="open = false"
                        x-transition:enter="transition transform ease-in-out duration-500"
                        x-transition:enter-start="opacity-0 scale-90 translate-y-8"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition transform ease-in-out duration-400"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-90 translate-y-8"
                        class="bg-white rounded-xl shadow-lg max-w-lg w-full p-8 relative z-10">
                        <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('assets/images/astra.png') }}" alt="Astra Logo" class="h-20 w-20 object-contain mb-4">
                            <h3 class="text-2xl font-bold mb-2">Astra International</h3>
                            <p class="text-gray-700 text-center mb-4">Astra International adalah grup perusahaan nasional yang bergerak di berbagai sektor seperti otomotif, agribisnis, alat berat, teknologi informasi, dan jasa keuangan. Astra berkomitmen pada inovasi dan kontribusi untuk kemajuan Indonesia.</p>
                            <ul class="text-gray-600 text-sm mb-2">
                                <li><b>Industri:</b> Konglomerat</li>
                                <li><b>Website:</b> <a href="https://www.astra.co.id" class="text-green-600 hover:underline" target="_blank">astra.co.id</a></li>
                                <li><b>Lokasi:</b> Jakarta, Indonesia</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection