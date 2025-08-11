<div class="py-20 px-4 bg-[#1a1a1a] text-center text-white">
    <h2 class="text-3xl font-semibold text-[#d8a679] mb-6"
        style="font-family: 'Great Vibes', cursive;">Konformasi Kehadiran</h2>

    <!-- Form -->
    <form id="formUcapan" method="POST" action="{{ route('rsvp.store', $undangan->slug) }}"
        class="max-w-xl mx-auto bg-white/10 backdrop-blur-sm p-8 rounded-2xl shadow-lg transition space-y-6 border border-yellow-500">
        @csrf

        <input type="text" name="nama" placeholder="Nama Anda" required
            class="w-full p-4 border border-yellow-500 bg-transparent text-white rounded-lg focus:ring-2 focus:ring-yellow-400 text-base md:text-lg placeholder-gray-400 transition"/>

        <textarea name="pesan" rows="4" placeholder="Ucapan atau Doa"
            class="w-full p-4 border border-yellow-500 bg-transparent text-white rounded-lg focus:ring-2 focus:ring-yellow-400 text-base md:text-lg placeholder-gray-400 transition"></textarea>

        <button type="submit"
            class="w-full py-3 bg-yellow-500 hover:bg-yellow-600 text-black font-semibold rounded-lg transition duration-300 text-lg shadow-sm">
            Kirim Ucapan
        </button>

        <!-- Loading indikator -->
        <p id="loading-indicator" class="text-sm text-yellow-300 mt-2 hidden">⏳ Mengirim ucapan...</p>
    </form>

    <!-- Komentar Masuk -->
    <div class="mt-16 max-w-2xl mx-auto text-center">
        <h3 class="text-2xl md:text-3xl font-bold text-yellow-400 mb-6">Ucapan & Doa</h3>

        <div id="ucapan-container" class="space-y-6 border-t border-yellow-600 pt-6">
            @forelse($rsvps as $rsvp)
                <div class="ucapan-item border-b border-yellow-600 pb-4 opacity-0 transition-opacity duration-500">
                    <span class="font-semibold text-yellow-400 text-lg block">{{ $rsvp->nama }}</span>
                    @if($rsvp->pesan)
                        <p class="text-gray-300 mt-2 text-base leading-relaxed">{{ $rsvp->pesan }}</p>
                    @endif
                </div>
            @empty
                <p class="text-gray-400 italic text-center">Belum ada konfirmasi kehadiran.</p>
            @endforelse
        </div>

        <!-- Tombol Navigasi -->
        <div class="flex justify-center gap-4 mt-8">
            <button id="prevBtn" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black font-semibold rounded-lg disabled:opacity-50">Previous</button>
            <button id="nextBtn" class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-black font-semibold rounded-lg disabled:opacity-50">Next</button>
        </div>

        <!-- Nomor Halaman -->
        <div id="pageIndicator" class="text-center mt-4 text-yellow-300 font-medium text-lg"></div>
    </div>
</div>

<style>
    .fade-in { opacity: 1 !important; }
    .fade-out { opacity: 0 !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formUcapan');
    const submitBtn = form.querySelector('button[type="submit"]');
    const loadingIndicator = document.getElementById('loading-indicator');
    const container = document.getElementById('ucapan-container');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        submitBtn.disabled = true;
        loadingIndicator.classList.remove('hidden');

        const formData = new FormData(form);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData,
            });

            const result = await response.json();

            if (response.ok) {
                form.reset();

                // Tambahkan ucapan baru ke awal
                const newComment = document.createElement('div');
                newComment.className = 'ucapan-item border-b border-pink-100 pb-4 opacity-0 transition-opacity duration-500';
                newComment.innerHTML = `
                    <span class="font-semibold text-[#d63384] text-lg">${result.rsvp.nama}</span>
                    ${result.rsvp.pesan ? `<p class="text-gray-700 mt-2 text-base leading-relaxed">${result.rsvp.pesan}</p>` : ''}
                `;
                container.prepend(newComment);
                setTimeout(() => newComment.classList.add('fade-in'), 100);

                // Reset ke halaman pertama
                showPage(1);

                if (response.ok) {
                form.reset();

                Swal.fire({
                    icon: 'success',
                    title: 'Ucapan berhasil dikirim!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.reload(); // 🔁 reload setelah alert
                });
            }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal mengirim',
                    text: result.message || 'Terjadi kesalahan.'
                });
            }

        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi kesalahan jaringan',
                text: error.message || 'Silakan coba lagi.'
            });
        } finally {
            submitBtn.disabled = false;
            loadingIndicator.classList.add('hidden');
        }
    });

    // Pagination logic
    let currentPage = 1;
    const itemsPerPage = 5;

    function showPage(page) {
        const items = Array.from(document.querySelectorAll(".ucapan-item"));
        const totalPages = Math.ceil(items.length / itemsPerPage);
        const pageIndicator = document.getElementById("pageIndicator");

        items.forEach((item, index) => {
            const start = (page - 1) * itemsPerPage;
            const end = page * itemsPerPage;

            if (index >= start && index < end) {
                item.style.display = "block";
                setTimeout(() => item.classList.add("fade-in"), 100);
            } else {
                item.style.display = "none";
                item.classList.remove("fade-in");
            }
        });

        document.getElementById("prevBtn").disabled = page === 1;
        document.getElementById("nextBtn").disabled = page === totalPages;

        pageIndicator.textContent = `Halaman ${page} dari ${totalPages}`;
    }

    document.getElementById("prevBtn").addEventListener("click", () => {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById("nextBtn").addEventListener("click", () => {
        const items = document.querySelectorAll(".ucapan-item");
        const totalPages = Math.ceil(items.length / itemsPerPage);

        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    // Init halaman pertama
    showPage(currentPage);
});
</script>
