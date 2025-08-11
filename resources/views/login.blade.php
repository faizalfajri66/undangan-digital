<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Undangan Pernikahan')</title>
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Google Fonts --}}
    <!-- Tambahkan di <head> untuk font sambung -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    </style>

    {{-- CSS dasar --}}
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
            font-family: 'Open Sans', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
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
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    {{-- Card login dibatasi max-w-sm agar ramping --}}
    <div class="bg-white shadow rounded-lg w-240 max-w-sm p-6">
        <h2 class="text-xl font-bold text-center mb-6">Login</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                       required>
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                       required>
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-pink-600 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-900">Ingat saya</label>
            </div>

            {{-- Tombol --}}
            <button type="submit"
                  class="w-full bg-pink-600 text-white py-2 px-4 rounded hover:bg-pink-700 focus:outline-none">
              Login
          </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            Belum punya akun? <a href="#" class="text-pink-600 hover:underline">Daftar</a>
        </p>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }
    </style>

</body>
</html>
