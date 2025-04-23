@extends('layouts.app') {{-- atau sesuaikan dengan layout utama kamu --}}

@section('title', 'Undangan Pernikahan - ' . ($undangan->nama_tamu ?? ''))

@section('content')

{{-- Layar Pembuka --}}
<div 
    id="openingScreen" 
    class="fixed top-0 left-0 w-screen h-screen bg-cover bg-center z-50 flex flex-col items-center justify-center text-center p-4 sm:p-6 transition-all duration-700 ease-in-out"
    style="background-image: url('{{ asset('assets/cover.jpg') }}');"
>
    <div 
        id="openingContent"
        class="w-full max-w-sm sm:max-w-md md:max-w-lg bg-white/80 backdrop-blur-md p-4 sm:p-6 rounded-xl shadow-lg transform transition duration-500 scale-90 opacity-0"
    >
        @if ($namaTamu)
            <p class="text-gray-800 text-base sm:text-lg mb-4 italic drop-shadow-sm animate__animated animate__fadeInDown">
                Yth. Bapak/Ibu/Saudara/i
                <br>
                <span class="text-xl sm:text-2xl font-bold text-[#0469db]">{{ $namaTamu }}</span>
            </p>
        @endif

        <h1 class="text-lg sm:text-xl md:text-2xl font-semibold text-[#0469db] mb-4 animate__animated animate__fadeInUp">
            Kami mengundang Anda untuk hadir dalam acara pernikahan kami
        </h1>

        <button
            id="openInvitationBtn"
            class="px-4 py-2 sm:px-6 sm:py-3 bg-[#0469db] hover:bg-[#01206e] text-white text-base sm:text-lg font-semibold rounded-full shadow-md transition-all animate__animated animate__zoomIn"
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
