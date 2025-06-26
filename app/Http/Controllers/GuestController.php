<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function showCompany()
    {
        return view('company');
    }

    public function showUmkm()
    {
        return view('umkm');
    }

    public function showScholarship()
    {
        return view('scholarship');
    }

    public function showAbout()
    {
        return view('about');
    }

    public function showRegistration()
    {
        return view('register-participant');
    }
}