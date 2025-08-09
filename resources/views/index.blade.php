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
<body>
<header class="sticky top-0 z-50 bg-gray-900 shadow-md">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <a href="/" class="flex items-center space-x-2">
      <img src="{{ asset('assets/undanganf.png') }}" alt="UndanganF Logo" class="h-10 w-auto">
    </a>
    <nav class="hidden md:flex space-x-6 text-white font-medium">
      <a href="#demo" class="hover:text-pink-400 transition">Demo</a>
      <a href="#fitur" class="hover:text-pink-400 transition">Fitur</a>
      <a href="#tentang" class="hover:text-pink-400 transition">Tentang Kami</a>
      <a href="/buat-undangan" class="hover:text-pink-400 transition">Buat Undangan</a>
    </nav>
    <div>
      <a href="/login" class="bg-pink-600 text-white hover:bg-pink-700 py-2 px-4 rounded transition text-sm">Login</a>
    </div>
  </div>
</header>
  <!-- Hero Section -->
  <section class="bg-gradient-to-br from-pink-100 to-white py-20 px-6 text-center">
    <h2 class="text-4xl md:text-5xl font-bold text-gray-900">Buat Undangan Digital yang Berkesan</h2>
    <p class="mt-4 text-lg text-gray-700 max-w-2xl mx-auto">Kami membantu Anda membuat undangan pernikahan, aqiqah, ulang tahun, dan acara lainnya dengan tampilan elegan, modern, dan mudah dibagikan.</p>
    <a href="#fitur" class="mt-8 inline-block bg-pink-600 hover:bg-pink-700 text-white py-3 px-6 rounded-full shadow-lg transition">Lihat Fitur</a>
  </section>

  <!-- Fitur Section -->
  <section id="fitur" class="py-20 px-6 bg-white text-center">
    <h3 class="text-3xl font-bold text-gray-900 mb-10">Fitur Kami</h3>
    <div class="grid md:grid-cols-3 gap-10 max-w-5xl mx-auto">
      <div class="bg-pink-50 p-6 rounded-xl shadow hover:shadow-lg transition">
        <h4 class="text-xl font-semibold text-pink-600 mb-2">Desain Eksklusif</h4>
        <p>Berbagai template premium yang bisa dikustom sesuai keinginan.</p>
      </div>
      <div class="bg-pink-50 p-6 rounded-xl shadow hover:shadow-lg transition">
        <h4 class="text-xl font-semibold text-pink-600 mb-2">Fitur RSVP</h4>
        <p>Undangan dengan fitur konfirmasi kehadiran secara langsung.</p>
      </div>
      <div class="bg-pink-50 p-6 rounded-xl shadow hover:shadow-lg transition">
        <h4 class="text-xl font-semibold text-pink-600 mb-2">Musik & Galeri</h4>
        <p>Tampilan undangan yang dilengkapi dengan lagu dan foto Anda.</p>
      </div>
    </div>
  </section>

  <!-- Tentang Kami -->
  <section id="tentang" class="py-20 px-6 bg-gray-50 text-center">
    <h3 class="text-3xl font-bold text-gray-900 mb-6">Tentang UndanganF</h3>
    <div class="max-w-3xl mx-auto text-gray-700 leading-relaxed">
      <p>UndanganF adalah platform digital yang menyediakan layanan pembuatan undangan online dengan tampilan menarik dan profesional. Kami hadir untuk mempermudah Anda dalam membagikan momen spesial kepada kerabat dan sahabat secara cepat, mudah, dan hemat biaya.</p>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-16 bg-pink-600 text-white text-center">
    <h3 class="text-3xl font-bold">Siap Membuat Undangan Digital Anda?</h3>
    <p class="mt-4 text-lg">Buat undangan Anda sekarang hanya dalam hitungan menit!</p>
    <a href="/buat-undangan" class="mt-6 inline-block bg-white text-pink-600 font-semibold py-3 px-6 rounded-full shadow hover:bg-gray-100 transition">Buat Sekarang</a>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-center py-6 text-sm">
    <p>&copy; 2025 UndanganF. All rights reserved.</p>
    <div class="mt-2">
      <a href="#" class="hover:underline">Kontak</a> • 
      <a href="#" class="hover:underline">Kebijakan Privasi</a> • 
      <a href="#" class="hover:underline">Instagram</a>
    </div>
  </footer>

</body>
</html>