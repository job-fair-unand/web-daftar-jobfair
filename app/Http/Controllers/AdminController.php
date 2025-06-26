<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function showCompany()
    {
        return view('admin.company.index');
    }

    /**
     * Show the UMKM management page.
     *
     * @return \Illuminate\View\View
     */
    public function showSponsor()
    {
        return view('admin.sponsor.index');
    }

    /**
     * Show the UMKM management page.
     *
     * @return \Illuminate\View\View
     */
    public function showUmkm()
    {
        return view('admin.umkm.index');
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
}