<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="{{ mix('/css/app.css') }}" />

    <!-- Tailwind -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    
    <script src="{{ mix('/js/app.js') }}" defer></script>

    @yield('script')

    @yield('title')
</head>
<body>
    @yield('content')
</body>
</html>