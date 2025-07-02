@extends('layouts.company')

@section('title', 'Dashboard')

@section('content')
<div class="p-6 bg-gray-50">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-6xl mx-auto">
        <div class="text-left mb-6">
            <h1 class="text-xl font-bold text-black">LAYOUT ACEED JOB FAIR 2025</h1>
            <p class="text-sm text-gray-700">Auditorium, Universitas Andalas</p>
            <p class="text-sm text-gray-700">Skala 1:100</p>
        </div>

        <div class="relative bg-white border-2 border-gray-600 mx-auto rounded-lg" style="width: 700px; height: 550px;">
            
            <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 w-24 h-6 border-2 border-gray-600 rounded-t-full bg-white"></div>
            
            <div class="absolute top-8 left-1/2 transform -translate-x-1/2 bg-amber-800 text-white text-center px-6 py-2 rounded shadow-md" style="width: 160px;">
                <div class="text-sm font-bold">STAGE</div>
                <div class="text-xs font-normal bg-gray-600 px-2 py-1 mt-1 rounded">DECORATION</div>
            </div>

            <div class="absolute top-24 left-1/2 transform -translate-x-1/2 bg-pink-200 rounded-lg p-3" style="width: 350px; height: 320px;">
                <div class="mt-4">
                    <?php for($row = 0; $row < 12; $row++): ?>
                        <div class="flex justify-center mb-1">
                            <?php for($seat = 0; $seat < 40; $seat++): ?>
                                <div class="w-1 h-1 bg-gray-900 rounded-sm mr-px"></div>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="absolute top-16 left-4 bg-green-200 rounded-lg p-2" style="width: 100px; height: 200px;">
                <!-- Top section with magenta bar (Operator) -->
                <div class="w-full h-4 bg-pink-600 mb-2 rounded flex items-center justify-center">
                    <span class="text-white text-xs font-bold">Operator</span>
                </div>
                
                <!-- Purple photobooth -->
                <div class="w-full h-10 bg-purple-700 mb-2 rounded flex items-center justify-center">
                    <span class="text-white text-xs font-bold">PHOTO</span>
                </div>
                
                <!-- Green pojok karir -->
                <div class="w-full h-20 bg-green-600 rounded flex items-center justify-center">
                    <span class="text-white text-xs font-bold transform -rotate-90">POJOK KARIR</span>
                </div>
            </div>

            <!-- Extended left green area (outdoor area) -->
            <div class="absolute top-56 left-0 bg-green-200 rounded-r-lg border-2 border-dashed border-green-400" style="width: 50px; height: 140px;"></div>

            <!-- Right Side Room (Light Blue) -->
            <div class="absolute top-16 right-4 bg-blue-200 rounded-lg flex items-center justify-center" style="width: 90px; height: 120px;">
                <span class="text-blue-800 text-xs font-bold transform rotate-90">SIDE ROOM</span>
            </div>

            <!-- Pilar Auditorium (circles) -->
            <div class="absolute top-36 left-20 w-8 h-8 bg-amber-100 rounded-full border-2 border-amber-600"></div>
            <div class="absolute top-36 right-20 w-8 h-8 bg-amber-100 rounded-full border-2 border-amber-600"></div>

            <!-- Bottom booth areas -->
            
            <!-- Left side booths -->
            <div class="absolute bottom-24 left-8">
                <!-- Bronze booths (bottom left, 2 rows of 3) -->
                <div class="grid grid-cols-3 gap-1 mb-2">
                    <?php for($i = 0; $i < 6; $i++): ?>
                        <div class="w-6 h-8 bg-amber-700 rounded shadow"></div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Left Gold booths (vertical column) -->
            <div class="absolute bottom-24 left-32">
                <div class="space-y-1">
                    <?php for($i = 0; $i < 3; $i++): ?>
                        <div class="w-6 h-6 bg-yellow-500 rounded shadow"></div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Left Silver booths (vertical column) -->
            <div class="absolute bottom-24 left-44">
                <div class="space-y-1">
                    <?php for($i = 0; $i < 3; $i++): ?>
                        <div class="w-6 h-6 bg-red-600 rounded shadow"></div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Center Platinum booths (2x4 grid) -->
            <div class="absolute bottom-24 left-1/2 transform -translate-x-1/2">
                <div class="grid grid-cols-2 gap-1">
                    <?php for($i = 0; $i < 8; $i++): ?>
                        <div class="w-10 h-6 bg-blue-700 rounded shadow" data-id="booth-blue-<?= $i ?>"></div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Right Silver booths (vertical column) -->
            <div class="absolute bottom-24 right-44">
                <div class="space-y-1">
                    <?php for($i = 0; $i < 3; $i++): ?>
                        <div class="w-6 h-6 bg-red-600 rounded shadow"></div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Right Gold booths (vertical column) -->
            <div class="absolute bottom-24 right-32">
                <div class="space-y-1">
                    <?php for($i = 0; $i < 3; $i++): ?>
                        <div class="w-6 h-6 bg-yellow-500 rounded shadow"></div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Right Black area -->
            <div class="absolute bottom-24 right-0 bg-black rounded-l-lg" style="width: 80px; height: 100px;"></div>

            <!-- Bottom Black exit area -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 bg-black rounded-t-lg" style="width: 200px; height: 16px;"></div>
            
            <!-- Bottom entrance curved section -->
            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-24 h-6 border-2 border-gray-600 rounded-b-full bg-white"></div>

            <!-- Right side external area with purple background (Tangga area) -->
            <div class="absolute top-8 -right-16 bg-purple-100 rounded-lg p-1" style="width: 70px; height: 420px;">
                
                <!-- Purple Tangga area at top -->
                <div class="w-full h-16 bg-purple-400 rounded flex items-center justify-center mb-1">
                    <span class="text-white text-xs font-bold transform rotate-90">TANGGA</span>
                </div>
                
                <!-- UMKM booths grid (2 columns) -->
                <div class="grid grid-cols-2 gap-1 mb-2">
                    <?php for($i = 0; $i < 24; $i++): ?>
                        <div class="w-5 h-5 bg-orange-500 rounded-sm"></div>
                    <?php endfor; ?>
                </div>
                
                <!-- Bottom curved UMKM booths -->
                <div class="relative">
                    <div class="grid grid-cols-4 gap-1">
                        <?php for($i = 0; $i < 8; $i++): ?>
                            <div class="w-3 h-3 bg-orange-500 rounded-sm"></div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <!-- Entrance arrows and labels -->
            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex items-center space-x-6">
                <div class="text-center">
                    <div class="text-2xl font-bold">←</div>
                    <div class="text-xs font-bold">MASUK</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold">→</div>
                    <div class="text-xs font-bold">MASUK</div>
                </div>
            </div>

            <!-- Side Labels with better positioning -->
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 -rotate-90 text-xs font-bold text-gray-700" style="left: -100px;">
                Booth Khusus dan Operator
            </div>

            <div class="absolute right-0 top-1/4 transform -translate-y-1/2 rotate-90 text-xs font-bold text-gray-700" style="right: -30px;">
                TANGGA
            </div>

            <!-- Keluar label at bottom -->
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 text-xs font-bold text-gray-700" style="bottom: -25px;">
                KELUAR
            </div>
        </div>

        <!-- Legend with improved styling to match the image -->
        <div class="mt-10">
            <h3 class="font-bold text-lg mb-6">Keterangan:</h3>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 text-sm">
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-blue-700 mr-3 rounded shadow"></div>
                    <div>
                        <div class="font-semibold">Booth Platinum</div>
                        <div class="text-xs text-gray-600">Uk: 3x4m</div>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-red-600 mr-3 rounded shadow"></div>
                    <div>
                        <div class="font-semibold">Booth Silver</div>
                        <div class="text-xs text-gray-600">Uk: 2x3m</div>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-orange-500 mr-3 rounded shadow"></div>
                    <div>
                        <div class="font-semibold">Booth UMKM</div>
                        <div class="text-xs text-gray-600">Uk: 2x3m</div>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-purple-700 mr-3 rounded shadow"></div>
                    <div>
                        <div class="font-semibold">Photobooth</div>
                        <div class="text-xs text-gray-600">Uk: 2x3m</div>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-yellow-500 mr-3 rounded shadow"></div>
                    <div>
                        <div class="font-semibold">Booth Gold</div>
                        <div class="text-xs text-gray-600">Uk: 2x3m</div>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-amber-700 mr-3 rounded shadow"></div>
                    <div>
                        <div class="font-semibold">Booth Bronze</div>
                        <div class="text-xs text-gray-600">Uk: 2x3m</div>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-green-600 mr-3 rounded shadow"></div>
                    <div>
                        <div class="font-semibold">Pojok Karir</div>
                        <div class="text-xs text-gray-600">Uk: 2x3m</div>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-purple-400 mr-3 rounded shadow"></div>
                    <div class="font-semibold">Tangga</div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-green-200 border-2 border-dashed border-green-400 mr-3 rounded"></div>
                    <div class="font-semibold">Area Outdoor</div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-amber-100 border-2 border-amber-600 rounded-full mr-3"></div>
                    <div class="font-semibold">Pilar Auditorium</div>
                </div>
            </div>
        </div>

        <!-- Button Pilih Booth -->
        <div class="mt-6 text-center">
            <form id="pilih-booth-form" action="{{ route('company.pilih-booth') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="booths" id="booths-input">
                <button id="pilih-booth-btn" class="px-4 py-2 bg-gray-400 text-white rounded shadow cursor-not-allowed" disabled>
                    Pilih Booth
                </button>
            </form>
        </div>

        <!-- Script untuk interaktivitas -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const booths = document.querySelectorAll('.bg-blue-700, .bg-yellow-500, .bg-red-600');
                const selectedBooths = new Set();
                const button = document.getElementById('pilih-booth-btn');

                booths.forEach(booth => {
                    booth.addEventListener('click', function() {
                        if (selectedBooths.has(booth)) {
                            selectedBooths.delete(booth);
                            booth.classList.remove('ring-4', 'ring-blue-300');
                        } else {
                            selectedBooths.add(booth);
                            booth.classList.add('ring-4', 'ring-blue-300');
                        }

                        // Update button state
                        if (selectedBooths.size > 0) {
                            button.disabled = false;
                            button.classList.remove('bg-gray-400', 'cursor-not-allowed');
                            button.classList.add('bg-blue-600', 'hover:bg-blue-700', 'cursor-pointer');
                        } else {
                            button.disabled = true;
                            button.classList.remove('bg-blue-600', 'hover:bg-blue-700', 'cursor-pointer');
                            button.classList.add('bg-gray-400', 'cursor-not-allowed');
                        }
                    });
                });

                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const boothData = Array.from(selectedBooths).map(booth => booth.dataset.id);
                    document.getElementById('booths-input').value = boothData.join(',');
                    document.getElementById('pilih-booth-form').submit();
                });
            });
        </script>
    </div>
</div>
@endsection