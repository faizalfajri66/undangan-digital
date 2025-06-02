<div class="relative w-full text-center py-24 bg-cover shadow-2xl overflow-hidden"
     style="background-image: url('{{ asset('assets/cream_1.jpg') }}'); background-blend-mode: overlay;">

    <!-- Ornamen bunga kanan atas -->
    <img src="{{ asset('assets/small-floral-decor.png') }}" alt="Floral Decor"
         class="absolute top-0 right-0 w-20 md:w-24 h-auto opacity-70 z-10"
         data-aos="fade-down-right" data-aos-delay="200">

    <!-- Ornamen bunga kiri bawah -->
    <img src="{{ asset('assets/small-floral-decor.png') }}" alt="Floral Decor"
         class="absolute bottom-0 left-0 w-20 md:w-24 h-auto opacity-70 z-10"
         data-aos="fade-up-left" data-aos-delay="300">

    <!-- Overlay bayangan -->
    <div class="absolute inset-0 w-full h-full bg-gradient-to-b from-black/60 via-black/30 to-transparent z-0"></div>

    <!-- Konten utama -->
    <div class="relative z-10 px-4 md:px-6 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="400">

        <!-- Subjudul -->
        <h2 class="text-sm md:text-base tracking-widest uppercase text-white font-light drop-shadow-md mb-2"
            data-aos="fade-in" data-aos-delay="500">
            Undangan Pernikahan
        </h2>

        <!-- Nama mempelai pria -->
        <h1 class="text-5xl md:text-7xl font-bold leading-tight text-white drop-shadow-xl tracking-wider mt-2"
            style="font-family: 'Great Vibes', cursive;"
            data-aos="zoom-in-up" data-aos-delay="600">
            {{ $undangan->nama_pria }}
        </h1>

        <!-- Simbol & -->
        <h1 class="text-5xl md:text-7xl font-bold leading-tight text-[#f5f5dc] drop-shadow-xl tracking-wider"
            style="font-family: 'Great Vibes', cursive;"
            data-aos="zoom-in-up" data-aos-delay="700">
            &
        </h1>

        <!-- Nama mempelai wanita -->
        <h1 class="text-5xl md:text-7xl font-bold leading-tight text-white drop-shadow-xl tracking-wider"
            style="font-family: 'Great Vibes', cursive;"
            data-aos="zoom-in-up" data-aos-delay="800">
            {{ $undangan->nama_wanita }}
        </h1>

        <!-- Garis pemisah -->
        <div class="w-24 h-1 bg-white/80 mt-6 mx-auto rounded-full animate-pulse"
             data-aos="fade-in" data-aos-delay="1000"></div>
    </div>
</div>