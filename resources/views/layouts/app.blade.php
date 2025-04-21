<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Undangan Pernikahan')</title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Open+Sans&display=swap" rel="stylesheet">

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
</body>
</html>
