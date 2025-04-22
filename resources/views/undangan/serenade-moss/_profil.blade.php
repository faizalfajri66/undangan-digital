<div class="relative bg-cover bg-center py-20 px-4 text-center" style="background-image: url('{{ asset('assets/background_2.png') }}');">
    <!-- Overlay ringan -->
    <div class="absolute inset-0 bg-gradient-to-b from-white/70 via-white/40 to-white/10"></div>

    <div class="relative z-10 max-w-5xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-12 tracking-wide">Kedua Mempelai</h2>

        <div class="flex flex-col md:flex-row items-center justify-center md:gap-20 gap-12">
            <!-- Mempelai Pria -->
            <div class="flex flex-col items-center max-w-xs text-gray-800 transition-transform hover:scale-105 duration-300">
                <div class="w-36 h-36 md:w-44 md:h-44 rounded-full overflow-hidden shadow-xl ring-4 ring-blue-400">
                    <img src="{{ asset('assets/calon_pria.jpg') }}" alt="Mempelai Pria" class="object-cover w-full h-full" />
                </div>
                <p class="mt-4 text-lg md:text-xl font-bold">{{ $undangan->nama_pria }}</p>
                <p class="mt-1 text-sm md:text-base italic text-center leading-snug">
                    Putra dari Bapak {{ $undangan->ayah_pria }}<br>
                    dan Ibu {{ $undangan->ibu_pria }}
                </p>
            </div>

            <!-- Tanda & -->
            <div class="text-5xl md:text-7xl font-serif text-gray-600 select-none leading-none">&</div>

            <!-- Mempelai Wanita -->
            <div class="flex flex-col items-center max-w-xs text-gray-800 transition-transform hover:scale-105 duration-300">
                <div class="w-36 h-36 md:w-44 md:h-44 rounded-full overflow-hidden shadow-xl ring-4 ring-pink-400">
                    <img src="{{ asset('assets/calon_wanita.jpg') }}" alt="Mempelai Wanita" class="object-cover w-full h-full" />
                </div>
                <p class="mt-4 text-lg md:text-xl font-bold">{{ $undangan->nama_wanita }}</p>
                <p class="mt-1 text-sm md:text-base italic text-center leading-snug">
                    Putri dari Bapak {{ $undangan->ayah_wanita }}<br>
                    dan Ibu {{ $undangan->ibu_wanita }}
                </p>
            </div>
        </div>
    </div>
</div>
