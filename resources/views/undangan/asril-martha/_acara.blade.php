<div class="relative min-h-screen w-full text-center overflow-hidden">
    <!-- Gambar latar belakang -->
    <img 
        src="{{ asset('assets/background_black.jpg') }}" 
        class="absolute inset-0 w-full h-full object-cover z-0" 
        alt="Background" />

    <!-- Overlay opsional -->
    <div class="absolute inset-0 bg-black/60 z-10"></div>

    <!-- Konten di atas gambar -->
    <div class="relative z-20 py-20 px-4 max-w-4xl mx-auto text-white">
        <h2 class="text-2xl md:text-3xl font-semibold mb-12 tracking-wider" style="font-family: 'Great Vibes', cursive;">
            Susunan Acara
        </h2>

        <!-- Grid -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 bg-white/10 rounded-xl p-6 shadow-lg backdrop-blur-sm ring-1 ring-yellow-300">
            
            <!-- Tanggal -->
            <div class="flex flex-col items-center text-white">
                <div class="text-lg md:text-xl font-medium mb-1 tracking-wide">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->translatedFormat('l') }}
                </div>
                <div class="text-6xl md:text-7xl font-extrabold text-yellow-500 leading-none">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('d') }}
                </div>
                <div class="text-xl md:text-2xl font-semibold mt-1 tracking-wide">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->translatedFormat('F') }}
                </div>
                <div class="text-base md:text-lg text-gray-300">
                    {{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('Y') }}
                </div>
            </div>

            <!-- Jam dan Lokasi -->
            <div class="text-center md:text-left space-y-4 text-white">
                <div class="text-lg md:text-xl font-medium">
                    Waktu: <span class="text-yellow-400 font-semibold">{{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('H:i') }} WIB</span>
                </div>
                <div class="text-base md:text-lg leading-relaxed font-normal">
                    Lokasi Acara: <br>
                    <span class="text-yellow-400 font-semibold">{{ $undangan->lokasi }}</span>
                </div>

                <!-- Tombol Simpan Kalender -->
                <div class="mt-6">
                    <a
                        href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Pernikahan {{ urlencode($undangan->nama_pria . ' & ' . $undangan->nama_wanita) }}&dates={{ \Carbon\Carbon::parse($undangan->tanggal_acara)->format('Ymd\THis') }}/{{ \Carbon\Carbon::parse($undangan->tanggal_acara)->addHours(2)->format('Ymd\THis') }}&details={{ urlencode('Lokasi: ' . $undangan->lokasi) }}&sf=true&output=xml"
                        target="_blank"
                        class="inline-block px-6 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-full shadow-md transition"
                    >
                        Simpan ke Kalender
                    </a>
                </div>
            </div>
        </div>

        <!-- Lokasi Peta -->
        <div class="mt-12">
            <div class="bg-white/10 backdrop-blur-sm shadow-xl ring-1 ring-yellow-300 rounded-xl max-w-3xl mx-auto p-6">
                <h3 class="text-xl md:text-2xl font-semibold text-white mb-4 text-center">
                    Lokasi Acara
                </h3>

                <div id="map" class="w-full h-72 rounded-md"></div>

                <div class="text-center mt-4">
                    <a 
                        href="https://www.google.com/maps?q=-4.6454558,119.5777604" 
                        target="_blank"
                        class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-5 py-2 rounded-full shadow-md transition"
                    >
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet & Routing -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<script>
    const map = L.map('map').setView([-4.6446875, 119.5725156], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    const eventLocation = L.latLng(-4.6446875, 119.5725156);
    L.marker(eventLocation).addTo(map).bindPopup('Lokasi Acara').openPopup();
</script>
