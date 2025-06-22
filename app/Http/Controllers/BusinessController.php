<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:businesses,email',
                'type' => 'required|string|in:kuliner,fashion,kerajinan,teknologi,pertanian,jasa,lainnya',
                'description' => 'required|string|max:1000',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
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
                'type.required' => 'Bidang UMKM wajib dipilih',
                'type.in' => 'Bidang UMKM tidak valid',
                'description.required' => 'Deskripsi UMKM wajib diisi',
                'description.max' => 'Deskripsi maksimal 1000 karakter',
                'logo.required' => 'Logo/foto produk wajib diupload',
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
                if (!Storage::disk('public')->exists('business/logos')) {
                    Storage::disk('public')->makeDirectory('business/logos');
                }
                
                // Upload file
                $logoPath = $logo->storeAs('business/logos', $logoName, 'public');
                $validated['logo'] = $logoName;
            }

            // Simpan data ke database
            $business = Business::create($validated);

            // Response untuk AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pendaftaran UMKM berhasil! Tim kami akan segera menghubungi Anda untuk konfirmasi lebih lanjut.',
                    'data' => [
                        'id' => $business->id,
                        'name' => $business->name,
                        'type' => $business->type
                    ]
                ], 201);
            }

            // Redirect untuk form biasa
            return redirect()->route('umkm.register')
                ->with('success', 'Pendaftaran UMKM berhasil! Tim kami akan segera menghubungi Anda untuk konfirmasi lebih lanjut.');

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
     * Display all registered businesses
     */
    public function index(Request $request)
    {
        $query = Business::query();

        // Filter berdasarkan tipe jika ada
        if ($request->filled('type')) {
            $query->byType($request->type);
        }

        // Pencarian jika ada
        if ($request->filled('search')) {
            $query->search($request->search);
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
            // Hapus logo jika ada
            if ($business->logo && Storage::disk('public')->exists('business/logos/' . $business->logo)) {
                Storage::disk('public')->delete('business/logos/' . $business->logo);
            }

            $business->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data UMKM berhasil dihapus'
            ]);

        } catch (\Exception $e) {            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data UMKM'
            ], 500);
        }
    }
}