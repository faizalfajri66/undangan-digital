<div class="text-center py-20 px-6 bg-gradient-to-b from-[#fffaf0] to-[#fef6e4] text-gray-800">
    <h2 class="text-3xl md:text-4xl font-bold text-[#aa3e1d] mb-10 tracking-wide">
        Konfirmasi Kehadiran
    </h2>

    @if(session('success'))
        <p class="text-green-700 font-medium mb-6 bg-green-100 px-6 py-3 rounded-xl inline-block shadow-md">
            {{ session('success') }}
        </p>
    @elseif(session('error'))
        <p class="text-red-700 font-medium mb-6 bg-red-100 px-6 py-3 rounded-xl inline-block shadow-md">
            {{ session('error') }}
        </p>
    @endif

    <!-- Form Konfirmasi -->
    <form method="POST" action="{{ route('rsvp.store', $undangan->slug) }}"
        class="max-w-xl mx-auto bg-white/70 backdrop-blur-md p-8 rounded-2xl shadow-lg transition space-y-6 border border-[#f3e5d8]">
        @csrf

        <input type="text" name="nama" placeholder="Nama Anda" required
            class="w-full p-4 border border-[#e0cfc0] rounded-lg focus:ring-2 focus:ring-[#aa3e1d] text-base md:text-lg placeholder-gray-500 transition"/>

        <textarea name="pesan" rows="4" placeholder="Ucapan atau Doa"
            class="w-full p-4 border border-[#e0cfc0] rounded-lg focus:ring-2 focus:ring-[#aa3e1d] text-base md:text-lg placeholder-gray-500 transition"></textarea>

        <button type="submit"
            class="w-full py-3 bg-[#aa3e1d] hover:bg-[#c44d2c] text-white font-semibold rounded-lg transition duration-300 text-lg shadow-sm">
            Kirim Ucapan
        </button>
    </form>

    <!-- Komentar Masuk -->
    <div class="mt-16 max-w-2xl mx-auto text-left">
        <h3 class="text-2xl md:text-3xl font-bold text-[#3b3b3b] mb-6">Ucapan & Doa</h3>

        @if($rsvps->isEmpty())
            <p class="text-gray-500 italic text-center">Belum ada konfirmasi kehadiran.</p>
        @else
            <div class="space-y-6 border-t border-gray-200 pt-6">
                @foreach($rsvps as $rsvp)
                    <div class="border-b border-gray-100 pb-4">
                        <span class="font-semibold text-[#aa3e1d] text-lg">{{ $rsvp->nama }}</span>
                        @if($rsvp->pesan)
                            <p class="text-gray-700 mt-2 text-base leading-relaxed">{{ $rsvp->pesan }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
