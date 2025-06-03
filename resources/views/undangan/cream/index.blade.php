@extends('layouts.app') {{-- atau sesuaikan dengan layout utama kamu --}}

@section('title', 'Undangan Pernikahan - ' . ($undangan->nama_tamu ?? ''))

@section('content')

{{-- Layar Pembuka --}}
<div 
    id="openingScreen" 
    class="fixed inset-0 z-50 flex flex-col items-center justify-center text-center p-6 transition-all duration-700 ease-in-out bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('assets/cream_1.jpg') }}'); background-color: rgba(255, 255, 255, 0.9); background-blend-mode: overlay;"
>
    <div 
        id="openingContent"
        class="max-w-xl transition duration-700 scale-100 opacity-100"
    >
        @if ($namaTamu)
            <p class="text-gray-800 text-base md:text-lg font-light mb-4 italic animate__animated animate__fadeInDown">
                Kepada Yth. Bapak/Ibu/Saudara/i
                <br>
                <span 
                    class="text-3xl font-semibold text-[#d4af37]" 
                    style="font-family: 'Great Vibes', cursive;">
                    {{ $namaTamu }}
                </span>
            </p>
        @endif

        <h1 
            class="text-gray-800 text-base md:text-lg font-light mb-4 italic animate__animated animate__fadeInDown">
            Dengan penuh kebahagiaan, kami mengundang Anda untuk hadir dalam acara pernikahan kami
        </h1>

        <button
            id="openInvitationBtn"
            class="px-8 py-3 bg-gradient-to-r from-[#d4af37] to-[#c49b0f] text-white text-lg tracking-wide font-semibold rounded-full shadow-md hover:scale-105 transition-transform animate__animated animate__zoomIn"
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
        @include('undangan.cream._header', ['undangan' => $undangan])
    </section>

    {{-- section --}}
    <section id="section">
        @include('undangan.cream._section', ['tanggal' => $undangan->$undangan])
    </section>

    {{-- Countdown --}}
    <section id="countdown">
        @include('undangan.cream._countdown', ['tanggal' => $undangan->tanggal_acara])
    </section>

    {{-- Profil Mempelai --}}
    <section id="mempelai">
        @include('undangan.cream._profil', ['undangan' => $undangan])
    </section>

    {{-- Acara --}}
    <section id="acara">
        @include('undangan.cream._acara', ['undangan' => $undangan])
    </section>

    <!-- {{-- Galeri --}}
    {{-- <section id="galeri">
        @include('undangan.cream._galeri', ['undangan' => $undangan])
    </section> --}}

    {{-- Love Story --}}
    {{-- <section id="love-story">
        @include('undangan.cream._love_story', ['undangan' => $undangan])
    </section> --}} -->

    {{-- RSVP --}}
    <section id="rsvp">
        @include('undangan.cream._rsvp', ['undangan' => $undangan])
    </section>

    {{-- Amplop Digital --}}
    <section id="amplop">
        @include('undangan.cream._amplop', ['undangan' => $undangan])
    </section>

    {{-- Ayat Suci --}}
    <section id="ayat">
        @include('undangan.cream._ayat', ['undangan' => $undangan])
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
