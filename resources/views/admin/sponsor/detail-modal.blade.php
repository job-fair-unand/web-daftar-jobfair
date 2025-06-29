<!-- Sponsor Detail Modal -->
<div id="sponsorDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-10 mx-auto p-0 border w-full max-w-4xl bg-white rounded-xl shadow-2xl">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-t-xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Detail Sponsor</h3>
                        <p class="text-purple-100 text-sm">Informasi lengkap sponsor</p>
                    </div>
                </div>
                <button onclick="closeSponsorDetailModal()" class="text-white hover:text-red-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
            <!-- Loading State -->
            <div id="loadingSponsorDetail" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-purple-600 mb-4"></div>
                <p class="text-gray-500">Memuat detail sponsor...</p>
            </div>

            <!-- Content -->
            <div id="detailSponsorContent" class="hidden">
                <!-- Sponsor Header -->
                <div class="bg-gradient-to-br from-gray-50 to-purple-50 rounded-xl p-6 mb-6">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div id="sponsorLogo" class="w-20 h-20 rounded-xl bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                                <!-- Logo will be inserted here -->
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 id="sponsorName" class="text-2xl font-bold text-gray-900 mb-2">-</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p id="sponsorEmail" class="font-medium text-gray-900">-</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Telepon</p>
                                    <p id="sponsorPhone" class="font-medium text-gray-900">-</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p id="sponsorAddress" class="font-medium text-gray-900">-</p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-right">
                            <div id="sponsorVerificationStatus" class="px-3 py-1 rounded-full text-xs font-medium mb-2">
                                <!-- Status will be inserted here -->
                            </div>
                            <div class="text-sm font-medium text-gray-700">
                                Paket: <span id="sponsorPackage" class="font-bold text-purple-600">-</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Sponsor Information -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Sponsor
                        </h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">MOU (Memorandum of Understanding)</p>
                                <div id="sponsorMou" class="font-medium">-</div>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tanggal Daftar</p>
                                <p id="sponsorRegisteredAt" class="font-medium">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Account Information -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Akun
                        </h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">Email Terverifikasi</p>
                                <p id="sponsorEmailVerified" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Aktivitas Terakhir</p>
                                <p id="sponsorLastActivity" class="font-medium">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sponsor Wishes -->
                    <div class="md:col-span-2 border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Harapan untuk Acara
                        </h5>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p id="sponsorWish" class="text-gray-700 italic">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="bg-gray-50 px-6 py-4 rounded-b-xl flex justify-end space-x-3">
            <button onclick="closeSponsorDetailModal()" 
                    class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>