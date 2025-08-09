@extends('layouts.app')

@section('title', 'Undangan Pernikahan - ' . ($undangan->nama_tamu ?? ''))

@section('content')

{{-- Layar Pembuka (Mobile Only, Halus & Stabil) --}}
<div 
    id="openingScreen" 
    class="fixed inset-0 z-50 sm:hidden flex items-center justify-center text-center px-6 bg-cover bg-center bg-no-repeat transition-opacity duration-500"
    style="background-image: url('{{ asset('assets/background_black.jpg') }}'); background-color: rgba(255, 255, 255, 0.8); background-blend-mode: overlay;"
>
    <div class="absolute inset-0 bg-black/30"></div>

    <div 
        id="openingContent"
        class="relative z-10 w-full max-w-sm bg-white/70 backdrop-blur-md rounded-2xl p-6 shadow-2xl opacity-0 scale-95 transition-all duration-700"
    >
        @if ($namaTamu)
            <p class="text-gray-800 text-sm font-light mb-4 italic leading-relaxed">
                Kepada Yth. Bapak/Ibu/Saudara/i
                <br>
                <span class="block text-2xl font-semibold text-[#d4af37] mt-2" style="font-family: 'Great Vibes', cursive;">
                    {{ $namaTamu }}
                </span>
            </p>
        @endif

        <p class="text-gray-800 text-sm font-light mb-6 italic leading-relaxed">
            Dengan penuh kebahagiaan, kami mengundang Anda untuk hadir dalam acara pernikahan kami.
        </p>

        <button
            id="openInvitationBtn"
            class="w-full px-5 py-3 bg-yellow-600 hover:bg-yellow-700 text-white text-sm tracking-wide font-semibold rounded-full shadow-md hover:scale-105 transition-transform duration-300"
        >
            Buka Undangan
        </button>
    </div>
</div>

{{-- Musik Background --}}
@if($undangan->musik)
<audio id="musikUndangan" autoplay loop hidden>
    <source src="{{ asset('assets/' . $undangan->musik) }}" type="audio/mpeg">
</audio>
@endif

{{-- Konten Undangan --}}
<section id="home">@include('undangan.asril&martha._header', ['undangan' => $undangan])</section>
<section id="ayat">@include('undangan.asril&martha._ayat', ['undangan' => $undangan])</section>
<section id="section">@include('undangan.asril&martha._section', ['tanggal' => $undangan->tanggal_acara])</section>
<section id="countdown">@include('undangan.asril&martha._countdown', ['tanggal' => $undangan->tanggal_acara])</section>
<section id="mempelai">@include('undangan.asril&martha._profil', ['undangan' => $undangan])</section>
<section id="acara">@include('undangan.asril&martha._acara', ['undangan' => $undangan])</section>
<!-- <section id="love-story">@include('undangan.asril&martha._love_story', ['undangan' => $undangan])</section> -->
<!-- <section id="galeri">@include('undangan.asril&martha._galeri', ['undangan' => $undangan])</section> -->
<section id="amplop">@include('undangan.asril&martha._amplop', ['undangan' => $undangan])</section>
<section id="rsvp">@include('undangan.asril&martha._rsvp', ['undangan' => $undangan])</section>
<section id="footer">@include('undangan.asril&martha._footer', ['undangan' => $undangan])</section>

{{-- JS: Buka Undangan & Transisi --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const openingScreen = document.getElementById('openingScreen');
        const openBtn = document.getElementById('openInvitationBtn');
        const content = document.getElementById('openingContent');

        // Fade-in konten saat halaman siap
        setTimeout(() => {
            content.classList.remove('opacity-0', 'scale-95');
            content.classList.add('opacity-100', 'scale-100');
        }, 200);

        // Saat tombol diklik, hilangkan layar pembuka
        openBtn.addEventListener('click', () => {
            openingScreen.classList.add('opacity-0');
            setTimeout(() => {
                openingScreen.classList.add('hidden');
            }, 700);
        });
    });
</script>

{{-- JS: Autoplay Musik setelah interaksi --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const musik = document.getElementById('musikUndangan');
        document.body.addEventListener('click', () => {
            musik.play().catch(error => {
                console.warn("Autoplay blocked by browser:", error);
            });
        }, { once: true });
    });
</script>

@endsection
