<!-- filepath: resources/views/admin/participant/add-modal.blade.php -->

<!-- Add Participant Modal -->
<div id="addParticipantModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-10 mx-auto p-0 border w-full max-w-2xl bg-white rounded-xl shadow-2xl">
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
                        <h3 class="text-xl font-bold">Tambah Peserta Baru</h3>
                        <p class="text-blue-100 text-sm">Daftarkan peserta baru ke sistem</p>
                    </div>
                </div>
                <button onclick="closeAddModal()" class="text-white hover:text-red-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Content -->
        <form id="addParticipantForm" class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Personal Information -->
                <div class="md:col-span-2">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Informasi Personal
                    </h4>
                </div>

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Masukkan nama lengkap">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Masukkan email">
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon *</label>
                    <input type="text" 
                           id="phone" 
                           name="phone" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="08xxxxxxxxxx">
                </div>

                <!-- Category -->
                <div>
                    <label for="participant_category" class="block text-sm font-medium text-gray-700 mb-2">Kategori Peserta *</label>
                    <select id="participant_category" 
                            name="participant_category" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Pilih Kategori</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Fresh Graduate">Fresh Graduate</option>
                        <option value="Professional">Professional</option>
                        <option value="Job Seeker">Job Seeker</option>
                        <option value="Entrepreneur">Entrepreneur</option>
                    </select>
                </div>

                <!-- Identity Number -->
                <div>
                    <label for="identity_number" class="block text-sm font-medium text-gray-700 mb-2">Nomor Identitas *</label>
                    <input type="text" 
                           id="identity_number" 
                           name="identity_number" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="NIM/KTP/Passport">
                </div>

                <!-- Domicile -->
                <div>
                    <label for="domicile" class="block text-sm font-medium text-gray-700 mb-2">Domisili *</label>
                    <input type="text" 
                           id="domicile" 
                           name="domicile" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Kota/Kabupaten">
                </div>

                <!-- Institution -->
                <div class="md:col-span-2">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Informasi Institusi
                    </h4>
                </div>

                <!-- Institution Name -->
                <div class="md:col-span-2">
                    <label for="institution_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Institusi *</label>
                    <input type="text" 
                           id="institution_name" 
                           name="institution_name" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Universitas/Sekolah/Perusahaan">
                </div>

                <!-- Purpose -->
                <div>
                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-2">Tujuan Mengikuti *</label>
                    <select id="purpose" 
                            name="purpose" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Pilih Tujuan</option>
                        <option value="Mencari Pekerjaan">Mencari Pekerjaan</option>
                        <option value="Networking">Networking</option>
                        <option value="Informasi Beasiswa">Informasi Beasiswa</option>
                        <option value="Pengembangan Karir">Pengembangan Karir</option>
                        <option value="Penelitian">Penelitian</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Where did you hear -->
                <div>
                    <label for="where_did_you_hear" class="block text-sm font-medium text-gray-700 mb-2">Mengetahui Acara Dari *</label>
                    <select id="where_did_you_hear" 
                            name="where_did_you_hear" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Pilih Sumber</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Website">Website</option>
                        <option value="Teman">Teman</option>
                        <option value="Dosen/Guru">Dosen/Guru</option>
                        <option value="Media Online">Media Online</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Wish for event -->
                <div class="md:col-span-2">
                    <label for="wish_for_event" class="block text-sm font-medium text-gray-700 mb-2">Harapan untuk Acara *</label>
                    <textarea id="wish_for_event" 
                              name="wish_for_event" 
                              required
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Tuliskan harapan Anda untuk acara ini..."></textarea>
                </div>
            </div>
        </form>

        <!-- Modal Footer -->
        <div class="bg-gray-50 px-6 py-4 rounded-b-xl flex justify-end space-x-3">
            <button onclick="closeAddModal()" 
                    class="px-6 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <button onclick="submitAddForm()" 
                    class="px-6 py-2 bg-gradient-to-r from-blue-600 to-green-600 text-white rounded-lg hover:from-blue-700 hover:to-green-700 transition-colors">
                Simpan Peserta
            </button>
        </div>
    </div>
</div>