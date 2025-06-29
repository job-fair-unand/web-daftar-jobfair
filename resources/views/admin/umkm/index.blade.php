@extends('layouts.admin')

@section('title', 'Manajemen UMKM')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar UMKM</h2>
                <p class="text-gray-600">Kelola semua UMKM yang terdaftar di ACEED EXPO</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-2 gap-4 mt-4 lg:mt-0">
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">{{ $businesses->total() }}</div>
                    <div class="text-xs opacity-90">Total UMKM</div>
                </div>
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">
                        {{ $businesses->filter(function($business) { return $business->user?->email_verified_at; })->count() }}
                    </div>
                    <div class="text-xs opacity-90">Terverifikasi</div>
                </div>
            </div>
        </div>

        <!-- Export Button -->
        <div class="flex justify-end items-center mb-6">
            <button onclick="exportData()" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg hover:from-green-700 hover:to-blue-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Export Excel
            </button>
        </div>

        <!-- Filters -->
        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <form method="GET" action="{{ route('admin.umkm') }}" class="flex flex-col md:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari nama UMKM, email, jenis usaha, atau deskripsi..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="md:w-48">
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Semua Status</option>
                        <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                        <option value="unverified" {{ request('status') === 'unverified' ? 'selected' : '' }}>Belum Verifikasi</option>
                    </select>
                </div>

                <!-- Filter Buttons -->
                <div class="flex gap-2">
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filter
                    </button>
                    @if(request()->hasAny(['search', 'status']))
                        <a href="{{ route('admin.umkm') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-medium">
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
                    UMKM
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kontak
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Jenis Usaha
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Terdaftar
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Aksi
                </th>
            </x-slot>

            @forelse($businesses as $business)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <!-- Business Info -->
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                @if($business->logo)
                                    <img class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200"
                                         src="{{ asset('storage/business/logos/' . $business->logo) }}"
                                         alt="{{ $business->user?->name ?? 'UMKM' }}">
                                @else
                                    <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-green-400 to-blue-600 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $business->user?->name ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Contact Info -->
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $business->user?->email ?? 'N/A' }}</div>
                        <div class="text-sm text-gray-500">{{ $business->user?->phone_number ?? 'N/A' }}</div>
                    </td>

                    <!-- Business Type -->
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                            </svg>
                            {{ $business->type ?? 'Belum ditentukan' }}
                        </span>
                    </td>

                    <!-- Status -->
                    <td class="px-6 py-4">
                        @if($business->user?->email_verified_at)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Terverifikasi
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                Belum Verifikasi
                            </span>
                        @endif
                    </td>

                    <!-- Registration Date -->
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <div>{{ $business->created_at->format('d M Y') }}</div>
                        <div class="text-xs text-gray-400">{{ $business->created_at->format('H:i') }}</div>
                    </td>

                    <!-- Actions - HANYA DETAIL -->
                    <td class="px-6 py-4 text-sm font-medium">
                        <div class="flex items-center">
                            <!-- View Detail Only -->
                            <button onclick="viewBusinessDetail({{ $business->id }})" 
                                    class="inline-flex items-center px-3 py-1.5 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="text-sm">Detail</span>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-500 mb-2">Tidak ada UMKM</h3>
                            <p class="text-gray-400">Belum ada UMKM yang terdaftar di sistem.</p>
                        </div>
                    </td>
                </tr>
            @endforelse

            <!-- Pagination Slot -->
            @if($businesses->hasPages())
                <x-slot name="pagination">
                    {{ $businesses->appends(request()->query())->links('vendor.pagination.custom-minimal') }}
                </x-slot>
            @endif
        </x-table>
    </div>

    @include('admin.umkm.detail-modal')

    @push('scripts')
    <script>
        let currentBusinessId = null;

        // View business detail
        function viewBusinessDetail(businessId) {
            currentBusinessId = businessId;
            
            document.getElementById('businessDetailModal').classList.remove('hidden');
            document.getElementById('loadingBusinessDetail').classList.remove('hidden');
            document.getElementById('detailBusinessContent').classList.add('hidden');
            
            fetch(`/admin/umkm/${businessId}/detail`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateBusinessDetail(data.data);
                    } else {
                        throw new Error(data.message || 'Gagal mengambil detail UMKM');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal memuat detail UMKM',
                        confirmButtonColor: '#ef4444'
                    });
                    closeBusinessDetailModal();
                });
        }

        // Populate business detail
        function populateBusinessDetail(data) {
            document.getElementById('loadingBusinessDetail').classList.add('hidden');
            document.getElementById('detailBusinessContent').classList.remove('hidden');

            // Basic info
            document.getElementById('businessName').textContent = data.user.name || 'N/A';
            document.getElementById('businessEmail').textContent = data.user.email || 'N/A';
            document.getElementById('businessPhone').textContent = data.user.phone_number || 'N/A';
            document.getElementById('businessAddress').textContent = data.user.address || 'Alamat tidak tersedia';
            document.getElementById('businessType').textContent = data.type || 'Jenis usaha belum ditentukan';
            document.getElementById('businessDescription').textContent = data.description || 'Deskripsi belum tersedia';

            // Logo
            const logoContainer = document.getElementById('businessLogo');
            if (data.logo) {
                logoContainer.innerHTML = `<img src="/storage/business/logos/${data.logo}" alt="Logo" class="w-20 h-20 rounded-xl object-cover">`;
            } else {
                logoContainer.innerHTML = `
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                `;
            }

            // Verification status
            const statusElement = document.getElementById('businessVerificationStatus');
            if (data.user.email_verified_at) {
                statusElement.className = 'px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800';
                statusElement.innerHTML = '<span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2"></span>Terverifikasi';
            } else {
                statusElement.className = 'px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
                statusElement.innerHTML = '<span class="inline-block w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>Belum Verifikasi';
            }

            // Proposal
            const proposalContainer = document.getElementById('businessProposal');
            if (data.proposal) {
                proposalContainer.innerHTML = `
                    <a href="/storage/business/proposals/${data.proposal}" target="_blank" 
                       class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Lihat Proposal
                    </a>
                `;
            } else {
                proposalContainer.innerHTML = '<span class="text-gray-500">Proposal belum tersedia</span>';
            }

            // Dates
            document.getElementById('businessRegisteredAt').textContent = new Date(data.registered_at).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            document.getElementById('businessEmailVerified').textContent = data.user.email_verified_at 
                ? new Date(data.user.email_verified_at).toLocaleDateString('id-ID')
                : 'Belum diverifikasi';

            document.getElementById('businessLastActivity').textContent = new Date(data.last_activity).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        // Close business detail modal
        function closeBusinessDetailModal() {
            document.getElementById('businessDetailModal').classList.add('hidden');
            currentBusinessId = null;
        }

        // Export data
        function exportData() {
            Swal.fire({
                icon: 'info',
                title: 'Export Data',
                text: 'Fitur export akan tersedia segera!',
                confirmButtonColor: '#16a34a'
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