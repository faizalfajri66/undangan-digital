<div class="py-20 px-4 bg-pink-50 text-center">
    <h2 class="text-3xl font-semibold text-pink-600 mb-6"
        style="font-family: 'Great Vibes', cursive;">Wedding Gift</h2>

    <p class="max-w-xl mx-auto text-pink-800 text-lg md:text-xl mb-10 leading-relaxed">
        Tidak ada kewajiban memberikan Hadi. Namun, jika berkenan, Bapak/Ibu/Saudara(i) dapat memberikannya melalui nomor rekening berikut:
    </p>

    @if(!empty($undangan->rekening_nama) && !empty($undangan->rekening_nomor))
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg overflow-hidden p-6 md:p-8 border border-pink-200 relative">
            <!-- Simulasi tampilan kartu -->
            <div class="text-left space-y-4">
                <div class="text-sm text-pink-400">Nama Pemilik</div>
                <div class="text-lg md:text-xl font-bold text-pink-900">{{ $undangan->rekening_nama }}</div>

                <div class="text-sm text-pink-400">Nomor Rekening / Nomor E-Wallet</div>
                <div class="text-xl md:text-2xl font-mono tracking-wider text-pink-600">
                    {{ $undangan->rekening_nomor }}
                </div>

                @if(!empty($undangan->rekening_bank))
                    <div class="text-sm text-pink-400">Bank / Layanan</div>
                    <div class="text-base md:text-lg font-semibold text-pink-800">
                        {{ $undangan->rekening_bank }}
                    </div>
                @endif
            </div>

            <!-- Hiasan chip -->
            <div class="absolute top-4 right-4 w-10 h-7 bg-pink-300 rounded-sm"></div>
        </div>
    @else
        <p class="text-pink-600 text-lg italic mt-6">Amplop digital akan segera ditambahkan 🙏</p>
    @endif
</div>
