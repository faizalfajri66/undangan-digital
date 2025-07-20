@if($undangan->quote)
    <div class="relative w-full min-h-screen bg-[#ffe4ec] py-24 px-6 text-center overflow-hidden">

        <!-- Ornamen blur artistik nuansa pink -->
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-[#ffc5d9] rounded-full blur-3xl opacity-40 z-0"></div>
        <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-[#ffd9ec] rounded-full blur-3xl opacity-40 z-0"></div>

        <!-- Gambar Background PNG berlubang -->
        <div class="relative w-full max-w-3xl mx-auto z-10">
            <!-- Gambar pengantin -->
            <img src="{{ asset('assets/eva-sadhy_2.jpg') }}" alt="Foto Mempelai" class="w-full h-auto object-cover z-0 rounded-3xl">

            <!-- Gambar background PNG berlubang -->
            <img src="{{ asset('assets/eva-sadhy_2.jpg') }}" alt="Ornamen Lubang" class="absolute inset-0 w-full h-full object-contain z-10 pointer-events-none rounded-3xl">
        </div>

        <!-- Quote di bawah gambar -->
        <blockquote class="mt-12 text-xl md:text-2xl italic text-[#a14d66] border-l-4 border-[#f7a1c4] pl-6 pr-4 py-6 mx-auto max-w-3xl bg-white/80 backdrop-blur-lg rounded-xl shadow-md leading-relaxed tracking-wide z-20 relative">
            “{{ $undangan->quote }}”
        </blockquote>

        @if($undangan->sumber_quote)
            <p class="text-sm text-[#b35b7d] mt-4 italic z-20 relative">— {{ $undangan->sumber_quote }}</p>
        @endif

    </div>
@else
    <div class="w-full min-h-screen bg-[#ffe4ec] py-20 px-6 text-center">
        <p class="text-lg text-[#cc6b8e] italic">Ayat suci akan segera ditambahkan 🙏</p>
    </div>
@endif
