<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Lockin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-dt0Ftc+7O7Xf/IhA2Z9/PrK7b+Jj3v+q7D9+jfZ1DhfJxIuHTR0ZkAq1Jr6H3F/fD8zZyzr0UvE1C7tT1mRbg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
    <style>

    </style>
</head>

<body>

    @include('layout.navbar')

    <main>
        @yield('content')
        {{-- SweetAlert CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#0ea5e9',
                        timer: 2500,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: '{{ session('error') }}',
                        confirmButtonColor: '#dc2626',
                    });
                });
            </script>
        @endif

    </main>

    @include('layout.footer')
    @stack('scripts')

</body>

</html>
