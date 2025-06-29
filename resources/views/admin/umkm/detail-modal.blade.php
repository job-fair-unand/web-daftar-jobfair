<div id="businessDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-10 mx-auto p-0 border w-full max-w-4xl bg-white rounded-xl shadow-2xl">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-t-xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Detail UMKM</h3>
                        <p class="text-green-100 text-sm">Informasi lengkap UMKM</p>
                    </div>
                </div>
                <button onclick="closeBusinessDetailModal()" class="text-white hover:text-red-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
            <!-- Loading State -->
            <div id="loadingBusinessDetail" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-green-600 mb-4"></div>
                <p class="text-gray-500">Memuat detail UMKM...</p>
            </div>

            <!-- Content -->
            <div id="detailBusinessContent" class="hidden">
                <!-- Business Header -->
                <div class="bg-gradient-to-br from-gray-50 to-green-50 rounded-xl p-6 mb-6">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div id="businessLogo" class="w-20 h-20 rounded-xl bg-gradient-to-br from-green-400 to-blue-600 flex items-center justify-center">
                                <!-- Logo will be inserted here -->
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 id="businessName" class="text-2xl font-bold text-gray-900 mb-2">-</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p id="businessEmail" class="font-medium text-gray-900">-</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Telepon</p>
                                    <p id="businessPhone" class="font-medium text-gray-900">-</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p id="businessAddress" class="font-medium text-gray-900">-</p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-right">
                            <div id="businessVerificationStatus" class="px-3 py-1 rounded-full text-xs font-medium mb-2">
                                <!-- Status will be inserted here -->
                            </div>
                            <div class="text-sm font-medium text-gray-700">
                                Jenis: <span id="businessType" class="font-bold text-green-600">-</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Business Information -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Informasi UMKM
                        </h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">Proposal Usaha</p>
                                <div id="businessProposal" class="font-medium">-</div>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tanggal Daftar</p>
                                <p id="businessRegisteredAt" class="font-medium">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Account Information -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Akun
                        </h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">Email Terverifikasi</p>
                                <p id="businessEmailVerified" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Aktivitas Terakhir</p>
                                <p id="businessLastActivity" class="font-medium">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Business Description -->
                    <div class="md:col-span-2 border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Deskripsi Usaha
                        </h5>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p id="businessDescription" class="text-gray-700 italic">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="bg-gray-50 px-6 py-4 rounded-b-xl flex justify-end space-x-3">
            <button onclick="closeBusinessDetailModal()" 
                    class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>