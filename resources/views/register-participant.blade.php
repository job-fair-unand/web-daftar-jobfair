@extends('layouts.guest')

@section('title', 'Daftar Peserta Job Fair')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-yellow-50 py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-green-800 to-yellow-600 px-6 py-5">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Pendaftaran Peserta Job Fair
                </h2>
                <p class="text-gray-200 text-sm mt-1">Lengkapi data dengan benar untuk bergabung di ACEED EXPO 2025</p>
            </div>

            <!-- Form -->
            <form id="participantForm" method="POST" action="{{ route('participant.store') }}" class="p-6 space-y-5">
                @csrf

                <!-- Personal Information -->
                <div class="bg-gray-50 rounded-lg p-5">
                    <h3 class="text-base font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Data Pribadi
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Nama Lengkap -->
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('name') border-red-500 @enderror"
                                placeholder="Nama lengkap" 
                                required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('email') border-red-500 @enderror"
                                placeholder="Masukkan email Anda" 
                                required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('phone') border-red-500 @enderror"
                                placeholder="Masukkan nomor telepon" 
                                required>
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori Peserta -->
                        <div>
                            <label for="participant_category" class="block text-sm font-medium text-gray-700 mb-1">
                                Kategori Peserta <span class="text-red-500">*</span>
                            </label>
                            <select id="participant_category" 
                                name="participant_category" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('participant_category') border-red-500 @enderror"
                                required>
                                <option value="">Pilih kategori</option>
                                <option value="Mahasiswa" {{ old('participant_category') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                <option value="Fresh Graduate" {{ old('participant_category') == 'Fresh Graduate' ? 'selected' : '' }}>Fresh Graduate</option>
                                <option value="Professional" {{ old('participant_category') == 'Professional' ? 'selected' : '' }}>Professional</option>
                                <option value="Jobseeker" {{ old('participant_category') == 'Jobseeker' ? 'selected' : '' }}>Job Seeker</option>
                                <option value="UMKM" {{ old('participant_category') == 'UMKM' ? 'selected' : '' }}>Pelaku UMKM</option>
                                <option value="Lainnya" {{ old('participant_category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('participant_category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor Identitas -->
                        <div>
                            <label for="identity_number" class="block text-sm font-medium text-gray-700 mb-1">
                                Nomor Identitas <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                id="identity_number" 
                                name="identity_number" 
                                value="{{ old('identity_number') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('identity_number') border-red-500 @enderror"
                                placeholder="KTP/SIM/Passport" 
                                required>
                            @error('identity_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Domisili -->
                        <div>
                            <label for="domicile" class="block text-sm font-medium text-gray-700 mb-1">
                                Domisili <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                id="domicile" 
                                name="domicile" 
                                value="{{ old('domicile') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('domicile') border-red-500 @enderror"
                                placeholder="Kota/Kabupaten" 
                                required>
                            @error('domicile')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama Institusi -->
                        <div>
                            <label for="institution_name" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Institusi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                id="institution_name" 
                                name="institution_name" 
                                value="{{ old('institution_name') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('institution_name') border-red-500 @enderror"
                                placeholder="Universitas/Perusahaan"
                                required>
                            @error('institution_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Event Information -->
                <div class="bg-gray-50 rounded-lg p-5">
                    <h3 class="text-base font-semibold text-gray-900 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Informasi Acara
                    </h3>

                    <div class="space-y-4">
                        <!-- Tujuan -->
                        <div>
                            <label for="purpose" class="block text-sm font-medium text-gray-700 mb-1">
                                Tujuan Mengikuti Job Fair <span class="text-red-500">*</span>
                            </label>
                            <textarea id="purpose" 
                                name="purpose" 
                                rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('purpose') border-red-500 @enderror"
                                placeholder="Jelaskan tujuan Anda mengikuti Job Fair..."
                                required>{{ old('purpose') }}</textarea>
                            @error('purpose')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sumber Informasi -->
                        <div>
                            <label for="where_did_you_hear" class="block text-sm font-medium text-gray-700 mb-1">
                                Sumber Informasi <span class="text-red-500">*</span>
                            </label>
                            <select id="where_did_you_hear" 
                                name="where_did_you_hear" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('where_did_you_hear') border-red-500 @enderror"
                                required>
                                <option value="">Pilih sumber informasi</option>
                                <option value="Instagram" {{ old('where_did_you_hear') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                <option value="LinkedIn" {{ old('where_did_you_hear') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                                <option value="Twitter" {{ old('where_did_you_hear') == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                                <option value="Website" {{ old('where_did_you_hear') == 'Website' ? 'selected' : '' }}>Website Resmi</option>
                                <option value="Teman/Keluarga" {{ old('where_did_you_hear') == 'Teman/Keluarga' ? 'selected' : '' }}>Teman/Keluarga</option>
                                <option value="Kampus" {{ old('where_did_you_hear') == 'Kampus' ? 'selected' : '' }}>Kampus</option>
                                <option value="Lainnya" {{ old('where_did_you_hear') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('where_did_you_hear')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Minat Event Selanjutnya -->
                        <div>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" 
                                    id="interested_next_event" 
                                    name="interested_next_event" 
                                    value="1"
                                    {{ old('interested_next_event') ? 'checked' : '' }}
                                    class="w-4 h-4 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500">
                                <span class="text-sm text-gray-700">Tertarik untuk mengikuti event Job Fair berikutnya</span>
                            </label>
                        </div>

                        <!-- Saran -->
                        <div>
                            <label for="suggestion" class="block text-sm font-medium text-gray-700 mb-1">
                                Saran & Masukan <span class="text-red-500">*</span>
                            </label>
                            <textarea id="suggestion" 
                                name="suggestion" 
                                rows="2"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors @error('suggestion') border-red-500 @enderror"
                                placeholder="Berikan saran atau masukan untuk acara..."
                                required
                                >{{ old('suggestion') }}</textarea>
                            @error('suggestion')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-4">
                    <button type="submit" 
                        id="submitBtn"
                        class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-green-800 to-yellow-600 text-white font-semibold rounded-lg shadow-md hover:from-green-900 hover:to-yellow-700 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-500 transform hover:scale-[1.02] active:scale-[0.98]">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Daftar Sekarang
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('participantForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const form = this;
    const submitBtn = document.getElementById('submitBtn');

    // Show loading state
    Swal.fire({
        title: 'Mendaftar...',
        text: 'Sedang memproses pendaftaran Anda',
        icon: 'info',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Disable button
    submitBtn.disabled = true;
    const originalBtnContent = submitBtn.innerHTML;
    submitBtn.innerHTML = `
        <span class="flex items-center justify-center gap-2">
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Mendaftar...
        </span>
    `;

    try {
        const formData = new FormData(form);
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await response.json();

        if (response.ok) {
            // Show success message
            await Swal.fire({
                icon: 'success',
                title: 'Pendaftaran Berhasil!',
                text: 'Terima kasih telah mendaftar untuk ACEED EXPO 2025.',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#16a34a',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-lg px-6 py-2'
                }
            });
            form.reset();
        } else {
            // Show validation errors
            let errorText = '';
            if (data.errors) {
                Object.values(data.errors).forEach(errors => {
                    errors.forEach(error => {
                        errorText += `• ${error}\n`;
                    });
                });
            } else {
                errorText = data.message;
            }

            await Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: errorText,
                confirmButtonText: 'Perbaiki',
                confirmButtonColor: '#dc2626',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-lg px-6 py-2'
                }
            });
        }
    } catch (error) {
        // Show general error
        await Swal.fire({
            icon: 'error',
            title: 'Kesalahan Sistem',
            text: 'Terjadi kesalahan saat memproses pendaftaran. Silakan coba lagi atau hubungi tim support.',
            confirmButtonText: 'Coba Lagi',
            confirmButtonColor: '#dc2626',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-lg px-6 py-2'
            }
        });
    } finally {
        // Restore button state
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnContent;
    }
});

// Show session messages with SweetAlert
@if(session('success'))
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#16a34a',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-lg px-6 py-2'
            }
        });
    });
@endif

@if(session('error'))
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#dc2626',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-lg px-6 py-2'
            }
        });
    });
@endif

@if($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        let errorText = '';
        @foreach($errors->all() as $error)
            errorText += '• {{ $error }}\n';
        @endforeach
        
        Swal.fire({
            icon: 'error',
            title: 'Data Tidak Valid',
            text: errorText,
            confirmButtonText: 'Perbaiki',
            confirmButtonColor: '#dc2626',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-lg px-6 py-2'
            }
        });
    });
@endif
</script>
@endsection