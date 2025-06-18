<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:sponsors,email',
                'sponsor_package' => 'required|string|in:platinum,gold,silver,bronze',
                'wish_for_event' => 'required|string|max:1000',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
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
                'sponsor_package.required' => 'Paket sponsorship wajib dipilih',
                'sponsor_package.in' => 'Paket sponsorship tidak valid',
                'wish_for_event.required' => 'Harapan untuk acara wajib diisi',
                'wish_for_event.max' => 'Harapan maksimal 1000 karakter',
                'logo.required' => 'Logo perusahaan wajib diupload',
                'logo.image' => 'File harus berupa gambar',
                'logo.mimes' => 'Format gambar harus JPEG, PNG, atau JPG',
                'logo.max' => 'Ukuran gambar maksimal 2MB',
            ]);

            // Handle file upload
            $logoPath = null;
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

            // Simpan data ke database
            $sponsor = Sponsor::create($validated);

            // Response untuk AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pendaftaran sponsor berhasil! Tim kami akan segera menghubungi Anda untuk proses selanjutnya.',
                    'data' => [
                        'id' => $sponsor->id,
                        'name' => $sponsor->name,
                        'sponsor_package' => $sponsor->sponsor_package
                    ]
                ], 201);
            }

            // Redirect untuk form biasa
            return redirect()->route('sponsor.register')
                ->with('success', 'Pendaftaran sponsor berhasil! Tim kami akan segera menghubungi Anda untuk proses selanjutnya.');

        } catch (ValidationException $e) {
            // Hapus file jika ada error validasi
            if (isset($logoPath) && Storage::disk('public')->exists($logoPath)) {
                Storage::disk('public')->delete($logoPath);
            }

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
            if (isset($logoPath) && Storage::disk('public')->exists($logoPath)) {
                Storage::disk('public')->delete($logoPath);
            }

            // Response error
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memproses pendaftaran. Silakan coba lagi atau hubungi administrator.',
                    'errors' => ['general' => ['Terjadi kesalahan sistem internal']]
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memproses pendaftaran. Silakan coba lagi atau hubungi administrator.');
        }
    }

    /**
     * Display all registered sponsors
     */
    public function index(Request $request)
    {
        $query = Sponsor::query();

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
            // Hapus logo jika ada
            if ($sponsor->logo && Storage::disk('public')->exists('sponsor/logos/' . $sponsor->logo)) {
                Storage::disk('public')->delete('sponsor/logos/' . $sponsor->logo);
            }

            $sponsor->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data sponsor berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data sponsor'
            ], 500);
        }
    }
}