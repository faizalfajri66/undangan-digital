@extends('layouts.app') {{-- atau sesuaikan dengan layout utama kamu --}}

@section('title', 'Undangan Pernikahan - ' . ($undangan->nama_tamu ?? ''))

@section('content')

{{-- Layar Pembuka --}}
<!-- CSS agar screen penuh & scroll off -->
<style>
    html.no-scroll, body.no-scroll {
        overflow: hidden;
        height: 100%;
    }

    #openingScreen {
        height: 100vh;
    }
</style>

<!-- Script buka undangan -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Disable scroll
        document.body.classList.add('no-scroll');
        document.documentElement.classList.add('no-scroll');

        const openingScreen = document.getElementById("openingScreen");
        const openBtn = document.getElementById("openInvitationBtn");
        const navbar = document.getElementById("mainNavbar");

        if (navbar) navbar.style.display = "none";

        openBtn.addEventListener("click", () => {
            // Hilangkan opening screen
            openingScreen.style.display = "none";

            // Aktifkan scroll
            document.body.classList.remove('no-scroll');
            document.documentElement.classList.remove('no-scroll');

            // Tampilkan navbar
            if (navbar) navbar.style.display = "block";
        });
    });
</script>

<!-- Opening screen full height -->
<div 
    id="openingScreen" 
    class="fixed inset-0 bg-cover bg-center z-50 flex items-center justify-center p-6 transition-all duration-700 ease-in-out"
    style="background-image: url('{{ asset('assets/cover.jpg') }}'); height: 100vh;"
>
    <div class="w-full max-w-md bg-white/80 backdrop-blur-md p-6 rounded-xl shadow-lg text-center">
        @if ($namaTamu)
            <p class="text-gray-800 text-lg mb-4 italic">
                Yth. Bapak/Ibu/Saudara/i<br>
                <span class="text-2xl font-bold text-[#0469db]">{{ $namaTamu }}</span>
            </p>
        @endif

        <h1 class="text-xl md:text-2xl font-semibold text-[#0469db] mb-4">
            Kami mengundang Anda untuk hadir dalam acara pernikahan kami
        </h1>

        <button
            id="openInvitationBtn"
            class="px-6 py-3 bg-[#0469db] hover:bg-[#01206e] text-white text-lg font-semibold rounded-full shadow-md transition-all"
        >
            Buka Undangan
        </button>
    </div>
</div>


    {{-- Musik background --}}
    @if($undangan->musik)
    <audio id="musikUndangan" autoplay loop hidden>
        <source src="{{ asset('assets/' . $undangan->musik) }}" type="audio/mpeg">
    </audio>
    @endif


    {{-- Header --}}
    <section id="home">
        @include('undangan.blueming._header', ['undangan' => $undangan])
    </section>

    {{-- Countdown --}}
    <section id="countdown">
        @include('undangan.blueming._countdown', ['tanggal' => $undangan->tanggal_acara])
    </section>

    {{-- Profil Mempelai --}}
    <section id="mempelai">
        @include('undangan.blueming._profil', ['undangan' => $undangan])
    </section>

    {{-- Acara --}}
    <section id="acara">
        @include('undangan.blueming._acara', ['undangan' => $undangan])
    </section>

    <!-- {{-- Galeri --}}
    {{-- <section id="galeri">
        @include('undangan.blueming._galeri', ['undangan' => $undangan])
    </section> --}} -->

    {{-- Love Story --}}
    {{-- <section id="love-story">
        @include('undangan.blueming._love_story', ['undangan' => $undangan])
    </section> --}}

    {{-- RSVP --}}
    <section id="rsvp">
        @include('undangan.blueming._rsvp', ['undangan' => $undangan])
    </section>

    {{-- Amplop Digital --}}
    <section id="amplop">
        @include('undangan.blueming._amplop', ['undangan' => $undangan])
    </section>

    {{-- Ayat Suci --}}
    <section id="ayat">
        @include('undangan.blueming._ayat', ['undangan' => $undangan])
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const openingScreen = document.getElementById('openingScreen');
        const openBtn = document.getElementById('openInvitationBtn');
        const content = document.getElementById('openingContent');

        // Delay agar animasi konten muncul lebih halus
        setTimeout(() => {
            content.classList.remove('scale-90', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 200);

        // Aksi saat tombol diklik
        openBtn.addEventListener('click', () => {
            openingScreen.classList.add('opacity-0');
            setTimeout(() => {
                openingScreen.classList.add('hidden');
            }, 700);
        });
    });
</script>


    <script>
        // Autoplay fix for some browsers that block audio autoplay
        document.addEventListener('DOMContentLoaded', function () {
            const musik = document.getElementById('musikUndangan');

            // Play setelah interaksi (misal klik di mana saja)
            document.body.addEventListener('click', () => {
                musik.play().catch(error => {
                    console.warn("Autoplay blocked by browser: ", error);
                });
            }, { once: true });
        });
    </script>

@endsection
