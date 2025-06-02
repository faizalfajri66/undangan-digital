<div 
    class="relative bg-white/80 backdrop-blur-sm py-20 px-4 text-center"
    style="background-image: url('{{ asset('assets/cream_3.jpg') }}'); background-size: cover; background-position: center;"
>
    <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-12 tracking-wide">Rangkaian Acara</h2>

        <!-- Grid Responsif -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 bg-white/70 rounded-xl p-6 shadow-md backdrop-blur-md">
            
            <!-- Tanggal Block -->
            <div class="flex flex-col items-center text-gray-800">
                <div class="text-lg md:text-xl font-semibold mb-1">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->translatedFormat('l') }}
                </div>
                <div class="text-6xl md:text-7xl font-extrabold text-pink-600 leading-none">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('d') }}
                </div>
                <div class="text-xl md:text-2xl font-semibold mt-1">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->translatedFormat('F') }}
                </div>
                <div class="text-base md:text-lg text-gray-500">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('Y') }}
                </div>
            </div>

            <!-- Info Jam & Lokasi -->
            <div class="text-center md:text-left space-y-4 text-gray-700">
                <div class="text-lg md:text-xl font-semibold">
                    Pukul: <span class="text-pink-600">{{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('H:i') }} WIB</span>
                </div>
                <div class="text-base md:text-lg font-medium leading-relaxed">
                    Tempat: <br>
                    <span class="text-pink-600">{{ $undangan->lokasi }}</span>
                </div>

                <!-- Tombol Kalender -->
                <div class="mt-6">
                    <a
                        href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Pernikahan {{ urlencode($undangan->nama_pria . ' & ' . $undangan->nama_wanita) }}&dates={{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('Ymd\THis') }}/{{ \Carbon\Carbon::parse($undangan->tanggal_acara)->addHours(2)->format('Ymd\THis') }}&details={{ urlencode('Lokasi: ' . $undangan->lokasi) }}&sf=true&output=xml"
                        target="_blank"
                        class="inline-block px-6 py-2 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-lg shadow-md transition"
                    >
                        Simpan ke Kalender
                    </a>
                </div>
            </div>
        </div>

        <!-- Google Maps -->
<!-- Google Maps -->
<!-- @if($undangan->link_maps)
    <div class="mt-12">
        <div class="bg-white/70 backdrop-blur-md shadow-lg ring-2 ring-pink-300 rounded-xl max-w-3xl mx-auto p-6">
            <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-4 flex items-center justify-center gap-2">
            Lokasi Acara
            </h3>
            <div class="overflow-hidden rounded-lg shadow-md">
                <iframe 
                    src="{{ $undangan->link_maps }}"
                    width="100%" height="300"
                    class="w-full h-72 border-0 rounded-md"
                    allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </div>
@endif

    </div>
</div> -->
