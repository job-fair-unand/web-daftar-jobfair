<?php
// filepath: app/Http/Controllers/BusinessController.php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegistrationForm()
    {
        return view('umkm.register');
    }

    /**
     * Store a new business registration
     */
    public function store(Request $request)
    {
        // Initialize variables di scope yang benar
        $logoPath = null;
        $proposalPath = null;
        
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'password_confirmation' => 'required|string|min:8',
                'type' => 'required|string|in:kuliner,fashion,kerajinan,teknologi,pertanian,jasa,lainnya',
                'description' => 'required|string|max:1000',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'proposal' => 'required|file|mimes:pdf|max:2048',
            ], [
                'name.required' => 'Nama UMKM wajib diisi',
                'name.max' => 'Nama UMKM maksimal 255 karakter',
                'address.required' => 'Alamat wajib diisi',
                'address.max' => 'Alamat maksimal 500 karakter',
                'phone.required' => 'Nomor telepon wajib diisi',
                'phone.max' => 'Nomor telepon maksimal 20 karakter',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'email.max' => 'Email maksimal 255 karakter',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter',
                'password.confirmed' => 'Konfirmasi password tidak cocok',
                'password.regex' => 'Password harus mengandung huruf besar, kecil, dan angka',
                'password_confirmation.required' => 'Konfirmasi password wajib diisi',
                'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter',
                'type.required' => 'Bidang UMKM wajib dipilih',
                'type.in' => 'Bidang UMKM tidak valid',
                'description.required' => 'Deskripsi UMKM wajib diisi',
                'description.max' => 'Deskripsi maksimal 1000 karakter',
                'logo.required' => 'Logo/foto produk wajib diupload',
                'logo.image' => 'File harus berupa gambar',
                'logo.mimes' => 'Format gambar harus JPEG, PNG, atau JPG',
                'logo.max' => 'Ukuran gambar maksimal 2MB',
                'proposal.required' => 'Proposal wajib diupload',
                'proposal.file' => 'File harus berupa dokumen',
                'proposal.mimes' => 'Format dokumen harus PDF',
                'proposal.max' => 'Ukuran dokumen maksimal 2MB',
            ]);

            // Mulai transaction
            DB::beginTransaction();

            try {
                // 1. HANDLE FILE UPLOADS DULU
                // Handle logo upload
                if ($request->hasFile('logo')) {
                    $logo = $request->file('logo');
                    $logoName = time() . '_' . Str::slug($validated['name']) . '.' . $logo->getClientOriginalExtension();
                    
                    // Pastikan direktori storage ada
                    if (!Storage::disk('public')->exists('business/logos')) {
                        Storage::disk('public')->makeDirectory('business/logos');
                    }
                    
                    // Upload file
                    $logoPath = $logo->storeAs('business/logos', $logoName, 'public');
                    $validated['logo'] = $logoName;
                }

                // Handle proposal upload
                if ($request->hasFile('proposal')) {
                    $proposal = $request->file('proposal');
                    $proposalName = time() . '_proposal_' . Str::slug($validated['name']) . '.' . $proposal->getClientOriginalExtension();
                    
                    // Pastikan direktori storage ada
                    if (!Storage::disk('public')->exists('business/proposals')) {
                        Storage::disk('public')->makeDirectory('business/proposals');
                    }
                    
                    // Upload file
                    $proposalPath = $proposal->storeAs('business/proposals', $proposalName, 'public');
                    $validated['proposal'] = $proposalName;
                }

                // 2. BUAT USER dengan data lengkap
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']),
                    'role' => 'umkm',
                    'phone_number' => $validated['phone'], // Sesuai kolom di tabel users
                    'address' => $validated['address'],      // Sesuai kolom di tabel users
                ]);

                // 3. BUAT BUSINESS hanya dengan data yang ada di tabel businesses
                $business = Business::create([
                    'user_id' => $user->id,
                    'logo' => $validated['logo'] ?? null,
                    'type' => $validated['type'],
                    'description' => $validated['description'],
                    'proposal' => $validated['proposal'] ?? null,
                ]);

                // Commit transaction
                DB::commit();

                // Login user
                Auth::login($user);

                // Kirim email verifikasi
                try {
                    $user->sendEmailVerificationNotification();
                } catch (\Exception $e) {
                    // Jangan throw error, biar registrasi tetap berhasil
                }

                // Response untuk AJAX
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Pendaftaran UMKM berhasil! Silakan cek email Anda untuk verifikasi.',
                        'redirect' => route('verification.notice'),
                        'data' => [
                            'id' => $business->id,
                            'name' => $user->name, // Ambil dari user
                            'type' => $business->type
                        ]
                    ], 201);
                }

                // Redirect untuk form biasa
                return redirect()->route('verification.notice')
                    ->with('success', 'Pendaftaran UMKM berhasil! Silakan cek email Anda untuk verifikasi.');

            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollback();
                
                // Hapus file yang sudah diupload jika ada error
                $this->cleanupFiles($logoPath, $proposalPath);
                
                throw $e;
            }

        } catch (ValidationException $e) {
            // Hapus file jika ada error validasi
            $this->cleanupFiles($logoPath, $proposalPath);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data yang Anda masukkan tidak valid',
                    'errors' => $e->errors()
                ], 422);
            }

            throw $e;

        } catch (\Exception $e) {
            // Hapus file jika ada error
            $this->cleanupFiles($logoPath, $proposalPath);

            // Response error
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memproses pendaftaran. Silakan coba lagi.',
                    'errors' => ['general' => ['Terjadi kesalahan sistem internal: ' . $e->getMessage()]]
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memproses pendaftaran: ' . $e->getMessage());
        }
    }

    /**
     * Cleanup uploaded files
     */
    private function cleanupFiles($logoPath = null, $proposalPath = null)
    {
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            Storage::disk('public')->delete($logoPath);
        }
        if ($proposalPath && Storage::disk('public')->exists($proposalPath)) {
            Storage::disk('public')->delete($proposalPath);
        }
    }

    /**
     * Display all registered businesses
     */
    public function index(Request $request)
    {
        $query = Business::with('user'); // Load relasi user

        // Filter berdasarkan tipe jika ada
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Pencarian jika ada
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('type', 'like', "%{$request->search}%")
                ->orWhere('description', 'like', "%{$request->search}%")
                ->orWhereHas('user', function($userQuery) use ($request) {
                    $userQuery->where('name', 'like', "%{$request->search}%")
                            ->orWhere('email', 'like', "%{$request->search}%");
                });
            });
        }

        $businesses = $query->latest()->paginate(12);

        return view('admin.umkm.index', compact('businesses'));
    }

    /**
     * Delete business
     */
    public function destroy(Business $business)
    {
        try {
            DB::beginTransaction();

            // Hapus logo jika ada
            if ($business->logo && Storage::disk('public')->exists('business/logos/' . $business->logo)) {
                Storage::disk('public')->delete('business/logos/' . $business->logo);
            }

            // Hapus proposal jika ada
            if ($business->proposal && Storage::disk('public')->exists('business/proposals/' . $business->proposal)) {
                Storage::disk('public')->delete('business/proposals/' . $business->proposal);
            }

            // Hapus user terkait
            if ($business->user) {
                $business->user->delete();
            }

            // Hapus business
            $business->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data UMKM berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data UMKM: ' . $e->getMessage()
            ], 500);
        }
    }
}