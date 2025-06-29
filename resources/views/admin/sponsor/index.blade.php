@extends('layouts.admin')

@section('title', 'Manajemen Sponsor')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar Sponsor</h2>
                <p class="text-gray-600">Kelola semua sponsor yang terdaftar di ACEED EXPO</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mt-4 lg:mt-0">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">{{ $sponsors->total() }}</div>
                    <div class="text-xs opacity-90">Total Sponsor</div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">
                        {{ $sponsors->filter(function($sponsor) { return $sponsor->user?->email_verified_at; })->count() }}
                    </div>
                    <div class="text-xs opacity-90">Terverifikasi</div>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg p-4 text-white text-center lg:block hidden">
                    <div class="text-2xl font-bold">
                        {{ $sponsors->where('sponsor_package', 'platinum')->count() }}
                    </div>
                    <div class="text-xs opacity-90">Platinum</div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <form method="GET" action="{{ route('admin.sponsor') }}" class="flex flex-col md:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari nama sponsor, email, telepon, atau paket..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Package Filter -->
                <div class="md:w-48">
                    <select name="package" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Semua Paket</option>
                        @foreach($packages as $package)
                            <option value="{{ $package }}" {{ request('package') === $package ? 'selected' : '' }}>
                                {{ ucfirst($package) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="md:w-48">
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Semua Status</option>
                        <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                        <option value="unverified" {{ request('status') === 'unverified' ? 'selected' : '' }}>Belum Verifikasi</option>
                    </select>
                </div>

                <!-- Filter Buttons -->
                <div class="flex gap-2">
                    <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filter
                    </button>
                    @if(request()->hasAny(['search', 'package', 'status']))
                        <a href="{{ route('admin.sponsor') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-medium">
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
                    Sponsor
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kontak
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Paket
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

            @forelse($sponsors as $sponsor)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <!-- Sponsor Info -->
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                @if($sponsor->logo)
                                    <img class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200"
                                         src="{{ asset('storage/sponsor/logos/' . $sponsor->logo) }}"
                                         alt="{{ $sponsor->user?->name ?? 'Sponsor' }}">
                                @else
                                    <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $sponsor->user?->name ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Contact Info -->
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $sponsor->user?->email ?? 'N/A' }}</div>
                        <div class="text-sm text-gray-500">{{ $sponsor->user?->phone_number ?? 'N/A' }}</div>
                    </td>

                    <!-- Package -->
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                            @if($sponsor->sponsor_package === 'platinum') bg-gray-100 text-gray-800
                            @elseif($sponsor->sponsor_package === 'gold') bg-yellow-100 text-yellow-800
                            @elseif($sponsor->sponsor_package === 'silver') bg-gray-100 text-gray-600
                            @elseif($sponsor->sponsor_package === 'bronze') bg-orange-100 text-orange-800
                            @else bg-purple-100 text-purple-800 @endif">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            {{ ucfirst($sponsor->sponsor_package) }}
                        </span>
                    </td>

                    <!-- Status -->
                    <td class="px-6 py-4">
                        @if($sponsor->user?->email_verified_at)
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
                        <div>{{ $sponsor->created_at->format('d M Y') }}</div>
                        <div class="text-xs text-gray-400">{{ $sponsor->created_at->format('H:i') }}</div>
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-4 text-sm font-medium">
                        <div class="flex items-center space-x-3">
                            <!-- View Detail -->
                            <button onclick="viewSponsorDetail({{ $sponsor->id }})" 
                                    class="inline-flex items-center px-3 py-1.5 bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition-colors duration-150">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-500 mb-2">Tidak ada sponsor</h3>
                            <p class="text-gray-400">Belum ada sponsor yang terdaftar di sistem.</p>
                        </div>
                    </td>
                </tr>
            @endforelse

            <!-- Pagination Slot -->
            @if($sponsors->hasPages())
                <x-slot name="pagination">
                    {{ $sponsors->appends(request()->query())->links('vendor.pagination.custom-minimal') }}
                </x-slot>
            @endif
        </x-table>
    </div>

    @include('admin.sponsor.detail-modal')

    @push('scripts')
    <script>
        let currentSponsorId = null;

        // View sponsor detail
        function viewSponsorDetail(sponsorId) {
            currentSponsorId = sponsorId;
            
            document.getElementById('sponsorDetailModal').classList.remove('hidden');
            document.getElementById('loadingSponsorDetail').classList.remove('hidden');
            document.getElementById('detailSponsorContent').classList.add('hidden');
            
            fetch(`/admin/sponsor/${sponsorId}/detail`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateSponsorDetail(data.data);
                    } else {
                        throw new Error(data.message || 'Gagal mengambil detail sponsor');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal memuat detail sponsor',
                        confirmButtonColor: '#ef4444'
                    });
                    closeSponsorDetailModal();
                });
        }

        // Populate sponsor detail
        function populateSponsorDetail(data) {
            document.getElementById('loadingSponsorDetail').classList.add('hidden');
            document.getElementById('detailSponsorContent').classList.remove('hidden');

            // Basic info
            document.getElementById('sponsorName').textContent = data.user.name || 'N/A';
            document.getElementById('sponsorEmail').textContent = data.user.email || 'N/A';
            document.getElementById('sponsorPhone').textContent = data.user.phone_number || 'N/A';
            document.getElementById('sponsorAddress').textContent = data.user.address || 'Alamat tidak tersedia';
            document.getElementById('sponsorPackage').textContent = data.sponsor_package ? data.sponsor_package.toUpperCase() : 'N/A';
            document.getElementById('sponsorWish').textContent = data.wish_for_event || 'Tidak ada harapan khusus';

            // Logo
            const logoContainer = document.getElementById('sponsorLogo');
            if (data.logo) {
                logoContainer.innerHTML = `<img src="/storage/sponsor/logos/${data.logo}" alt="Logo" class="w-20 h-20 rounded-xl object-cover">`;
            } else {
                logoContainer.innerHTML = `
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                `;
            }

            // Verification status
            const statusElement = document.getElementById('sponsorVerificationStatus');
            if (data.user.email_verified_at) {
                statusElement.className = 'px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800';
                statusElement.innerHTML = '<span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2"></span>Terverifikasi';
            } else {
                statusElement.className = 'px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
                statusElement.innerHTML = '<span class="inline-block w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>Belum Verifikasi';
            }

            // MOU
            const mouContainer = document.getElementById('sponsorMou');
            if (data.mou) {
                mouContainer.innerHTML = `
                    <a href="/storage/sponsor/mou/${data.mou}" target="_blank" 
                       class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Lihat MOU
                    </a>
                `;
            } else {
                mouContainer.innerHTML = '<span class="text-gray-500">MOU belum tersedia</span>';
            }

            // Dates
            document.getElementById('sponsorRegisteredAt').textContent = new Date(data.registered_at).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            document.getElementById('sponsorEmailVerified').textContent = data.user.email_verified_at 
                ? new Date(data.user.email_verified_at).toLocaleDateString('id-ID')
                : 'Belum diverifikasi';

            document.getElementById('sponsorLastActivity').textContent = new Date(data.last_activity).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        // Close sponsor detail modal
        function closeSponsorDetailModal() {
            document.getElementById('sponsorDetailModal').classList.add('hidden');
            currentSponsorId = null;
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