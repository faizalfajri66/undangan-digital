<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Undangan Pernikahan')</title>
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <!-- Tambahkan di <head> untuk font sambung -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    </style>

    {{-- CSS dasar --}}
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'serif'],
                        sans: ['Open Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    {{-- Optional CSS tambahan --}}
    @stack('styles')
</head>
<body class="overflow-x-hidden">
    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Konten Halaman --}}
    @yield('content')

    {{-- JS tambahan --}}
    @stack('scripts')
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
        duration: 1200,
        once: false,
        });
    </script>
</body>
</html>
