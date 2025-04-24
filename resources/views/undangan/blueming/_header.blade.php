<div class="relative w-full text-center py-24 bg-cover bg-center rounded-b-3xl shadow-lg overflow-hidden"
     style="background-image: url('{{ asset('assets/backgroun.png') }}');">

    <!-- Overlay gradasi hitam -->
    <div class="absolute inset-0 w-full h-full bg-gradient-to-b from-black/70 via-black/50 to-transparent z-0"></div>

    <!-- Konten -->
    <div class="relative z-10 px-4 md:px-6 max-w-full animate-fade-in-up">
        <img src="{{ asset('assets/small-floral-decor2.png') }}" alt="Ikon bunga"
             class="mx-auto mb-4 w-10 h-10 opacity-80">

        <h2 class="text-base md:text-lg text-white tracking-widest uppercase mb-3 font-light drop-shadow-md">
            Undangan Pernikahan
        </h2>

        <h1 class="text-4xl md:text-6xl font-serif text-white font-bold leading-tight drop-shadow-lg transition-all duration-700 text-center">
            {{ $undangan->nama_wanita }} <br>
            <span class="text-pink-200 text-3xl md:text-5xl block leading-none">&amp;</span>
            <span class="text-3xl md:text-5xl">{{ $undangan->nama_pria }}</span>
        </h1>


        @if ($namaTamu)
            <p class="text-white text-lg mt-6 italic drop-shadow-sm">
                Yth. Bapak/Ibu/Saudara/i <br>
                <span class="text-xl font-semibold">{{ $namaTamu }}</span>
            </p>
        @endif

        <p class="text-white mt-6 text-sm md:text-base leading-relaxed drop-shadow-sm max-w-2xl mx-auto">
            Dengan hormat, kami mengundang Anda untuk hadir dan memberikan doa restu dalam acara pernikahan kami.
        </p>

        <div class="w-24 h-1 bg-white/70 mt-8 mx-auto rounded-full animate-pulse"></div>

        <img src="{{ asset('assets/small-floral-decor2.png') }}" alt="Dekorasi floral"
             class="mx-auto mt-6 w-24 h-auto opacity-70">
    </div>
</div>
