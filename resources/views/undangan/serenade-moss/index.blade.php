@extends('layouts.app') {{-- atau sesuaikan dengan layout utama kamu --}}

@section('title', 'Undangan Pernikahan - ' . ($undangan->nama_tamu ?? ''))

@section('content')

{{-- Layar Pembuka --}}
<div 
    id="openingScreen" 
    class="fixed inset-0 bg-white z-50 flex flex-col items-center justify-center text-center p-6 transition-all duration-700 ease-in-out"
>
    <div 
        id="openingContent"
        class="max-w-md transform transition duration-500 scale-90 opacity-0"
    >
        @if ($namaTamu)
            <p class="text-gray-800 text-lg mb-4 italic drop-shadow-sm animate__animated animate__fadeInDown">
                Yth. Bapak/Ibu/Saudara/i
                <br>
                <span class="text-2xl font-bold text-[#c0392b]">{{ $namaTamu }}</span>
            </p>
        @endif

        <h1 class="text-xl md:text-2xl font-semibold text-[#c0392b] mb-4 animate__animated animate__fadeInUp">
            Kami mengundang Anda untuk hadir dalam acara pernikahan kami
        </h1>

        <button
            id="openInvitationBtn"
            class="px-6 py-3 bg-[#c0392b] hover:bg-[#e74c3c] text-white text-lg font-semibold rounded-full shadow-md transition-all animate__animated animate__zoomIn"
        >
            Buka Undangan
        </button>
    </div>
</div>


    {{-- Musik background --}}
    @if($undangan->musik)
        <audio autoplay loop hidden>
            <source src="{{ asset('storage/' . $undangan->musik) }}" type="audio/mp3">
        </audio>
    @endif

    {{-- Header --}}
    <section id="home">
        @include('undangan.serenade-moss._header', ['undangan' => $undangan])
    </section>

    {{-- Countdown --}}
    <section id="countdown">
        @include('undangan.serenade-moss._countdown', ['tanggal' => $undangan->tanggal_acara])
    </section>

    {{-- Profil Mempelai --}}
    <section id="mempelai">
        @include('undangan.serenade-moss._profil', ['undangan' => $undangan])
    </section>

    {{-- Acara --}}
    <section id="acara">
        @include('undangan.serenade-moss._acara', ['undangan' => $undangan])
    </section>

    <!-- {{-- Galeri --}}
    {{-- <section id="galeri">
        @include('undangan.serenade-moss._galeri', ['undangan' => $undangan])
    </section> --}}

    {{-- Love Story --}}
    {{-- <section id="love-story">
        @include('undangan.serenade-moss._love_story', ['undangan' => $undangan])
    </section> --}} -->

    {{-- RSVP --}}
    <section id="rsvp">
        @include('undangan.serenade-moss._rsvp', ['undangan' => $undangan])
    </section>

    {{-- Amplop Digital --}}
    <section id="amplop">
        @include('undangan.serenade-moss._amplop', ['undangan' => $undangan])
    </section>

    {{-- Ayat Suci --}}
    <section id="ayat">
        @include('undangan.serenade-moss._ayat', ['undangan' => $undangan])
    </section>

    {{-- Musik background --}}
    <audio id="musikUndangan" autoplay loop>
        <source src="{{ asset('storage/musik/musik_1.mp3') }}" type="audio/mpeg">
    </audio>

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
