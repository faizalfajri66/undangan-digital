<div class="text-center py-20 px-6 bg-[#fdfaf6] font-serif text-gray-800">
    <h2 class="text-3xl md:text-4xl font-bold text-[#b03a2e] mb-10 tracking-wide">
        Komentar
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
        class="max-w-xl mx-auto bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-lg transition space-y-6 border border-[#f2e9e1]">
        @csrf

        <input type="text" name="nama" placeholder="Nama Anda" required
            class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b03a2e] text-base md:text-lg placeholder-gray-500 transition"/>

        <textarea name="pesan" rows="4" placeholder="Ucapan atau Doa"
            class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b03a2e] text-base md:text-lg placeholder-gray-500 transition"></textarea>

        <button type="submit"
            class="w-full py-3 bg-[#b03a2e] hover:bg-[#cb4335] text-white font-semibold rounded-lg transition duration-300 text-lg">
            Kirim Ucapan
        </button>
    </form>

    <!-- Komentar Masuk -->
    <div class="mt-16 max-w-2xl mx-auto text-left">
        <h3 class="text-2xl md:text-3xl font-bold text-[#2c2c2c] mb-6">Komentar</h3>

        @if($rsvps->isEmpty())
            <p class="text-gray-500 italic text-center">Belum ada komentar.</p>
        @else
            <div class="space-y-6 border-t border-gray-200 pt-6">
                @foreach($rsvps as $rsvp)
                    <div class="border-b border-gray-100 pb-4">
                        <span class="font-semibold text-[#b03a2e] text-lg">{{ $rsvp->nama }}</span>
                        @if($rsvp->pesan)
                            <p class="text-gray-700 mt-2 text-base leading-relaxed">{{ $rsvp->pesan }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
