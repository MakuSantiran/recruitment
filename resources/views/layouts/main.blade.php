<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="content-language" content="en">
        <meta name="keywords" content="open position, opportunities, job, application, MMSU">
        <meta name="author" content="MMSU"> <!-- Update -->
        <meta name="publisher" content="Mariano Marcos State University MMSU"> <!-- Update -->
        <meta name="copyright" content=""> <!-- Update -->
        <meta name="description" content="The website lists latest job opportunities in Mariano Marcos State University/">
        <meta name="page-topic" content="Jobs">
        <meta name="page-type" content="Job Posting">
        <meta name="audience" content="Job Seeker">
        <meta name="robots" content="index, follow"> <!-- idk -->

        <title>MMSU Job Oppurtunities</title>

        <!-- Tailwind -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        @yield('style')

        @yield('script')
        
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div>
            <header class="sticky top-0 shadow-lg">
                <div class="flex justify-between bg-primary shadow-lg border-t-2 border-b-2 border-secondary">
                    <div class="py-1 pl-40 flex items-center" style="font-family:'Adobe Garamond Pro';">
                        <a href="https://www.mmsu.edu.ph/"><img src="//mmsu.edu.ph//mmsu_logo/mmsu_logo.png" alt="MMSU Logo" class="h-20"></a>
                        <h6 class="text-gray-100 text-2xl px-3 py-5 align-middle">Mariano Marcos State University</h6>
                    </div>
                    <div class="py-1 pr-40 flex items-center">
                        {{-- <input type="search" class="border border-gray-300 rounded w-64 lg:w-96 py-2 px-3" placeholder="Type to search..." /> --}}
                        <a class="nav-links" href="{{ route('opportunities') }}">Opportunities</a>
                        <a class="nav-links" href="{{ route('login') }}">Login</a>
                        <a class="nav-links" href="{{ route('registration') }}">Register</a>
                    </div>
                </div>
            </header>
            
            <main> @yield('content') </main>
        </div>
    </body>
</html>
