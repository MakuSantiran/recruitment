<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MMSU Job Opportunities</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link href="{{ mix('/css/app.css') }}" />

        <!-- Tailwind -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        <!-- Script -->
        <script src="{{ mix('/js/app.js') }}" defer></script>
    </head>
    <body class="relative font-sans antialiased">
        <div id="app">
            <app
                
            ></app>
        </div>
    </body>
</html>
