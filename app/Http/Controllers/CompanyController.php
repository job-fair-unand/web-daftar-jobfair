<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $company = $user->company; 
        return view('company.dashboard', compact('user', 'company'));
    }

    public function prosesPilihBooth(Request $request)
    {
        $booths = explode(',', $request->input('booths', ''));
        return view('company.detail-pembayaran', compact('booths'));
    }

    // public function profile()
    // {
    //     return view('company.profile');
    // }

    // public function jobs()
    // {
    //     return view('company.jobs');
    // }

    // public function booth()
    // {
    //     return view('company.booth');
    // }
}