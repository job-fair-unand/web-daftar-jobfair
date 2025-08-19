<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Transaction;
use App\Models\Scholarship;
use App\Models\Business;
use App\Models\Sponsor;
use App\Models\Participant;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Get real statistics
        $totalCompanies = Company::count();
        $totalSponsors = Sponsor::count();
        $totalBusinesses = Business::count();
        $totalParticipants = Participant::count();
        $totalScholarships = Scholarship::count();

        // Verified vs Unverified
        $verifiedCompanies = Company::whereHas('user', function($q) {
            $q->whereNotNull('email_verified_at');
        })->count();

        $verifiedSponsors = Sponsor::whereHas('user', function($q) {
            $q->whereNotNull('email_verified_at');
        })->count();

        $verifiedBusinesses = Business::whereHas('user', function($q) {
            $q->whereNotNull('email_verified_at');
        })->count();

        $verifiedScholarships = Scholarship::whereHas('user', function($q) {
            $q->whereNotNull('email_verified_at');
        })->count();

        // Monthly registration data (last 6 months)
        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthName = $date->format('M Y');
            
            $monthlyData['labels'][] = $monthName;
            $monthlyData['companies'][] = Company::whereYear('created_at', $date->year)
                                                ->whereMonth('created_at', $date->month)
                                                ->count();
            $monthlyData['sponsors'][] = Sponsor::whereYear('created_at', $date->year)
                                            ->whereMonth('created_at', $date->month)
                                            ->count();
            $monthlyData['businesses'][] = Business::whereYear('created_at', $date->year)
                                                ->whereMonth('created_at', $date->month)
                                                ->count();
            $monthlyData['participants'][] = Participant::whereYear('created_at', $date->year)
                                                    ->whereMonth('created_at', $date->month)
                                                    ->count();
        }

        // Sponsor package distribution
        $sponsorPackages = Sponsor::selectRaw('sponsor_package, COUNT(*) as count')
                                ->groupBy('sponsor_package')
                                ->pluck('count', 'sponsor_package')
                                ->toArray();

        // Business type distribution
        $businessTypes = Business::selectRaw('type, COUNT(*) as count')
                                ->whereNotNull('type')
                                ->groupBy('type')
                                ->pluck('count', 'type')
                                ->take(5)
                                ->toArray();

        // Recent activities (last 10 registrations)
        $recentActivities = collect();
        
        // Get recent companies
        Company::with('user')->latest()->take(3)->get()->each(function($company) use ($recentActivities) {
            $recentActivities->push([
                'type' => 'company',
                'name' => $company->user?->name ?? 'Company',
                'created_at' => $company->created_at,
                'icon' => 'building-office',
                'color' => 'blue'
            ]);
        });

        // Get recent sponsors
        Sponsor::with('user')->latest()->take(3)->get()->each(function($sponsor) use ($recentActivities) {
            $recentActivities->push([
                'type' => 'sponsor',
                'name' => $sponsor->user?->name ?? 'Sponsor',
                'created_at' => $sponsor->created_at,
                'icon' => 'currency-dollar',
                'color' => 'purple'
            ]);
        });

        // Get recent businesses
        Business::with('user')->latest()->take(2)->get()->each(function($business) use ($recentActivities) {
            $recentActivities->push([
                'type' => 'business',
                'name' => $business->user?->name ?? 'UMKM',
                'created_at' => $business->created_at,
                'icon' => 'shopping-bag',
                'color' => 'green'
            ]);
        });

        // Get recent participants
        Participant::latest()->take(2)->get()->each(function($participant) use ($recentActivities) {
            $recentActivities->push([
                'type' => 'participant',
                'name' => $participant->name,
                'created_at' => $participant->created_at,
                'icon' => 'user',
                'color' => 'yellow'
            ]);
        });

        $recentActivities = $recentActivities->sortByDesc('created_at')->take(8);

        return view('admin.dashboard', compact(
            'totalCompanies', 'totalSponsors', 'totalBusinesses', 'totalParticipants', 'totalScholarships',
            'verifiedCompanies', 'verifiedSponsors', 'verifiedBusinesses', 'verifiedScholarships',
            'monthlyData', 'sponsorPackages', 'businessTypes', 'recentActivities'
        ));
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

            $activeTransaction = $company->transactions()
                ->whereIn('status', ['pending', 'approved'])
                ->with('booth')
                ->latest()
                ->first();
            
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
                    'company_data' => [
                        'nib' => $company->nib,
                        'npwp' => $company->npwp,
                        'address' => $company->address,
                        'pic' => $company->pic,
                        'pic_position' => $company->pic_position,
                        'pic_phone' => $company->pic_phone,
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
                    'active_transaction' => $activeTransaction ? [
                        'id' => $activeTransaction->id,
                        'status' => $activeTransaction->status,
                        'amount' => $activeTransaction->amount,
                        'bukti_pembayaran' => $activeTransaction->bukti_pembayaran,
                        'created_at' => $activeTransaction->created_at,
                        'booth' => $activeTransaction->booth ? [
                            'name' => $activeTransaction->booth->name,
                            'size' => $activeTransaction->booth->size,
                            'facility' => $activeTransaction->booth->facility,
                            'price' => $activeTransaction->booth->price,
                            'picture' => $activeTransaction->booth->picture,
                        ] : null,
                    ] : null,
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil detail perusahaan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function verifyTransaction(Transaction $transaction)
    {
        $transaction->status = 'approved';
        $transaction->approved_by = auth()->id();
        $transaction->approved_at = now();
        $transaction->save();

        return response()->json(['success' => true, 'message' => 'Pembayaran berhasil diverifikasi!']);
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

    public function showSponsor(Request $request)
    {
        $query = Sponsor::with('user');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('sponsor_package', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%")
                               ->orWhere('phone_number', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by sponsor package
        if ($request->filled('package')) {
            $query->where('sponsor_package', $request->package);
        }

        // Get unique packages for filter dropdown
        $packages = Sponsor::distinct()->pluck('sponsor_package')->filter();

        $sponsors = $query->latest()->paginate(10);

        return view('admin.sponsor.index', compact('sponsors', 'packages'));
    }

    /**
     * Get sponsor detail for modal
     */
    public function getSponsorDetail(Sponsor $sponsor)
    {
        try {
            $sponsor->load('user');
            
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $sponsor->id,
                    'logo' => $sponsor->logo,
                    'sponsor_package' => $sponsor->sponsor_package,
                    'mou' => $sponsor->mou,
                    'wish_for_event' => $sponsor->wish_for_event,
                    'user' => [
                        'name' => $sponsor->user?->name,
                        'email' => $sponsor->user?->email,
                        'phone_number' => $sponsor->user?->phone_number,
                        'address' => $sponsor->user?->address,
                        'email_verified_at' => $sponsor->user?->email_verified_at,
                        'created_at' => $sponsor->user?->created_at,
                    ],
                    'registered_at' => $sponsor->created_at,
                    'last_activity' => $sponsor->updated_at,
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil detail sponsor: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the UMKM management page.
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
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone_number', 'like', "%{$search}%");
                });
            });
        }

        // Status filter (based on email verification)
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

        $businesses = $query->latest()->paginate(10);

        return view('admin.umkm.index', compact('businesses'));
    }

    /**
     * Get business detail for modal
     */
    public function getBusinessDetail(Business $business)
    {
        try {
            $business->load('user');
            
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $business->id,
                    'logo' => $business->logo,
                    'type' => $business->type,
                    'description' => $business->description,
                    'proposal' => $business->proposal,
                    'user' => [
                        'name' => $business->user?->name,
                        'email' => $business->user?->email,
                        'phone_number' => $business->user?->phone_number,
                        'address' => $business->user?->address,
                        'email_verified_at' => $business->user?->email_verified_at,
                        'created_at' => $business->user?->created_at,
                    ],
                    'registered_at' => $business->created_at,
                    'last_activity' => $business->updated_at,
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil detail UMKM: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the scholarship management page.
     */
    public function showScholarship(Request $request)
    {
        $query = Scholarship::with('user');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', "%{$search}%")
                ->orWhereHas('user', function($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone_number', 'like', "%{$search}%");
                });
            });
        }

        // Status filter (based on email verification)
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

        $scholarships = $query->latest()->paginate(10);

        return view('admin.scholarship.index', compact('scholarships'));
    }

    /**
     * Get scholarship detail for modal
     */
    public function getScholarshipDetail(Scholarship $scholarship)
    {
        try {
            $scholarship->load('user');
            
            return response()->json([
                'success' => true,
                'data' => [
                    'logo' => $scholarship->logo,
                    'description' => $scholarship->description,
                    'file' => $scholarship->file,
                    'user' => [
                        'name' => $scholarship->user?->name,
                        'email' => $scholarship->user?->email,
                        'phone_number' => $scholarship->user?->phone_number,
                        'address' => $scholarship->user?->address,
                        'email_verified_at' => $scholarship->user?->email_verified_at,
                        'created_at' => $scholarship->user?->created_at,
                    ],
                    'registered_at' => $scholarship->created_at,
                    'last_activity' => $scholarship->updated_at,
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil detail beasiswa: ' . $e->getMessage()
            ], 500);
        }
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