<div id="scholarshipDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-10 mx-auto p-0 border w-full max-w-4xl bg-white rounded-xl shadow-2xl">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-t-xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Detail Beasiswa</h3>
                        <p class="text-indigo-100 text-sm">Informasi lengkap penyedia beasiswa</p>
                    </div>
                </div>
                <button onclick="closeScholarshipDetailModal()" class="text-white hover:text-red-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
            <!-- Loading State -->
            <div id="loadingScholarshipDetail" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600 mb-4"></div>
                <p class="text-gray-500">Memuat detail beasiswa...</p>
            </div>

            <!-- Content -->
            <div id="detailScholarshipContent" class="hidden">
                <!-- Scholarship Header - TANPA ID -->
                <div class="bg-gradient-to-br from-gray-50 to-indigo-50 rounded-xl p-6 mb-6">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div id="scholarshipLogo" class="w-20 h-20 rounded-xl bg-gradient-to-br from-indigo-400 to-purple-600 flex items-center justify-center">
                                <!-- Logo will be inserted here -->
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 id="scholarshipName" class="text-2xl font-bold text-gray-900 mb-2">-</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p id="scholarshipEmail" class="font-medium text-gray-900">-</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Telepon</p>
                                    <p id="scholarshipPhone" class="font-medium text-gray-900">-</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p id="scholarshipAddress" class="font-medium text-gray-900">-</p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-right">
                            <div id="scholarshipVerificationStatus" class="px-3 py-1 rounded-full text-xs font-medium mb-2">
                                <!-- Status will be inserted here -->
                            </div>
                            <div class="text-sm font-medium text-gray-700">
                                Penyedia Beasiswa
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Scholarship Information -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                            </svg>
                            Informasi Beasiswa
                        </h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">File Beasiswa</p>
                                <div id="scholarshipFile" class="font-medium">-</div>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tanggal Daftar</p>
                                <p id="scholarshipRegisteredAt" class="font-medium">-</p>
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
                                <p id="scholarshipEmailVerified" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Aktivitas Terakhir</p>
                                <p id="scholarshipLastActivity" class="font-medium">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Scholarship Description -->
                    <div class="md:col-span-2 border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Deskripsi Beasiswa
                        </h5>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p id="scholarshipDescription" class="text-gray-700 italic">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="bg-gray-50 px-6 py-4 rounded-b-xl flex justify-end space-x-3">
            <button onclick="closeScholarshipDetailModal()" 
                    class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>