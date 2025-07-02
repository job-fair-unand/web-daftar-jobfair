<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Scholarship;
use App\Models\Business;
use App\Models\Participant;

class GuestController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function showCompany(Request $request)
    {
        $companies = Company::with('user')
            ->whereHas('user', function($query) {
                $query->where('email_verified_at', '!=', null);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9); // 9 companies per page
        
        return view('company', compact('companies'));
    }

    public function showCompanyDetail(Company $company)
    {
        // Load relasi user
        $company->load('user');
        
        return response()->json([
            'success' => true,
            'company' => $company
        ]);
    }
    
    public function showUmkm()
    {
        $businesses = Business::with('user')
            ->whereHas('user', function($query) {
                $query->where('email_verified_at', '!=', null);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9); // 9 UMKM per page
        
        return view('umkm', compact('businesses'));
    }

    public function showScholarship()
    {
        $scholarships = Scholarship::with('user')
            ->whereHas('user', function($query) {
                $query->where('email_verified_at', '!=', null);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        
        return view('scholarship', compact('scholarships'));
    }

    public function showAbout()
    {
        $wishes = Participant::whereNotNull('wish_for_event')
            ->where('wish_for_event', '!=', '')
            ->orderBy('created_at', 'desc')
            ->limit(9)
            ->latest()
            ->get(['name', 'wish_for_event', 'participant_category', 'institution_name', 'created_at']);
        
        return view('about', compact('wishes'));
    }

    public function showRegistration()
    {
        return view('register-participant');
    }
}