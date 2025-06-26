@extends('layouts.guest')

@section('title', 'Tentang')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">About ACEED EXPO Universitas Andalas</h1>
        <p class="mb-4">ACEED EXPO is an annual event organized by Universitas Andalas, showcasing innovations and opportunities in various fields.</p>
        <p class="mb-4">This event aims to connect students, companies, and scholarship providers, fostering collaboration and growth.</p>
        <p class="mb-4">Join us in celebrating innovation and excellence at ACEED EXPO Universitas Andalas 2025!</p>
        <p class="mb-4">For more information, visit our <a href="{{ route('home') }}" class="text-blue-600 hover:underline">homepage</a> or contact us at <a href="mailto:info@aceedexpo.com" class="text-blue-600 hover:underline">info@aceedexpo.com</a>.</p>
    </div>
@endsection