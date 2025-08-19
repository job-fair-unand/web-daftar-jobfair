@extends('layouts.company')

@section('title', 'Detail Booth Anda')

@section('content')
<div class="max-w-3xl mx-auto my-8">
    @if($booth && $transaction)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-800">{{ $booth->name }}</h1>
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                    @if($transaction->status == 'pending') bg-yellow-100 text-yellow-800 ring-1 ring-inset ring-yellow-600/20
                    @elseif($transaction->status == 'approved') bg-green-100 text-green-800 ring-1 ring-inset ring-green-600/20
                    @elseif($transaction->status == 'rejected') bg-red-100 text-red-800 ring-1 ring-inset ring-red-600/20
                    @else bg-gray-100 text-gray-800 ring-1 ring-inset ring-gray-600/20 @endif">
                    {{ ucfirst($transaction->status) }}
                </span>
            </div>

            <div class="p-6">
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $booth->picture) }}" alt="Foto {{ $booth->name }}" class="w-full h-64 object-cover rounded-lg shadow-md border-2 border-gray-200">
                </div>

                <h2 class="text-xl font-semibold text-gray-700 mb-4">Detail Fasilitas</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 mb-6">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 1v4m0 0h-4m4 0l-5-5"></path></svg>
                        <div class="ml-3">
                            <dt class="font-medium text-gray-800">Ukuran</dt>
                            <dd class="text-gray-600">{{ $booth->size }}</dd>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <div class="ml-3">
                            <dt class="font-medium text-gray-800">Harga</dt>
                            <dd class="text-gray-600">Rp. {{ number_format($booth->price, 0, ',', '.') }}</dd>
                        </div>
                    </div>
                    <div class="flex items-start col-span-1 md:col-span-2">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        <div class="ml-3">
                            <dt class="font-medium text-gray-800">Fasilitas</dt>
                            <dd class="text-gray-600">{{ $booth->facility }}</dd>
                        </div>
                    </div>
                </div>

                <hr class="my-6">

                <h2 class="text-xl font-semibold text-gray-700 mb-4">Informasi Transaksi</h2>
                @if($transaction->bukti_pembayaran)
                    <div>
                        <label class="font-medium text-gray-800 flex items-center mb-2">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="ml-2">Bukti Pembayaran</span>
                        </label>
                        <a href="{{ asset('storage/' . $transaction->bukti_pembayaran) }}" target="_blank" title="Klik untuk melihat ukuran penuh">
                            <img src="{{ asset('storage/' . $transaction->bukti_pembayaran) }}" 
                                alt="Bukti Pembayaran" 
                                class="rounded-lg border border-gray-200 shadow-sm w-full max-w-md h-auto cursor-pointer transition-transform duration-200 hover:scale-105 hover:shadow-lg">
                        </a>
                    </div>
                @else
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-gray-500 ml-2">Bukti pembayaran belum diunggah.</p>
                    </div>
                @endif
                
                <div class="mt-6">
                    @if($transaction->status == 'pending')
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded-md">
                            <p class="font-bold">Menunggu Verifikasi</p>
                            <p>Tim kami sedang memverifikasi pembayaran Anda. Mohon tunggu konfirmasi selanjutnya melalui email dan dashboard Anda.</p>
                        </div>
                    @elseif($transaction->status == 'approved')
                        <div class="bg-green-50 border-l-4 border-green-400 text-green-700 p-4 rounded-md">
                            <p class="font-bold">Booking Dikonfirmasi!</p>
                            <p>Selamat, booth Anda telah berhasil dibooking. Sampai jumpa di ACEED Job Fair 2025!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-20 px-8 bg-white rounded-xl shadow-lg">
            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="mt-4 text-2xl font-semibold text-gray-800">Anda Belum Memiliki Booth</h3>
            <p class="mt-2 text-gray-500">
                Sepertinya Anda belum melakukan booking booth. Silakan pilih booth impian Anda di dashboard.
            </p>
            <div class="mt-6">
                <a href="{{ route('company.dashboard') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    @endif
</div>
@endsection