<!-- filepath: resources/views/admin/participant/detail-modal.blade.php -->

<!-- Participant Detail Modal -->
<div id="participantDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-10 mx-auto p-0 border w-full max-w-3xl bg-white rounded-xl shadow-2xl">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-blue-600 to-green-600 rounded-t-xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Detail Peserta</h3>
                        <p class="text-blue-100 text-sm">Informasi lengkap peserta</p>
                    </div>
                </div>
                <button onclick="closeParticipantDetailModal()" class="text-white hover:text-red-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
            <!-- Loading State -->
            <div id="loadingStateDetail" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mb-4"></div>
                <p class="text-gray-500">Memuat detail peserta...</p>
            </div>

            <!-- Content -->
            <div id="detailContentParticipant" class="hidden">
                <!-- Participant Header -->
                <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl p-6 mb-6">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-400 to-green-600 flex items-center justify-center">
                                <span id="participantInitial" class="text-white font-bold text-2xl">P</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 id="participantName" class="text-2xl font-bold text-gray-900 mb-2">-</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p id="participantEmail" class="font-medium text-gray-900">-</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Telepon</p>
                                    <p id="participantPhone" class="font-medium text-gray-900">-</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <span id="participantCategoryBadge" class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <span id="participantCategory">-</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Detail Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Information -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Personal
                        </h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">Nomor Identitas</p>
                                <p id="participantIdentity" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Domisili</p>
                                <p id="participantDomicile" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tanggal Daftar</p>
                                <p id="participantRegisteredAt" class="font-medium">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Institution Information -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Informasi Institusi
                        </h5>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500">Nama Institusi</p>
                                <p id="participantInstitution" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tujuan Mengikuti</p>
                                <p id="participantPurpose" class="font-medium">-</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Mengetahui Dari</p>
                                <p id="participantHearFrom" class="font-medium">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Wishes -->
                    <div class="md:col-span-2 border border-gray-200 rounded-lg p-4">
                        <h5 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Harapan untuk Acara
                        </h5>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p id="participantWish" class="text-gray-700 italic">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="bg-gray-50 px-6 py-4 rounded-b-xl flex justify-end space-x-3">
            <button onclick="closeParticipantDetailModal()" 
                    class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>