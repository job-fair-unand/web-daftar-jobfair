<!-- filepath: resources/views/admin/company/detail.blade.php -->

<!-- Company Detail Modal -->
<div id="companyDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-10 mx-auto p-0 border w-full max-w-4xl bg-white rounded-xl shadow-2xl">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-blue-600 to-green-600 rounded-t-xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Detail Perusahaan</h3>
                        <p class="text-blue-100 text-sm">Informasi lengkap perusahaan</p>
                    </div>
                </div>
                <button onclick="closeCompanyDetailModal()" class="text-white hover:text-red-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Content -->
        <div id="companyDetailContent" class="p-6">
            <!-- Loading State -->
            <div id="loadingState" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mb-4"></div>
                <p class="text-gray-500">Memuat detail perusahaan...</p>
            </div>

            <!-- Content will be loaded here -->
            <div id="detailContent" class="hidden">
                <!-- Company Header -->
                <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl p-6 mb-4">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div id="companyLogo" class="w-20 h-20 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <!-- Logo will be inserted here -->
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 id="companyName" class="text-2xl font-bold text-gray-900 mb-2">-</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p id="companyEmail" class="font-medium text-gray-900">-</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Telepon</p>
                                    <p id="companyPhone" class="font-medium text-gray-900">-</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p id="companyAddress" class="font-medium text-gray-900">-</p>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <div id="verificationStatus" class="px-3 py-1 rounded-full text-xs font-medium">
                                <!-- Status will be inserted here -->
                            </div>
                        </div>
                    </div>
                </div>

                <div id="companyBookingSection" class="mb-8"></div>

                <!-- Tabs -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8">
                        <button onclick="switchTab('info')" id="infoTab" class="tab-button active border-b-2 border-blue-500 py-2 px-1 text-sm font-medium text-blue-600">
                            Informasi Umum
                        </button>
                        <button onclick="switchTab('transactions')" id="transactionsTab" class="tab-button border-b-2 border-transparent py-2 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            Riwayat Transaksi
                        </button>
                    </nav>
                </div>

                <!-- Tab Content -->
                <div id="tabContent">
                    <!-- Info Tab -->
                    <div id="infoTabContent" class="tab-content">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <h5 class="font-semibold text-gray-900 mb-3 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Informasi Akun
                                    </h5>
                                    <div class="space-y-3">
                                        <div>
                                            <p class="text-sm text-gray-500">Email Terverifikasi</p>
                                            <p id="emailVerified" class="font-medium">-</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Tanggal Daftar</p>
                                            <p id="registeredDate" class="font-medium">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div id="companyDataSection"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Transactions Tab -->
                    <div id="transactionsTabContent" class="tab-content hidden">
                        <div class="space-y-4">
                            <h5 class="font-semibold text-gray-900">Transaksi Terbaru</h5>
                            <div id="transactionsList" class="space-y-3">
                                <!-- Transactions will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="bg-gray-50 px-6 py-4 rounded-b-xl flex justify-end space-x-3">
            <button onclick="closeCompanyDetailModal()" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>