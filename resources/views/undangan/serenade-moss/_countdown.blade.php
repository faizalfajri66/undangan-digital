<div class="relative bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 text-white py-10 px-4 md:px-8 text-center rounded-b-lg shadow-lg mt-0 overflow-hidden">
    <!-- Judul -->
    <h3 class="text-xl md:text-2xl font-semibold tracking-wider mb-4 animate__animated animate__fadeIn animate__delay-2s">
        Menuju Hari Bahagia
    </h3>

    <!-- Gambar -->
    <div class="flex justify-center mb-6 animate__animated animate__zoomIn animate__delay-1s">
        <img src="{{ asset('assets/count_down.png') }}" alt="Count_Down" class="w-32 h-32 md:w-40 md:h-40 rounded-full shadow-lg ring-4 ring-white object-cover" />
    </div>

    <!-- Tanggal Acara -->
    <p class="text-2xl font-bold mb-4 animate__animated animate__fadeIn animate__delay-1s">
        {{ $undangan->tanggal_acara->format('l, j F Y') }}
    </p>

    <!-- Countdown Timer -->
    <div class="grid grid-cols-4 gap-2 justify-center items-center text-center max-w-md mx-auto animate__animated animate__fadeIn animate__delay-3s">
        <div class="flex flex-col items-center">
            <span id="days" class="text-3xl md:text-5xl font-bold">00</span>
            <span class="text-sm md:text-base mt-1 bg-white text-black px-3 py-1 rounded-full shadow">Hari</span>
        </div>
        <div class="flex flex-col items-center">
            <span id="hours" class="text-3xl md:text-5xl font-bold">00</span>
            <span class="text-sm md:text-base mt-1 bg-white text-black px-3 py-1 rounded-full shadow">Jam</span>
        </div>
        <div class="flex flex-col items-center">
            <span id="minutes" class="text-3xl md:text-5xl font-bold">00</span>
            <span class="text-sm md:text-base mt-1 bg-white text-black px-3 py-1 rounded-full shadow">Menit</span>
        </div>
        <div class="flex flex-col items-center">
            <span id="seconds" class="text-3xl md:text-5xl font-bold">00</span>
            <span class="text-sm md:text-base mt-1 bg-white text-black px-3 py-1 rounded-full shadow">Detik</span>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const targetDate = new Date("{{ $undangan->tanggal_acara->format('Y-m-d H:i:s') }}").getTime();
        const daysEl = document.getElementById("days");
        const hoursEl = document.getElementById("hours");
        const minutesEl = document.getElementById("minutes");
        const secondsEl = document.getElementById("seconds");

        function updateCountdown() {
            const now = new Date().getTime();
            const diff = targetDate - now;

            if (diff <= 0) {
                daysEl.innerText = "00";
                hoursEl.innerText = "00";
                minutesEl.innerText = "00";
                secondsEl.innerText = "00";
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            daysEl.innerText = days.toString().padStart(2, '0');
            hoursEl.innerText = hours.toString().padStart(2, '0');
            minutesEl.innerText = minutes.toString().padStart(2, '0');
            secondsEl.innerText = seconds.toString().padStart(2, '0');
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
</script>
