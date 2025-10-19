<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Lockin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
    <style>

    </style>
</head>

<body>

    @include('layout.navbar')

    <main>
        @yield('content')
    </main>

    @include('layout.footer')
    @stack('scripts')

</body>

</html>
