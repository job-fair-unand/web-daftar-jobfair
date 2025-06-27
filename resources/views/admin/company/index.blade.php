<!-- filepath: resources/views/admin/company/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Manajemen Perusahaan')

@section('content')
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar Perusahaan</h2>
                <p class="text-gray-600">Kelola semua perusahaan yang terdaftar di ACEED EXPO</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 gap-4 mt-4 lg:mt-0">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">{{ $companies->total() }}</div>
                    <div class="text-xs opacity-90">Total Perusahaan</div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-4 text-white text-center">
                    <div class="text-2xl font-bold">
                        {{ $companies->filter(function($company) { return $company->user?->email_verified_at; })->count() }}
                    </div>
                    <div class="text-xs opacity-90">Terverifikasi</div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <form method="GET" action="{{ route('admin.company') }}" class="flex flex-col md:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari nama perusahaan, email, atau telepon..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="md:w-48">
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Status</option>
                        <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                        <option value="unverified" {{ request('status') === 'unverified' ? 'selected' : '' }}>Belum Verifikasi</option>
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
                    @if(request()->hasAny(['search', 'status']))
                        <a href="{{ route('admin.company') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-medium">
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
                    Perusahaan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kontak
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

            @forelse($companies as $company)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <!-- Company Info -->
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                @if($company->logo)
                                    <img class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200"
                                         src="{{ asset('storage/company/logos/' . $company->logo) }}"
                                         alt="{{ $company->user?->name ?? 'Company' }}">
                                @else
                                    <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $company->user?->name ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Contact Info -->
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $company->user?->email ?? 'N/A' }}</div>
                        <div class="text-sm text-gray-500">{{ $company->user?->phone_number ?? 'N/A' }}</div>
                    </td>

                    <!-- Status -->
                    <td class="px-6 py-4">
                        @if($company->user?->email_verified_at)
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
                        <div>{{ $company->created_at->format('d M Y') }}</div>
                        <div class="text-xs text-gray-400">{{ $company->created_at->format('H:i') }}</div>
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-4 text-sm font-medium">
                        <div class="flex items-center space-x-3">
                            <!-- View Detail -->
                            <button onclick="viewCompanyDetail({{ $company->id }})" 
                                    class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-colors duration-150 group">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="text-sm">Detail</span>
                            </button>

                            <!-- Delete -->
                            <button onclick="deleteCompany({{ $company->id }})" 
                                    class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors duration-150 group">
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
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-500 mb-2">Tidak ada perusahaan</h3>
                            <p class="text-gray-400">Belum ada perusahaan yang terdaftar di sistem.</p>
                        </div>
                    </td>
                </tr>
            @endforelse

            <!-- Pagination Slot -->
            @if($companies->hasPages())
                <x-slot name="pagination">
                    {{ $companies->appends(request()->query())->links('vendor.pagination.custom-minimal') }}
                </x-slot>
            @endif
        </x-table>
    </div>

    @include('admin.company.detail')

    @push('scripts')
    <script>
        let currentCompanyId = null;

        // View company detail - FIXED
        function viewCompanyDetail(companyId) {
            currentCompanyId = companyId;
            
            // Show modal
            document.getElementById('companyDetailModal').classList.remove('hidden');
            
            // Show loading state
            document.getElementById('loadingState').classList.remove('hidden');
            document.getElementById('detailContent').classList.add('hidden');
            
            // Fetch company details - MENGGUNAKAN URL YANG BENAR
            fetch(`/admin/perusahaan/${companyId}/detail`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateCompanyDetail(data.data);
                    } else {
                        throw new Error(data.message || 'Gagal mengambil detail perusahaan');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal memuat detail perusahaan',
                        confirmButtonColor: '#ef4444'
                    });
                    closeCompanyDetailModal();
                });
        }

        function populateCompanyDetail(data) {
            // Hide loading, show content
            document.getElementById('loadingState').classList.add('hidden');
            document.getElementById('detailContent').classList.remove('hidden');

            // Company basic info
            document.getElementById('companyName').textContent = data.user.name || 'N/A';
            document.getElementById('companyEmail').textContent = data.user.email || 'N/A';
            document.getElementById('companyPhone').textContent = data.user.phone_number || 'N/A';
            document.getElementById('companyAddress').textContent = data.user.address || 'Alamat tidak tersedia';
            document.getElementById('companyId').textContent = `#${data.id}`;

            // Logo
            const logoContainer = document.getElementById('companyLogo');
            if (data.logo) {
                logoContainer.innerHTML = `<img src="/storage/company/logos/${data.logo}" alt="Logo" class="w-20 h-20 rounded-xl object-cover">`;
            } else {
                logoContainer.innerHTML = `
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                `;
            }

            // Verification status
            const statusElement = document.getElementById('verificationStatus');
            if (data.user.email_verified_at) {
                statusElement.className = 'px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800';
                statusElement.innerHTML = '<span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2"></span>Terverifikasi';
            } else {
                statusElement.className = 'px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
                statusElement.innerHTML = '<span class="inline-block w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>Belum Verifikasi';
            }

            // Stats
            document.getElementById('totalTransactions').textContent = data.transactions_count;
            document.getElementById('totalBooths').textContent = data.booths_count;
            
            // Calculate days since joined
            const joinedDate = new Date(data.registered_at);
            const today = new Date();
            const daysDiff = Math.floor((today - joinedDate) / (1000 * 60 * 60 * 24));
            document.getElementById('daysSinceJoined').textContent = daysDiff;

            // Dates
            document.getElementById('registeredDate').textContent = new Date(data.registered_at).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            document.getElementById('emailVerified').textContent = data.user.email_verified_at 
                ? new Date(data.user.email_verified_at).toLocaleDateString('id-ID')
                : 'Belum diverifikasi';

            document.getElementById('lastActivity').textContent = new Date(data.last_activity).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            document.getElementById('profileUpdated').textContent = new Date(data.last_activity).toLocaleDateString('id-ID');

            // Recent transactions
            const transactionsList = document.getElementById('transactionsList');
            if (data.recent_transactions && data.recent_transactions.length > 0) {
                transactionsList.innerHTML = data.recent_transactions.map(transaction => `
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-900">${transaction.description}</p>
                            <p class="text-sm text-gray-500">${new Date(transaction.created_at).toLocaleDateString('id-ID')}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-gray-900">Rp ${new Intl.NumberFormat('id-ID').format(transaction.amount)}</p>
                            <span class="px-2 py-1 rounded text-xs font-medium ${getStatusClass(transaction.status)}">
                                ${getStatusText(transaction.status)}
                            </span>
                        </div>
                    </div>
                `).join('');
            } else {
                transactionsList.innerHTML = `
                    <div class="text-center py-8 text-gray-500">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <p>Belum ada transaksi</p>
                    </div>
                `;
            }
        }

        function getStatusClass(status) {
            switch(status) {
                case 'approved': return 'bg-green-100 text-green-800';
                case 'pending': return 'bg-yellow-100 text-yellow-800';
                case 'rejected': return 'bg-red-100 text-red-800';
                default: return 'bg-gray-100 text-gray-800';
            }
        }

        function getStatusText(status) {
            switch(status) {
                case 'approved': return 'Disetujui';
                case 'pending': return 'Pending';
                case 'rejected': return 'Ditolak';
                default: return 'Unknown';
            }
        }

        // Tab switching
        function switchTab(tabName) {
            // Remove active class from all tabs
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('border-blue-500', 'text-blue-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });

            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Activate selected tab
            const selectedTab = document.getElementById(tabName + 'Tab');
            selectedTab.classList.remove('border-transparent', 'text-gray-500');
            selectedTab.classList.add('border-blue-500', 'text-blue-600');

            // Show selected content
            document.getElementById(tabName + 'TabContent').classList.remove('hidden');
        }

        // Close company detail modal
        function closeCompanyDetailModal() {
            document.getElementById('companyDetailModal').classList.add('hidden');
            currentCompanyId = null;
        }

        // Edit company function
        function editCompany() {
            if (currentCompanyId) {
                // Redirect to edit page or open edit modal
                window.location.href = `/admin/perusahaan/${currentCompanyId}/edit`;
            }
        }

        // Delete company - FIXED VERSION
        function deleteCompany(companyId) {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus perusahaan ini? Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // MENGGUNAKAN URL YANG BENAR SESUAI DENGAN ROUTE
                    const deleteUrl = `/admin/perusahaan/${companyId}`;
                    
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
                            text: 'Terjadi kesalahan saat menghapus perusahaan',
                            confirmButtonColor: '#ef4444'
                        });
                    });
                }
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