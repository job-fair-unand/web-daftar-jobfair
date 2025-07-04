<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Job Fair Admin</title>
    <link rel="icon" href="{{ asset('assets/icons/aceed.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans antialiased bg-gray-50 h-full overflow-hidden">
    <div class="h-screen flex overflow-hidden">
        @include('partials.admin.sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('partials.navbar-user')
            
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-4">
                @yield('content')
            </main>

            @include('partials.footer-user')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>