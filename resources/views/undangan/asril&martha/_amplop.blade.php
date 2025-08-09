<div class="py-20 px-4 bg-[#1a1a1a] text-center text-white">
    <h2 class="text-3xl font-semibold text-[#d8a679] mb-6"
        style="font-family: 'Great Vibes', cursive;">Wedding Gift</h2>

    <p class="max-w-xl mx-auto text-gray-300 text-lg md:text-xl mb-10 leading-relaxed">
        Terima kasih telah menambah semangat kegembiraan pernikahan kami dengan kehadiran dan hadiah indah Anda.
    </p>

    @if(!empty($undangan->rekening_nama) && !empty($undangan->rekening_nomor))
        <div class="max-w-md mx-auto bg-[#2a2a2a] rounded-2xl shadow-lg overflow-hidden p-6 md:p-8 border border-[#444] relative">
            <!-- Simulasi tampilan kartu -->
            <div class="text-left space-y-4">
                <div class="text-sm text-gray-400">Nama Pemilik</div>
                <div class="text-lg md:text-xl font-bold text-white">{{ $undangan->rekening_nama }}</div>

                <div class="text-sm text-gray-400">Nomor Rekening / Nomor E-Wallet</div>
                <div class="text-xl md:text-2xl font-mono tracking-wider text-[#d8a679]">
                    {{ $undangan->rekening_nomor }}
                </div>

                @if(!empty($undangan->rekening_bank))
                    <div class="text-sm text-gray-400">Bank / Layanan</div>
                    <div class="text-base md:text-lg font-semibold text-gray-200">
                        {{ $undangan->rekening_bank }}
                    </div>
                @endif
            </div>

            <!-- Hiasan chip -->
            <div class="absolute top-4 right-4 w-10 h-7 bg-yellow-500 rounded-sm"></div>
        </div>
    @else
        <p class="text-gray-400 text-lg italic mt-6">Amplop digital akan segera ditambahkan 🙏</p>
    @endif
</div>
