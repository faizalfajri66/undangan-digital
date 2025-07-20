<div class="py-20 px-4 bg-[#fdf6ec] text-center">
    <h2 class="text-3xl font-semibold text-[#a8744f] mb-6"
    style="font-family: 'Great Vibes', cursive;">Donation</h2>

    <p class="max-w-xl mx-auto text-gray-700 text-lg md:text-xl mb-10 leading-relaxed">
        Tidak ada kewajiban memberikan donasi. Namun, jika berkenan, Bapak/Ibu/Saudara(i) dapat memberikannya melalui nomor rekening berikut:
    </p>

    @if(!empty($undangan->rekening_nama) && !empty($undangan->rekening_nomor))
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg overflow-hidden p-6 md:p-8 border border-[#e8d5bd] relative">
            <!-- Simulasi tampilan kartu -->
            <div class="text-left space-y-4">
                <div class="text-sm text-gray-500">Nama Pemilik</div>
                <div class="text-lg md:text-xl font-bold text-gray-800">{{ $undangan->rekening_nama }}</div>

                <div class="text-sm text-gray-500">Nomor Rekening / Nomor E-Wallet</div>
                <div class="text-xl md:text-2xl font-mono tracking-wider text-[#b77c50]">
                    {{ $undangan->rekening_nomor }}
                </div>

                @if(!empty($undangan->rekening_bank))
                    <div class="text-sm text-gray-500">Bank / Layanan</div>
                    <div class="text-base md:text-lg font-semibold text-gray-700">
                        {{ $undangan->rekening_bank }}
                    </div>
                @endif
            </div>

            <!-- Hiasan chip -->
            <div class="absolute top-4 right-4 w-10 h-7 bg-yellow-300 rounded-sm"></div>
        </div>
    @else
        <p class="text-gray-600 text-lg italic mt-6">Amplop digital akan segera ditambahkan 🙏</p>
    @endif
</div>
