<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegistrationForm()
    {
        return view('register-participant');
    }

    /**
     * Store a new participant registration
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'participant_category' => 'required|string|max:255',
                'identity_number' => 'required|string|max:20',
                'domicile' => 'required|string|max:255',
                'institution_name' => 'required|string|max:255', 
                'purpose' => 'required|string|max:1000',
                'where_did_you_hear' => 'required|string|max:255',
                'interested_next_event' => 'boolean',
                'suggestion' => 'required|string|max:1000', 
            ], [
                'name.required' => 'Nama lengkap wajib diisi',
                'name.max' => 'Nama maksimal 255 karakter',
                'phone.required' => 'Nomor telepon wajib diisi',
                'phone.max' => 'Nomor telepon maksimal 20 karakter',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.max' => 'Email maksimal 255 karakter',
                'participant_category.required' => 'Kategori peserta wajib dipilih',
                'participant_category.max' => 'Kategori peserta maksimal 255 karakter',
                'identity_number.required' => 'Nomor identitas wajib diisi',
                'identity_number.max' => 'Nomor identitas maksimal 20 karakter',
                'domicile.required' => 'Domisili wajib diisi',
                'domicile.max' => 'Domisili maksimal 255 karakter',
                'institution_name.required' => 'Nama institusi wajib diisi',
                'institution_name.max' => 'Nama institusi maksimal 255 karakter',
                'purpose.required' => 'Tujuan mengikuti acara wajib diisi',
                'purpose.max' => 'Tujuan maksimal 1000 karakter',
                'where_did_you_hear.required' => 'Sumber informasi wajib diisi',
                'where_did_you_hear.max' => 'Sumber informasi maksimal 255 karakter',
                'suggestion.max' => 'Saran maksimal 1000 karakter',
            ]);

            // Set default value untuk interested_next_event
            $validated['interested_next_event'] = $request->has('interested_next_event');

            // Simpan data peserta
            $participant = Participant::create($validated);

            // Response untuk AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pendaftaran berhasil! Terima kasih telah mendaftar sebagai peserta Job Fair.',
                    'data' => [
                        'id' => $participant->id,
                        'name' => $participant->name,
                        'category' => $participant->participant_category
                    ]
                ], 201);
            }

            // Redirect untuk form biasa
            return redirect()->back()
                ->with('success', 'Pendaftaran berhasil! Terima kasih telah mendaftar sebagai peserta Job Fair.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data yang Anda masukkan tidak valid',
                    'errors' => $e->errors()
                ], 422);
            }

            throw $e;

        } catch (\Exception $e) {
            \Log::error('Participant registration error: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memproses pendaftaran. Silakan coba lagi.',
                    'errors' => ['general' => ['Terjadi kesalahan sistem internal']]
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memproses pendaftaran. Silakan coba lagi.');
        }
    }

    /**
     * Display all participants for admin
     */
    public function index(Request $request)
    {
        $query = Participant::query();

        // Filter berdasarkan kategori jika ada
        if ($request->filled('category')) {
            $query->where('participant_category', $request->category);
        }

        // Pencarian jika ada
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%")
                  ->orWhere('phone', 'like', "%{$request->search}%")
                  ->orWhere('institution_name', 'like', "%{$request->search}%");
            });
        }

        $participants = $query->latest()->paginate(15);

        return view('admin.participant.index', compact('participants'));
    }

    /**
     * Show participant details
     */
    public function show(Participant $participant)
    {
        return view('admin.participant.show', compact('participant'));
    }

    /**
     * Delete participant
     */
    public function destroy(Participant $participant)
    {
        try {
            $participant->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data peserta berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data peserta: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Export participants data
     */
    public function export(Request $request)
    {
        $query = Participant::query();

        if ($request->filled('category')) {
            $query->where('participant_category', $request->category);
        }

        $participants = $query->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="participants_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function() use ($participants) {
            $file = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($file, [
                'No',
                'Nama',
                'Email', 
                'Telepon',
                'Kategori',
                'No. Identitas',
                'Domisili',
                'Institusi',
                'Tujuan',
                'Sumber Info',
                'Minat Event Lanjutan',
                'Saran',
                'Tanggal Daftar'
            ]);

            // Data participants
            foreach ($participants as $index => $participant) {
                fputcsv($file, [
                    $index + 1,
                    $participant->name,
                    $participant->email,
                    $participant->phone,
                    ucfirst(str_replace('_', ' ', $participant->participant_category)),
                    $participant->identity_number,
                    $participant->domicile,
                    $participant->institution_name,
                    $participant->purpose,
                    $participant->where_did_you_hear,
                    $participant->interested_next_event ? 'Ya' : 'Tidak',
                    $participant->suggestion,
                    $participant->created_at->format('d/m/Y H:i')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}