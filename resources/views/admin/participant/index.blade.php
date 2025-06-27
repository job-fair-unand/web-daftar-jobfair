@extends('layouts.admin')

@section('title', 'Manajemen Peserta')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar Peserta</h2>
                <p class="text-gray-600">Kelola semua peserta yang terdaftar di ACEED EXPO</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mt-4 lg:mt-0">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">{{ $participants->total() }}</div>
                    <div class="text-xs opacity-90">Total Peserta</div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">
                        {{ $participants->where('participant_category', 'Mahasiswa')->count() }}
                    </div>
                    <div class="text-xs opacity-90">Mahasiswa</div>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg p-4 text-white text-center lg:block hidden">
                    <div class="text-2xl font-bold">
                        {{ $participants->where('participant_category', 'Fresh Graduate')->count() }}
                    </div>
                    <div class="text-xs opacity-90">Fresh Graduate</div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <button onclick="openAddModal()" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-green-600 text-white rounded-lg hover:from-blue-700 hover:to-green-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 mb-4 sm:mb-0">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Peserta
            </button>
            
            <div class="flex gap-2">
                <button onclick="exportData()" 
                        class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Excel
                </button>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <form method="GET" action="{{ route('admin.participant') }}" class="flex flex-col md:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari nama, email, telepon, atau institusi..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="md:w-48">
                    <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Buttons -->
                <div class="flex gap-2">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filter
                    </button>
                    @if(request()->hasAny(['search', 'category']))
                        <a href="{{ route('admin.participant') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-medium">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Table Component -->
        <x-table>
            <x-slot name="header">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Peserta
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kontak
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Institusi
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Aksi
                </th>
            </x-slot>

            @forelse($participants as $participant)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <!-- Participant Info -->
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-400 to-green-600 flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">
                                        {{ strtoupper(substr($participant->name, 0, 1)) }}
                                    </span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $participant->name }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Contact Info -->
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $participant->email }}</div>
                        <div class="text-sm text-gray-500">{{ $participant->phone }}</div>
                    </td>

                    <!-- Category -->
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                            @if($participant->participant_category === 'Mahasiswa') bg-blue-100 text-blue-800
                            @elseif($participant->participant_category === 'Fresh Graduate') bg-green-100 text-green-800
                            @elseif($participant->participant_category === 'Professional') bg-purple-100 text-purple-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ $participant->participant_category }}
                        </span>
                    </td>

                    <!-- Institution -->
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $participant->institution_name }}</div>
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-4 text-sm font-medium">
                        <div class="flex items-center space-x-3">
                            <!-- View Detail -->
                            <button onclick="viewParticipantDetail({{ $participant->id }})" 
                                    class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="text-sm">Detail</span>
                            </button>

                            <!-- Delete -->
                            <button onclick="deleteParticipant({{ $participant->id }})" 
                                    class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                <span class="text-sm">Hapus</span>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-500 mb-2">Tidak ada peserta</h3>
                            <p class="text-gray-400">Belum ada peserta yang terdaftar di sistem.</p>
                        </div>
                    </td>
                </tr>
            @endforelse

            <!-- Pagination Slot -->
            @if($participants->hasPages())
                <x-slot name="pagination">
                    {{ $participants->appends(request()->query())->links('vendor.pagination.custom-minimal') }}
                </x-slot>
            @endif
        </x-table>
    </div>

    @include('admin.participant.add-modal')
    @include('admin.participant.detail-modal')

    @push('scripts')
    <script>
        let currentParticipantId = null;

        // Open add modal
        function openAddModal() {
            document.getElementById('addParticipantModal').classList.remove('hidden');
            document.getElementById('addParticipantForm').reset();
        }

        // Close add modal
        function closeAddModal() {
            document.getElementById('addParticipantModal').classList.add('hidden');
        }

        // Submit add form
        function submitAddForm() {
            const form = document.getElementById('addParticipantForm');
            const formData = new FormData(form);

            fetch('/admin/peserta', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: data.message,
                        confirmButtonColor: '#22c55e'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: data.message,
                        confirmButtonColor: '#ef4444'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat menambahkan peserta',
                    confirmButtonColor: '#ef4444'
                });
            });
        }

        // View participant detail
        function viewParticipantDetail(participantId) {
            currentParticipantId = participantId;
            
            document.getElementById('participantDetailModal').classList.remove('hidden');
            document.getElementById('loadingStateDetail').classList.remove('hidden');
            document.getElementById('detailContentParticipant').classList.add('hidden');
            
            fetch(`/admin/peserta/${participantId}/detail`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        populateParticipantDetail(data.data);
                    } else {
                        throw new Error(data.message || 'Gagal mengambil detail peserta');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal memuat detail peserta',
                        confirmButtonColor: '#ef4444'
                    });
                    closeParticipantDetailModal();
                });
        }

        // Populate participant detail
        function populateParticipantDetail(data) {
            document.getElementById('loadingStateDetail').classList.add('hidden');
            document.getElementById('detailContentParticipant').classList.remove('hidden');

            document.getElementById('participantName').textContent = data.name;
            document.getElementById('participantEmail').textContent = data.email;
            document.getElementById('participantPhone').textContent = data.phone;
            document.getElementById('participantCategory').textContent = data.participant_category;
            document.getElementById('participantIdentity').textContent = data.identity_number;
            document.getElementById('participantDomicile').textContent = data.domicile;
            document.getElementById('participantInstitution').textContent = data.institution_name;
            document.getElementById('participantPurpose').textContent = data.purpose;
            document.getElementById('participantHearFrom').textContent = data.where_did_you_hear;
            document.getElementById('participantWish').textContent = data.wish_for_event;
            document.getElementById('participantRegisteredAt').textContent = new Date(data.registered_at).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        // Close participant detail modal
        function closeParticipantDetailModal() {
            document.getElementById('participantDetailModal').classList.add('hidden');
            currentParticipantId = null;
        }

        // Delete participant
        function deleteParticipant(participantId) {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus peserta ini? Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const deleteUrl = `/admin/peserta/${participantId}`;
                    
                    fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: data.message,
                                confirmButtonColor: '#22c55e'
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: data.message,
                                confirmButtonColor: '#ef4444'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat menghapus peserta',
                            confirmButtonColor: '#ef4444'
                        });
                    });
                }
            });
        }

        // Export data
        function exportData() {
            Swal.fire({
                icon: 'info',
                title: 'Export Data',
                text: 'Fitur export akan tersedia segera!',
                confirmButtonColor: '#3b82f6'
            });
        }

        // Show success/error messages
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#22c55e'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#ef4444'
            });
        @endif
    </script>
    @endpush
@endsection