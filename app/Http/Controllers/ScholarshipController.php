<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ScholarshipController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegistrationForm()
    {
        return view('scholarship.register');
    }

    /**
     * Store a new scholarship registration
     */
    public function store(Request $request)
    {
        // Initialize variables for file paths
        $logoPath = null;
        $filePath = null;
        
        try {
            // Validate the input data with detailed custom messages
            $validated = $request->validate([
                'name'        => 'required|string|max:255',
                'email'       => 'required|email|max:255|unique:users,email',
                'phone'       => 'required|string|min:9|max:15',
                'password'    => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'description' => 'required|string|max:1000',
                'logo'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'file'        => 'required|file|mimes:pdf|max:5120', // Max 5MB for the file
            ], [
                'name.required'         => 'Nama institusi/pemberi beasiswa wajib diisi.',
                'email.required'        => 'Email wajib diisi.',
                'email.email'           => 'Format email tidak valid.',
                'email.unique'          => 'Email ini sudah terdaftar.',
                'phone.required'        => 'Nomor telepon wajib diisi.',
                'password.required'     => 'Password wajib diisi.',
                'password.min'          => 'Password minimal 8 karakter.',
                'password.confirmed'    => 'Konfirmasi password tidak cocok.',
                'password.regex'        => 'Password harus mengandung huruf besar, huruf kecil, dan angka.',
                'description.required'  => 'Deskripsi beasiswa wajib diisi.',
                'description.max'       => 'Deskripsi maksimal 1000 karakter.',
                'logo.required'         => 'Logo institusi wajib diunggah.',
                'logo.image'            => 'File logo harus berupa gambar.',
                'logo.mimes'            => 'Format logo harus JPEG, PNG, atau JPG.',
                'logo.max'              => 'Ukuran logo maksimal 2MB.',
                'file.required'         => 'Dokumen/proposal beasiswa wajib diunggah.',
                'file.file'             => 'File proposal harus berupa dokumen.',
                'file.mimes'            => 'Format proposal harus PDF.',
                'file.max'              => 'Ukuran proposal maksimal 5MB.',
            ]);

            // Start a database transaction
            DB::beginTransaction();

            try {
                // 1. Handle File Uploads First
                // Handle logo upload
                if ($request->hasFile('logo')) {
                    $logo = $request->file('logo');
                    $logoName = time() . '_logo_' . Str::slug($validated['name']) . '.' . $logo->getClientOriginalExtension();
                    $logoPath = $logo->storeAs('scholarship/logos', $logoName, 'public');
                    $validated['logo'] = $logoName;
                }

                // Handle file/proposal upload
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $fileName = time() . '_file_' . Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('scholarship/files', $fileName, 'public');
                    $validated['file'] = $fileName;
                }

                // 2. Create the User
                $user = User::create([
                    'name'          => $validated['name'],
                    'email'         => $validated['email'],
                    'password'      => Hash::make($validated['password']),
                    'role'          => 'scholarship',
                    'phone_number'  => $validated['phone'],
                ]);

                // 3. Create the Scholarship record
                $scholarship = Scholarship::create([
                    'user_id'     => $user->id,
                    'description' => $validated['description'],
                    'logo'        => $validated['logo'] ?? null,
                    'file'        => $validated['file'] ?? null,
                ]);

                // Commit the transaction if everything is successful
                DB::commit();

                // 4. Post-Registration Actions
                // Log the user in
                Auth::login($user);

                // Send verification email
                try {
                    $user->sendEmailVerificationNotification();
                } catch (\Exception $e) {
                    // Do not throw an error, let the registration succeed even if email fails
                }

                // Respond for AJAX requests
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Pendaftaran beasiswa berhasil! Silakan cek email Anda untuk verifikasi.',
                        'redirect' => route('verification.notice'),
                    ], 201);
                }

                // Redirect for standard form submissions
                return redirect()->route('verification.notice')
                    ->with('success', 'Pendaftaran beasiswa berhasil! Silakan cek email Anda untuk verifikasi.');

            } catch (\Exception $e) {
                // Something went wrong, rollback the transaction
                DB::rollback();
                
                // Clean up any uploaded files
                $this->cleanupFiles($logoPath, $filePath);
                
                // Re-throw the exception to be caught by the outer catch block
                throw $e;
            }

        } catch (ValidationException $e) {
            // Clean up files if validation fails after upload
            $this->cleanupFiles($logoPath, $filePath);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data yang Anda masukkan tidak valid.',
                    'errors' => $e->errors()
                ], 422);
            }

            // For standard requests, Laravel's default behavior is to redirect back with errors
            throw $e;

        } catch (\Exception $e) {
            // Clean up files on any other general error
            $this->cleanupFiles($logoPath, $filePath);

            // Respond with a general error message
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memproses pendaftaran.',
                    'errors' => ['general' => ['Terjadi kesalahan sistem: ' . $e->getMessage()]]
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memproses pendaftaran: ' . $e->getMessage());
        }
    }

    /**
     * Cleanup uploaded files in case of an error
     */
    private function cleanupFiles($logoPath = null, $filePath = null)
    {
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            Storage::disk('public')->delete($logoPath);
        }
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }
}