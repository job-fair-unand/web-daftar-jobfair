<?php
// filepath: app/Http/Controllers/SponsorController.php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegistrationForm()
    {
        return view('sponsor.register');
    }

    /**
     * Store a new sponsor registration
     */
    public function store(Request $request)
    {
        // Initialize variables di scope yang benar
        $logoPath = null;
        $mouPath = null;
        
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:users,email|unique:sponsors,email',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8',
                'sponsor_package' => 'required|string|in:platinum,gold,silver,bronze',
                'wish_for_event' => 'required|string|max:1000',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'mou' => 'required|file|mimes:pdf|max:2048',
            ], [
                'name.required' => 'Nama perusahaan/instansi wajib diisi',
                'name.max' => 'Nama perusahaan maksimal 255 karakter',
                'address.required' => 'Alamat wajib diisi',
                'address.max' => 'Alamat maksimal 500 karakter',
                'phone.required' => 'Nomor telepon wajib diisi',
                'phone.max' => 'Nomor telepon maksimal 20 karakter',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'email.max' => 'Email maksimal 255 karakter',
                'password.required' => 'Kata sandi wajib diisi',
                'password.min' => 'Kata sandi minimal 8 karakter',
                'password.confirmed' => 'Kata sandi tidak cocok',
                'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi',
                'password_confirmation.min' => 'Konfirmasi kata sandi minimal 8 karakter',
                'sponsor_package.required' => 'Paket sponsorship wajib dipilih',
                'sponsor_package.in' => 'Paket sponsorship tidak valid',
                'wish_for_event.required' => 'Harapan untuk acara wajib diisi',
                'wish_for_event.max' => 'Harapan maksimal 1000 karakter',
                'logo.required' => 'Logo perusahaan wajib diupload',
                'logo.image' => 'File harus berupa gambar',
                'logo.mimes' => 'Format gambar harus JPEG, PNG, atau JPG',
                'logo.max' => 'Ukuran gambar maksimal 2MB',
                'mou.required' => 'Dokumen MOU wajib diupload',
                'mou.file' => 'File harus berupa dokumen',
                'mou.mimes' => 'Format dokumen harus PDF',
                'mou.max' => 'Ukuran dokumen maksimal 2MB',
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
                    if (!Storage::disk('public')->exists('sponsor/logos')) {
                        Storage::disk('public')->makeDirectory('sponsor/logos');
                    }
                    
                    // Upload file
                    $logoPath = $logo->storeAs('sponsor/logos', $logoName, 'public');
                    $validated['logo'] = $logoName;
                }

                // Handle MOU upload
                if ($request->hasFile('mou')) {
                    $mou = $request->file('mou');
                    $mouName = time() . '_mou_' . Str::slug($validated['name']) . '.' . $mou->getClientOriginalExtension();
                    
                    // Pastikan direktori storage ada
                    if (!Storage::disk('public')->exists('sponsor/mou')) {
                        Storage::disk('public')->makeDirectory('sponsor/mou');
                    }
                    
                    // Upload file
                    $mouPath = $mou->storeAs('sponsor/mou', $mouName, 'public');
                    $validated['mou'] = $mouName;
                }

                if ($validated['password'] !== $validated['password_confirmation']) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['password_confirmation' => 'Konfirmasi password tidak cocok']);
                }

                // 2. BUAT USER
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']),
                    'role' => 'sponsor',
                ]);

                // 3. BUAT SPONSOR DENGAN USER_ID
                $sponsor = Sponsor::create([
                    'user_id' => $user->id,
                    'name' => $validated['name'],
                    'address' => $validated['address'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'sponsor_package' => $validated['sponsor_package'],
                    'wish_for_event' => $validated['wish_for_event'],
                    'logo' => $validated['logo'] ?? null,
                    'mou' => $validated['mou'] ?? null,
                ]);

                // Commit transaction
                DB::commit();

                // Login user
                Auth::login($user);

                // Kirim email verifikasi langsung (tanpa delay untuk testing)
                try {
                    $user->sendEmailVerificationNotification();
                } catch (\Exception $e) {
                    // Jangan throw error, biar registrasi tetap berhasil
                }

                // Response untuk AJAX
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Pendaftaran sponsor berhasil! Silakan cek email Anda untuk verifikasi.',
                        'redirect' => route('verification.notice'),
                        'data' => [
                            'id' => $sponsor->id,
                            'name' => $sponsor->name,
                            'sponsor_package' => $sponsor->sponsor_package
                        ]
                    ], 201);
                }

                // Redirect untuk form biasa
                return redirect()->route('verification.notice')
                    ->with('success', 'Pendaftaran sponsor berhasil! Silakan cek email Anda untuk verifikasi.');

            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollback();
                
                // Hapus file yang sudah diupload jika ada error
                $this->cleanupFiles($logoPath, $mouPath);
                
                throw $e;
            }

        } catch (ValidationException $e) {
            // Hapus file jika ada error validasi
            $this->cleanupFiles($logoPath, $mouPath);

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
            $this->cleanupFiles($logoPath, $mouPath);

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
    private function cleanupFiles($logoPath = null, $mouPath = null)
    {
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            Storage::disk('public')->delete($logoPath);
        }
        if ($mouPath && Storage::disk('public')->exists($mouPath)) {
            Storage::disk('public')->delete($mouPath);
        }
    }

    /**
     * Display all registered sponsors
     */
    public function index(Request $request)
    {
        $query = Sponsor::with('user');

        // Filter berdasarkan paket sponsor jika ada
        if ($request->filled('package')) {
            $query->where('sponsor_package', $request->package);
        }

        // Pencarian jika ada
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%")
                  ->orWhere('sponsor_package', 'like', "%{$request->search}%");
            });
        }

        $sponsors = $query->latest()->paginate(12);

        return view('admin.sponsor.index', compact('sponsors'));
    }

    /**
     * Delete sponsor
     */
    public function destroy(Sponsor $sponsor)
    {
        try {
            DB::beginTransaction();

            // Hapus logo jika ada
            if ($sponsor->logo && Storage::disk('public')->exists('sponsor/logos/' . $sponsor->logo)) {
                Storage::disk('public')->delete('sponsor/logos/' . $sponsor->logo);
            }

            // Hapus MOU jika ada
            if ($sponsor->mou && Storage::disk('public')->exists('sponsor/mou/' . $sponsor->mou)) {
                Storage::disk('public')->delete('sponsor/mou/' . $sponsor->mou);
            }

            // Hapus user terkait
            if ($sponsor->user) {
                $sponsor->user->delete();
            }

            // Hapus sponsor
            $sponsor->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data sponsor berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data sponsor: ' . $e->getMessage()
            ], 500);
        }
    }
}