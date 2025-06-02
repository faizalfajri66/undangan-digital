<div class="relative bg-cover bg-center py-20 px-4 text-center" style="background-image: url('{{ asset('assets/cream_2.jpg') }}');">
    <!-- Overlay lembut -->
    <div class="absolute inset-0 bg-gradient-to-b from-white/70 via-white/50 to-white/20 backdrop-blur-sm"></div>

    <div class="relative z-10 max-w-5xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-12 tracking-wide" data-aos="fade-up">
            Mempelai yang Berbahagia
        </h2>

        <div class="flex flex-col md:flex-row items-center justify-center md:gap-20 gap-12">
            <!-- Mempelai wanita -->
            <div class="flex flex-col items-center max-w-xs text-gray-800 transition-transform hover:scale-105 duration-300" data-aos="fade-right">
                <div class="w-36 h-36 md:w-44 md:h-44 rounded-full overflow-hidden shadow-xl ring-4 ring-blue-400">
                    <img src="{{ asset('assets/calon_wanita.jpg') }}" alt="Mempelai wanita" class="object-cover w-full h-full" />
                </div>
                <p class="mt-4 text-3xl md:text-4xl font-[Great Vibes] text-[#8b322c]">
                    {{ $undangan->nama_wanita }}
                </p>
                <p class="mt-1 text-sm md:text-base italic text-center leading-snug">
                    Putra dari<br>
                    Bapak {{ $undangan->ayah_wanita }} & Ibu {{ $undangan->ibu_wanita }}
                </p>
            </div>

            <!-- Tanda & -->
            <div class="text-5xl md:text-7xl font-serif text-gray-600 select-none leading-none" data-aos="zoom-in" data-aos-delay="200">
                &
            </div>

            <!-- Mempelai pria -->
            <div class="flex flex-col items-center max-w-xs text-gray-800 transition-transform hover:scale-105 duration-300" data-aos="fade-left">
                <div class="w-36 h-36 md:w-44 md:h-44 rounded-full overflow-hidden shadow-xl ring-4 ring-pink-400">
                    <img src="{{ asset('assets/calon_pria.jpg') }}" alt="Mempelai pria" class="object-cover w-full h-full" />
                </div>
                <p class="mt-4 text-3xl md:text-4xl font-[Great Vibes] text-[#8b322c]">
                    {{ $undangan->nama_pria }}
                </p>
                <p class="mt-1 text-sm md:text-base italic text-center leading-snug">
                    Putri dari<br>
                    Bapak {{ $undangan->ayah_pria }} & Ibu {{ $undangan->ibu_pria }}
                </p>
            </div>
        </div>
    </div>
</div>
