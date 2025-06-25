<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function prosesPilihBooth(Request $request)
    {
        $booths = explode(',', $request->input('booths', ''));
        return view('company.detail-pembayaran', compact('booths'));
    }
}
