<div class="text-center py-20 px-6 bg-[#f9fafb]">
    <h2 class="text-3xl md:text-4xl font-semibold text-[#0469db] mb-10 tracking-wide">Konfirmasi Kehadiran</h2>

    @if(session('success'))
        <p class="text-green-600 font-medium mb-6 bg-green-100 px-4 py-3 rounded-lg inline-block shadow-sm">
            {{ session('success') }}
        </p>
    @elseif(session('error'))
        <p class="text-red-600 font-medium mb-6 bg-red-100 px-4 py-3 rounded-lg inline-block shadow-sm">
            {{ session('error') }}
        </p>
    @endif

    <!-- Form Konfirmasi -->
    <form method="POST" action="{{ route('rsvp.store', $undangan->slug) }}" class="max-w-xl mx-auto bg-white/90 backdrop-blur-md p-6 md:p-8 rounded-xl shadow transition space-y-6">
        @csrf

        <input type="text" name="nama" placeholder="Nama Anda" required
            class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0469db] text-base md:text-lg placeholder-gray-500 transition"/>

        <textarea name="pesan" rows="4" placeholder="Ucapan atau Doa"
            class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0469db] text-base md:text-lg placeholder-gray-500 transition"></textarea>

        <button type="submit"
            class="w-full py-3 bg-[#0469db] hover:bg-[#01206e] text-white font-semibold rounded-lg transition duration-300 text-lg">
            Kirim
        </button>
    </form>

    <!-- Komentar Masuk -->
    <div class="mt-16 max-w-2xl mx-auto text-left">
        <h3 class="text-2xl md:text-3xl font-semibold text-[#333] mb-6">Ucapan & Doa</h3>

        @if($rsvps->isEmpty())
            <p class="text-gray-500 italic text-center">Belum ada konfirmasi kehadiran.</p>
        @else
            <div class="space-y-6 border-t border-gray-200 pt-6">
                @foreach($rsvps as $rsvp)
                    <div class="border-b border-gray-100 pb-4">
                        <span class="font-semibold text-[#0469db]">{{ $rsvp->nama }}</span>
                        @if($rsvp->pesan)
                            <p class="text-gray-700 mt-1 text-base">{{ $rsvp->pesan }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
