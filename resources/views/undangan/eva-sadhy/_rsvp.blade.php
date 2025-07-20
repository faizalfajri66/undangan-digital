<div class="text-center py-20 px-6 bg-gradient-to-b from-[#fff0f5] to-[#ffe4ec] text-gray-800">
    <h2 class="text-3xl md:text-4xl font-bold text-[#d63384] mb-10 tracking-wide">
        Konfirmasi Kehadiran
    </h2>

    <!-- Form -->
    <form id="formUcapan" method="POST" action="{{ route('rsvp.store', $undangan->slug) }}"
        class="max-w-xl mx-auto bg-white/70 backdrop-blur-md p-8 rounded-2xl shadow-lg transition space-y-6 border border-[#fcd9e1]">
        @csrf

        <input type="text" name="nama" placeholder="Nama Anda" required
            class="w-full p-4 border border-[#f4c2cf] rounded-lg focus:ring-2 focus:ring-[#d63384] text-base md:text-lg placeholder-gray-500 transition"/>

        <textarea name="pesan" rows="4" placeholder="Ucapan atau Doa"
            class="w-full p-4 border border-[#f4c2cf] rounded-lg focus:ring-2 focus:ring-[#d63384] text-base md:text-lg placeholder-gray-500 transition"></textarea>

        <button type="submit"
            class="w-full py-3 bg-[#d63384] hover:bg-[#e85a9e] text-white font-semibold rounded-lg transition duration-300 text-lg shadow-sm">
            Kirim Ucapan
        </button>

        <!-- Loading indikator -->
        <p id="loading-indicator" class="text-sm text-pink-600 mt-2 hidden">⏳ Mengirim ucapan...</p>
    </form>

    <!-- Komentar Masuk -->
    <div class="mt-16 max-w-2xl mx-auto text-left">
        <h3 class="text-2xl md:text-3xl font-bold text-[#d63384] mb-6">Ucapan & Doa</h3>

        <div id="ucapan-container" class="space-y-6 border-t border-pink-200 pt-6">
            @forelse($rsvps as $rsvp)
                <div class="ucapan-item border-b border-pink-100 pb-4 opacity-0 transition-opacity duration-500">
                    <span class="font-semibold text-[#d63384] text-lg">{{ $rsvp->nama }}</span>
                    @if($rsvp->pesan)
                        <p class="text-gray-700 mt-2 text-base leading-relaxed">{{ $rsvp->pesan }}</p>
                    @endif
                </div>
            @empty
                <p class="text-gray-500 italic text-center">Belum ada konfirmasi kehadiran.</p>
            @endforelse
        </div>

        <!-- Tombol Navigasi -->
        <div class="flex justify-center gap-4 mt-8">
            <button id="prevBtn" class="px-4 py-2 bg-pink-300 hover:bg-pink-400 text-white font-semibold rounded-lg disabled:opacity-50">Previous</button>
            <button id="nextBtn" class="px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white font-semibold rounded-lg disabled:opacity-50">Next</button>
        </div>

        <!-- Nomor Halaman -->
        <div id="pageIndicator" class="text-center mt-4 text-pink-600 font-medium text-lg"></div>
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
