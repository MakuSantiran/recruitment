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
            @yield('content')
        </div>
    </body>
</html>
