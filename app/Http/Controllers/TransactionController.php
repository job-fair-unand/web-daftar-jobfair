<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Booth;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'booth_id' => 'required|exists:booths,id',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'nib' => 'required',
            'npwp' => 'required',
            'address' => 'required',
            'pic' => 'required',
            'pic_position' => 'required',
            'pic_phone' => 'required',
        ]);

        $user = Auth::user();
        $company = $user->company;

        $hasPending = Transaction::where('company_id', $company->id)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($hasPending) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah melakukan booking booth. Silakan tunggu verifikasi admin sebelum booking lagi.'
            ], 403);
        }

        // Update company data
        $company->update([
            'nib' => $request->nib,
            'npwp' => $request->npwp,
            'address' => $request->address,
            'pic' => $request->pic,
            'pic_position' => $request->pic_position,
            'pic_phone' => $request->pic_phone,
        ]);

        // Upload bukti pembayaran
        $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        // Buat transaksi
        $transaction = Transaction::create([
            'booth_id' => $request->booth_id,
            'company_id' => $company->id,
            'user_id' => $user->id,
            'status' => 'pending',
            'amount' => Booth::find($request->booth_id)->price ?? 0,
            'bukti_pembayaran' => $buktiPath,
        ]);

        return response()->json(['success' => true, 'message' => 'Transaksi berhasil dibuat, menunggu verifikasi.']);
    }
}