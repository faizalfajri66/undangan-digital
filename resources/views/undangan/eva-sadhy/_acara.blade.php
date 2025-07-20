<div 
    class="relative bg-white/70 backdrop-blur-md py-20 px-4 text-center"
    style="background-image: url('{{ asset('assets/eva-sadhy_background2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="max-w-4xl mx-auto">
     <h2 class="text-2xl md:text-3xl font-semibold text-white mb-12 tracking-wider drop-shadow-[2px_2px_4px_rgba(0,0,0,0.7)]"
        style="font-family: 'Great Vibes', cursive;">
        Susunan Acara
    </h2>
        <!-- Grid -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 bg-white/80 rounded-xl p-6 shadow-lg backdrop-blur-sm ring-1 ring-pink-200">
            
            <!-- Tanggal -->
            <div class="flex flex-col items-center text-pink-800">
                <div class="text-lg md:text-xl font-medium mb-1 tracking-wide">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->translatedFormat('l') }}
                </div>
                <div class="text-6xl md:text-7xl font-extrabold text-pink-500 leading-none">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('d') }}
                </div>
                <div class="text-xl md:text-2xl font-semibold mt-1 tracking-wide">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->translatedFormat('F') }}
                </div>
                <div class="text-base md:text-lg text-pink-400">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('Y') }}
                </div>
            </div>

            <!-- Jam dan Lokasi -->
            <div class="text-center md:text-left space-y-4 text-pink-900">
                <div class="text-lg md:text-xl font-medium">
                    Waktu: <span class="text-pink-600 font-semibold">{{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('H:i') }} WIB</span>
                </div>
                <div class="text-base md:text-lg leading-relaxed font-normal">
                    Lokasi Acara: <br>
                    <span class="text-pink-600 font-semibold">{{ $undangan->lokasi }}</span>
                </div>

                <!-- Tombol Simpan Kalender -->
                <div class="mt-6">
                    <a
                        href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Pernikahan {{ urlencode($undangan->nama_pria . ' & ' . $undangan->nama_wanita) }}&dates={{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('Ymd\THis') }}/{{ \Carbon\Carbon::parse($undangan->tanggal_acara)->addHours(2)->format('Ymd\THis') }}&details={{ urlencode('Lokasi: ' . $undangan->lokasi) }}&sf=true&output=xml"
                        target="_blank"
                        class="inline-block px-6 py-2 bg-pink-500 hover:bg-pink-600 text-white font-semibold rounded-full shadow-md transition"
                    >
                        Simpan ke Kalender
                    </a>
                </div>
            </div>
        </div>

        <!-- Lokasi Peta -->
        <div class="mt-12">
            <div class="bg-white/80 backdrop-blur-sm shadow-xl ring-1 ring-pink-200 rounded-xl max-w-3xl mx-auto p-6">
                <h3 class="text-xl md:text-2xl font-semibold text-pink-800 mb-4 text-center">
                    Lokasi Acara
                </h3>

                <div id="map" class="w-full h-72 rounded-md"></div>

                <div class="text-center mt-4">
                    <a 
                        href="https://www.google.com/maps?q=-4.6446875,119.5725156" 
                        target="_blank"
                        class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-5 py-2 rounded-full shadow-md transition"
                    >
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
