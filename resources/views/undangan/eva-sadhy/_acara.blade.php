<div class="relative bg-white/70 backdrop-blur-md py-20 px-4 text-center"
     style="background-image: url('{{ asset('assets/eva-sadhy_background2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-semibold text-white mb-12 tracking-wider drop-shadow-[2px_2px_4px_rgba(0,0,0,0.7)]"
            style="font-family: 'Great Vibes', cursive;">
            Susunan Acara
        </h2>

        {{-- === ACARA AKAD NIKAH === --}}
        <div class="bg-white/80 rounded-2xl shadow-lg ring-1 ring-pink-200 backdrop-blur-sm mb-12 p-6">
            <h3 class="text-xl md:text-2xl font-semibold text-pink-700 mb-6">Akad Nikah</h3>
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <!-- Tanggal -->
                <div class="flex flex-col items-center text-pink-800 min-w-[120px]">
                    <div class="text-lg md:text-xl font-medium mb-1">
                        {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->translatedFormat('l') }}
                    </div>
                    <div class="text-6xl md:text-7xl font-extrabold text-pink-500">
                        {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('d') }}
                    </div>
                    <div class="text-xl md:text-2xl font-semibold mt-1">
                        {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->translatedFormat('F') }}
                    </div>
                    <div class="text-base text-pink-400">
                        {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('Y') }}
                    </div>
                </div>

                <!-- Info Acara -->
                <div class="flex-1 text-left space-y-3 text-pink-900">
                    <p class="text-center mt-4 text-lg md:text-xl font-medium">
                        Waktu: <span class="text-pink-600 font-semibold">{{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('H:i') }} WIB</span>
                    </p>
                    <p class="text-base md:text-lg">
                        Lokasi: <br>
                        <span class="text-pink-600 font-semibold">{{ $undangan->lokasi }}</span>
                    </p>
                    <div class="w-full h-60 rounded-lg overflow-hidden mt-4">
                        <div id="map-akad" class="w-full h-full rounded-md"></div>
                    </div>
                    <div class="text-center mt-4">
                        <a 
                            href="https://www.google.com/maps?q=-4.650529185675719, 119.59295999999438" 
                            target="_blank"
                            class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-5 py-2 rounded-full shadow-md transition"
                        >
                            Buka Lokasi Akad
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- === ACARA RESEPSI === --}}
        <div class="bg-white/80 rounded-2xl shadow-lg ring-1 ring-pink-200 backdrop-blur-sm p-6">
            <h3 class="text-xl md:text-2xl font-semibold text-pink-700 mb-6">Resepsi</h3>
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <!-- Tanggal -->
                <div class="flex flex-col items-center text-pink-800 min-w-[120px]">
                    <div class="text-lg md:text-xl font-medium mb-1">
                        {{ \Carbon\Carbon::parse($undangan->tanggal_resepsi)->translatedFormat('l') }}
                    </div>
                    <div class="text-6xl md:text-7xl font-extrabold text-pink-500">
                        {{ \Carbon\Carbon::parse($undangan->tanggal_resepsi)->format('d') }}
                    </div>
                    <div class="text-xl md:text-2xl font-semibold mt-1">
                        {{ \Carbon\Carbon::parse($undangan->tanggal_resepsi)->translatedFormat('F') }}
                    </div>
                    <div class="text-base text-pink-400">
                        {{ \Carbon\Carbon::parse($undangan->tanggal_resepsi)->format('Y') }}
                    </div>
                </div>

                <!-- Info Acara -->
                <div class="flex-1 text-left space-y-3 text-pink-900">
                    <p class="text-center mt-4 text-lg md:text-xl font-medium">
                        Waktu: <span class="text-pink-600 font-semibold">{{ \Carbon\Carbon::parse($undangan->tanggal_resepsi)->format('H:i') }} WIB</span>
                    </p>
                    <p class="text-base md:text-lg">
                        Lokasi: <br>
                        <span class="text-pink-600 font-semibold">{{ $undangan->lokasi_resepsi }}</span>
                    </p>
                    <div class="w-full h-60 rounded-lg overflow-hidden mt-4">
                        <div id="map-resepsi" class="w-full h-full rounded-md"></div>
                    </div>
                    <div class="text-center mt-4">
                        <a 
                            href="https://www.google.com/maps?q=-5.542431987177147, 120.21050167116678" 
                            target="_blank"
                            class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-5 py-2 rounded-full shadow-md transition">
                            Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet CSS dan JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Leaflet Map Script -->
<script>
    // Map Akad
    const mapAkad = L.map('map-akad').setView([-4.650529185675719, 119.59295999999438], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(mapAkad);
    L.marker([-4.650529185675719, 119.59295999999438]).addTo(mapAkad)
        .bindPopup("<b>Lokasi Akad</b>").openPopup();

    // Map Resepsi
    const mapResepsi = L.map('map-resepsi').setView([-5.542431987177147, 120.21050167116678], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(mapResepsi);
    L.marker([-5.542431987177147, 120.21050167116678]).addTo(mapResepsi)
        .bindPopup("<b>Lokasi Resepsi</b>").openPopup();
</script>
