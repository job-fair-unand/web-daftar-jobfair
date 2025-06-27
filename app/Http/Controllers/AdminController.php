<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Business;
use App\Models\Sponsor;
use App\Models\Participant;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the company management page.
     *
     * @return \Illuminate\View\View
     */
    public function showCompany(Request $request)
    {
        $query = Company::with('user');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        // Filter by verification status
        if ($request->filled('status')) {
            if ($request->status === 'verified') {
                $query->whereHas('user', function($q) {
                    $q->whereNotNull('email_verified_at');
                });
            } elseif ($request->status === 'unverified') {
                $query->whereHas('user', function($q) {
                    $q->whereNull('email_verified_at');
                });
            }
        }

        $companies = $query->latest()->paginate(10);

        return view('admin.company.index', compact('companies'));
    }

    /**
     * Get company detail for modal
     */
    public function getCompanyDetail(Company $company)
    {
        try {
            $company->load(['user', 'transactions', 'booths']);
            
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $company->id,
                    'logo' => $company->logo,
                    'user' => [
                        'name' => $company->user?->name,
                        'email' => $company->user?->email,
                        'phone_number' => $company->user?->phone_number,
                        'address' => $company->user?->address,
                        'email_verified_at' => $company->user?->email_verified_at,
                        'created_at' => $company->user?->created_at,
                    ],
                    'transactions_count' => $company->transactions->count(),
                    'booths_count' => $company->booths->count(),
                    'recent_transactions' => $company->transactions()
                        ->latest()
                        ->limit(3)
                        ->get()
                        ->map(function($transaction) {
                            return [
                                'id' => $transaction->id,
                                'amount' => $transaction->amount,
                                'status' => $transaction->status,
                                'created_at' => $transaction->created_at,
                                'description' => $transaction->description ?? 'Pembayaran booth'
                            ];
                        }),
                    'registered_at' => $company->created_at,
                    'last_activity' => $company->updated_at,
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil detail perusahaan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete company
     */
    public function deleteCompany(Company $company)
    {
        try {
            // Hapus logo jika ada
            if ($company->logo && Storage::disk('public')->exists('company/logos/' . $company->logo)) {
                Storage::disk('public')->delete('company/logos/' . $company->logo);
            }

            // Hapus user terkait
            if ($company->user) {
                $company->user->delete();
            }

            // Hapus company
            $company->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data perusahaan berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data perusahaan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the sponsor management page.
     *
     * @return \Illuminate\View\View
     */
    public function showSponsor(Request $request)
    {
        $query = Sponsor::with('user');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('sponsor_package', 'like', "%{$search}%")
                  ->orWhere('wish_for_event', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $sponsors = $query->latest()->paginate(10);

        return view('admin.sponsor.index', compact('sponsors'));
    }

    /**
     * Show the UMKM management page.
     *
     * @return \Illuminate\View\View
     */
    public function showUmkm(Request $request)
    {
        $query = Business::with('user');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('type', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $businesses = $query->latest()->paginate(10);

        return view('admin.umkm.index', compact('businesses'));
    }

    /**
     * Show the scholarship management page.
     *
     * @return \Illuminate\View\View
     */
    public function showScholarship()
    {
        return view('admin.scholarship.index');
    }

    /**
     * Show participants management page
     */
    public function showParticipant(Request $request)
    {
        $query = Participant::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('institution_name', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('participant_category', $request->category);
        }

        // Get unique categories for filter dropdown
        $categories = Participant::distinct()->pluck('participant_category')->filter();

        $participants = $query->latest()->paginate(10);

        return view('admin.participant.index', compact('participants', 'categories'));
    }

    /**
     * Get participant detail for modal
     */
    public function getParticipantDetail(Participant $participant)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $participant->id,
                    'name' => $participant->name,
                    'email' => $participant->email,
                    'phone' => $participant->phone,
                    'participant_category' => $participant->participant_category,
                    'identity_number' => $participant->identity_number,
                    'domicile' => $participant->domicile,
                    'institution_name' => $participant->institution_name,
                    'purpose' => $participant->purpose,
                    'where_did_you_hear' => $participant->where_did_you_hear,
                    'wish_for_event' => $participant->wish_for_event,
                    'registered_at' => $participant->created_at,
                    'last_updated' => $participant->updated_at,
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil detail peserta: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store new participant
     */
    public function storeParticipant(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|unique:participants,email',
                'participant_category' => 'required|string|max:255',
                'identity_number' => 'required|string|max:50',
                'domicile' => 'required|string|max:255',
                'institution_name' => 'required|string|max:255',
                'purpose' => 'required|string|max:255',
                'where_did_you_hear' => 'required|string|max:255',
                'wish_for_event' => 'required|string|max:500',
            ]);

            Participant::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data peserta berhasil ditambahkan'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan peserta: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete participant
     */
    public function deleteParticipant(Participant $participant)
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
}