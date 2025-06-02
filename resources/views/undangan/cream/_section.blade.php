<div class="relative w-full text-center py-24 bg-cover bg-center rounded-b-3xl shadow-2xl overflow-hidden"
     style="background-image: url('{{ asset('assets/cream_2.jpg') }}');">

    <!-- Ornamen bunga kanan atas -->
    <img src="{{ asset('assets/small-floral-decor.png') }}" alt="Floral Decor"
         class="absolute top-0 right-0 w-20 md:w-24 h-auto opacity-70 z-10"
         data-aos="fade-down-right" data-aos-delay="200">

    <!-- Ornamen bunga kiri bawah -->
    <img src="{{ asset('assets/small-floral-decor.png') }}" alt="Floral Decor"
         class="absolute bottom-0 left-0 w-20 md:w-24 h-auto opacity-70 z-10"
         data-aos="fade-up-left" data-aos-delay="300">

    <!-- Konten utama -->
    <div class="relative z-10 px-4 md:px-6 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="400">

        <!-- Subjudul Bismillah -->
        <h2 class="text-neutral-700 text-3xl md:text-4xl drop-shadow-md tracking-wide"
            style="font-family: 'Great Vibes', cursive;"
            data-aos="fade-in" data-aos-delay="600">
            Bismillah
        </h2>

        <!-- Nama tamu -->
        @if ($namaTamu)
            <p class="text-neutral-700 text-lg md:text-xl mt-10 italic drop-shadow-sm"
               data-aos="fade-up" data-aos-delay="700">
                Yth. Bapak/Ibu/Saudara/i <br>
                <span class="text-3xl font-semibold text-[#d4af37]"
                    style="font-family: 'Great Vibes', cursive;">
                    {{ $namaTamu }}
                </span>
            </p>
        @endif

        <!-- Kalimat undangan -->
        <p class="text-neutral-800 mt-6 text-sm md:text-base leading-relaxed max-w-2xl mx-auto font-light"
           data-aos="fade-up" data-aos-delay="800">
            Dengan penuh rasa hormat, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara pernikahan kami.
        </p>

        <!-- Garis pemisah -->
        <div class="w-24 h-1 bg-neutral-400 mt-8 mx-auto rounded-full animate-pulse"
             data-aos="fade-in" data-aos-delay="900"></div>
    </div>
</div>