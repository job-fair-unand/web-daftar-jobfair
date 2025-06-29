@extends('layouts.admin')

@section('title', 'Manajemen Beasiswa')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar Beasiswa</h2>
                <p class="text-gray-600">Kelola semua penyedia beasiswa yang terdaftar di ACEED EXPO</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-2 gap-4 mt-4 lg:mt-0">
                <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">{{ $scholarships->total() }}</div>
                    <div class="text-xs opacity-90">Total Beasiswa</div>
                </div>
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">
                        {{ $scholarships->filter(function($scholarship) { return $scholarship->user?->email_verified_at; })->count() }}
                    </div>
                    <div class="text-xs opacity-90">Terverifikasi</div>
                </div>
            </div>
        </div>

        <!-- Export Button -->
        <div class="flex justify-end items-center mb-6">
            <button onclick="exportData()" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Export Excel
            </button>
        </div>

        <!-- Filters -->
        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <form method="GET" action="{{ route('admin.scholarship') }}" class="flex flex-col md:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari nama penyedia, email, telepon, atau deskripsi..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="md:w-48">
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="">Semua Status</option>
                        <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                        <option value="unverified" {{ request('status') === 'unverified' ? 'selected' : '' }}>Belum Verifikasi</option>
                    </select>
                </div>

                <!-- Filter Buttons -->
                <div class="flex gap-2">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filter
                    </button>
                    @if(request()->hasAny(['search', 'status']))
                        <a href="{{ route('admin.scholarship') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-medium">
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
                    Penyedia Beasiswa
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kontak
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Deskripsi
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

            @forelse($scholarships as $scholarship)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <!-- Scholarship Provider Info -->
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                @if($scholarship->logo)
                                    <img class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200"
                                         src="{{ asset('storage/scholarship/logos/' . $scholarship->logo) }}"
                                         alt="{{ $scholarship->user?->name ?? 'Beasiswa' }}">
                                @else
                                    <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-indigo-400 to-purple-600 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $scholarship->user?->name ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Contact Info -->
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $scholarship->user?->email ?? 'N/A' }}</div>
                        <div class="text-sm text-gray-500">+62{{ $scholarship->user?->phone_number ?? 'N/A' }}</div>
                    </td>

                    <!-- Description -->
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $scholarship->description ? Str::limit($scholarship->description, 50) : 'Deskripsi belum tersedia' }}
                        </div>
                    </td>

                    <!-- Status -->
                    <td class="px-6 py-4">
                        @if($scholarship->user?->email_verified_at)
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
                        <div>{{ $scholarship->created_at->format('d M Y') }}</div>
                        <div class="text-xs text-gray-400">{{ $scholarship->created_at->format('H:i') }}</div>
                    </td>

                    <!-- Actions - HANYA DETAIL -->
                    <td class="px-6 py-4 text-sm font-medium">
                        <div class="flex items-center">
                            <!-- View Detail Only -->
                            <button onclick="viewScholarshipDetail({{ $scholarship->id }})" 
                                    class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition-colors duration-150">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-500 mb-2">Tidak ada beasiswa</h3>
                            <p class="text-gray-400">Belum ada penyedia beasiswa yang terdaftar di sistem.</p>
                        </div>
                    </td>
                </tr>
            @endforelse

            <!-- Pagination Slot -->
            @if($scholarships->hasPages())
                <x-slot name="pagination">
                    {{ $scholarships->appends(request()->query())->links('vendor.pagination.custom-minimal') }}
                </x-slot>
            @endif
        </x-table>
    </div>

    @include('admin.scholarship.detail-modal')

    @push('scripts')
    <script>
        let currentScholarshipId = null;

        // View scholarship detail
        function viewScholarshipDetail(scholarshipId) {
            currentScholarshipId = scholarshipId;
            
            document.getElementById('scholarshipDetailModal').classList.remove('hidden');
            document.getElementById('loadingScholarshipDetail').classList.remove('hidden');
            document.getElementById('detailScholarshipContent').classList.add('hidden');
            
            fetch(`/admin/beasiswa/${scholarshipId}/detail`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateScholarshipDetail(data.data);
                    } else {
                        throw new Error(data.message || 'Gagal mengambil detail beasiswa');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal memuat detail beasiswa',
                        confirmButtonColor: '#ef4444'
                    });
                    closeScholarshipDetailModal();
                });
        }

        // Populate scholarship detail
        function populateScholarshipDetail(data) {
            document.getElementById('loadingScholarshipDetail').classList.add('hidden');
            document.getElementById('detailScholarshipContent').classList.remove('hidden');

            // Basic info
            document.getElementById('scholarshipName').textContent = data.user.name || 'N/A';
            document.getElementById('scholarshipEmail').textContent = data.user.email || 'N/A';
            document.getElementById('scholarshipPhone').textContent = data.user.phone_number || 'N/A';
            document.getElementById('scholarshipAddress').textContent = data.user.address || 'Alamat tidak tersedia';
            document.getElementById('scholarshipDescription').textContent = data.description || 'Deskripsi belum tersedia';

            // Logo
            const logoContainer = document.getElementById('scholarshipLogo');
            if (data.logo) {
                logoContainer.innerHTML = `<img src="/storage/scholarship/logos/${data.logo}" alt="Logo" class="w-20 h-20 rounded-xl object-cover">`;
            } else {
                logoContainer.innerHTML = `
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                    </svg>
                `;
            }

            // Verification status
            const statusElement = document.getElementById('scholarshipVerificationStatus');
            if (data.user.email_verified_at) {
                statusElement.className = 'px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800';
                statusElement.innerHTML = '<span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2"></span>Terverifikasi';
            } else {
                statusElement.className = 'px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
                statusElement.innerHTML = '<span class="inline-block w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>Belum Verifikasi';
            }

            // File
            const fileContainer = document.getElementById('scholarshipFile');
            if (data.file) {
                fileContainer.innerHTML = `
                    <a href="/storage/scholarship/files/${data.file}" target="_blank" 
                       class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Lihat File
                    </a>
                `;
            } else {
                fileContainer.innerHTML = '<span class="text-gray-500">File belum tersedia</span>';
            }

            // Dates
            document.getElementById('scholarshipRegisteredAt').textContent = new Date(data.registered_at).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            document.getElementById('scholarshipEmailVerified').textContent = data.user.email_verified_at 
                ? new Date(data.user.email_verified_at).toLocaleDateString('id-ID')
                : 'Belum diverifikasi';

            document.getElementById('scholarshipLastActivity').textContent = new Date(data.last_activity).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        // Close scholarship detail modal
        function closeScholarshipDetailModal() {
            document.getElementById('scholarshipDetailModal').classList.add('hidden');
            currentScholarshipId = null;
        }

        // Export data
        function exportData() {
            Swal.fire({
                icon: 'info',
                title: 'Export Data',
                text: 'Fitur export akan tersedia segera!',
                confirmButtonColor: '#6366f1'
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