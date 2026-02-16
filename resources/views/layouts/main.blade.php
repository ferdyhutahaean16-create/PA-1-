<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Prodi Bioteknologi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans text-gray-800 bg-white">

    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>