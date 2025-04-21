<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Undangan {{ $namaTamu }}</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f2f2f2;
            text-align: center;
            padding: 20px;
        }
        h1, h3 { margin: 0.5em 0; }
        .countdown {
            font-size: 1.5em;
            margin: 20px 0;
            color: #cc0000;
        }
        .gallery img {
            width: 200px;
            margin: 10px;
            border-radius: 10px;
        }
        form input, form textarea {
            margin: 5px;
            padding: 8px;
            width: 80%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <audio autoplay loop hidden>
        <source src="/assets/musik.mp3" type="audio/mp3">
    </audio>

    <h1>Undangan Pernikahan</h1>
    <h3>Kepada Yth. {{ $namaTamu }}</h3>

    <p>Dengan hormat, kami mengundang Anda untuk hadir di acara pernikahan kami.</p>

    <div class="countdown" id="countdown">Loading countdown...</div>

    <p>📍 Lokasi: Gedung Kebahagiaan, Bandung</p>
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!..." 
        width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>

    <h3>Galeri</h3>
    <div class="gallery">
        <img src="/assets/gambar1.jpg" alt="foto1">
        <img src="/assets/gambar2.jpg" alt="foto2">
    </div>

    <h3>Konfirmasi Kehadiran (RSVP)</h3>
    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

<form method="POST" action="{{ route('rsvp.store') }}">
    @csrf
    <input type="text" name="nama" placeholder="Nama Anda" required><br>
    <textarea name="pesan" rows="3" placeholder="Ucapan / Doa"></textarea><br>
    <button type="submit">Kirim</button>
</form>


    <script>
        // Countdown ke tanggal pernikahan
        const targetDate = new Date("2025-04-20T10:00:00").getTime();
        const countdown = document.getElementById("countdown");

        setInterval(() => {
            const now = new Date().getTime();
            const diff = targetDate - now;

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            countdown.innerHTML = `${days} Hari ${hours} Jam ${minutes} Menit ${seconds} Detik`;
        }, 1000);
    </script>

</body>
</html>