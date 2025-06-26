<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    public function showRegistrationForm()
    {
        return view('company.register');
    }

    public function store(Request $request)
    {
        // Initialize variables
        $logoPath = null;
        
        try {
            // Validate the registration data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'phone_number' => 'required|string|max:20',
                'address' => 'required|string|max:500',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // 2MB max
            ], [
                'name.required' => 'Nama perusahaan wajib diisi',
                'name.max' => 'Nama perusahaan maksimal 255 karakter',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'email.max' => 'Email maksimal 255 karakter',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter',
                'password.confirmed' => 'Konfirmasi password tidak cocok',
                'password.regex' => 'Password harus mengandung huruf besar, kecil, dan angka',
                'phone_number.required' => 'Nomor telepon wajib diisi',
                'phone_number.max' => 'Nomor telepon maksimal 20 karakter',
                'address.required' => 'Alamat wajib diisi',
                'address.max' => 'Alamat maksimal 500 karakter',
                'logo.required' => 'Logo perusahaan wajib diupload',
                'logo.image' => 'File harus berupa gambar',
                'logo.mimes' => 'Format gambar harus JPEG, PNG, atau JPG',
                'logo.max' => 'Ukuran gambar maksimal 2MB',
            ]);

            // Start transaction
            DB::beginTransaction();

            try {
                // 1. HANDLE LOGO UPLOAD DULU
                if ($request->hasFile('logo')) {
                    $logo = $request->file('logo');
                    $logoName = time() . '_company_' . Str::slug($validated['name']) . '.' . $logo->getClientOriginalExtension();
                    
                    // Pastikan direktori storage ada
                    if (!Storage::disk('public')->exists('company/logos')) {
                        Storage::disk('public')->makeDirectory('company/logos');
                    }
                    
                    // Upload file
                    $logoPath = $logo->storeAs('company/logos', $logoName, 'public');
                    $validated['logo'] = $logoName;
                }

                // 2. CREATE USER
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']),
                    'phone_number' => $validated['phone_number'],
                    'address' => $validated['address'],
                    'role' => 'company',
                ]);

                // 3. CREATE COMPANY DENGAN USER_ID
                $company = Company::create([
                    'user_id' => $user->id,
                    'logo' => $validated['logo'] ?? null,
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
                        'message' => 'Pendaftaran perusahaan berhasil! Silakan cek email Anda untuk verifikasi.',
                        'redirect' => route('verification.notice'),
                        'data' => [
                            'id' => $company->id,
                            'name' => $user->name,
                            'email' => $user->email
                        ]
                    ], 201);
                }

                // Redirect untuk form biasa
                return redirect()->route('verification.notice')
                    ->with('success', 'Pendaftaran perusahaan berhasil! Silakan cek email Anda untuk verifikasi.');

            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollback();
                
                // Hapus file yang sudah diupload jika ada error
                $this->cleanupFiles($logoPath);
                
                throw $e;
            }

        } catch (ValidationException $e) {
            // Hapus file jika ada error validasi
            $this->cleanupFiles($logoPath);

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
            $this->cleanupFiles($logoPath);

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
    private function cleanupFiles($logoPath = null)
    {
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            Storage::disk('public')->delete($logoPath);
        }
    }

    public function index()
    {
        $user = Auth::user();
        $company = $user->company;
        return view('company.dashboard', compact('user', 'company'));
    }

    public function prosesPilihBooth(Request $request)
    {
        $booths = explode(',', $request->input('booths', ''));
        return view('company.detail-pembayaran', compact('booths'));
    }
}