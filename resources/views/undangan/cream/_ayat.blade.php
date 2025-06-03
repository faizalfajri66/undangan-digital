@if($undangan->quote)
    <div class="relative bg-[#fdf1e6] py-24 px-6 text-center overflow-hidden">
        <!-- Ornamen blur artistik -->
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-[#fcd5ce] rounded-full blur-2xl opacity-30"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#faedcd] rounded-full blur-2xl opacity-30"></div>

        <!-- Box Ayat -->
        <blockquote class="text-xl md:text-2xl italic text-[#5c4033] border-l-4 border-[#e3b778] pl-6 pr-4 py-6 mx-auto max-w-3xl bg-white/80 backdrop-blur-lg rounded-xl shadow-md leading-relaxed tracking-wide">
            “{{ $undangan->quote }}”
        </blockquote>

        @if($undangan->sumber_quote)
            <p class="text-sm text-[#7c5f44] mt-4 italic">— {{ $undangan->sumber_quote }}</p>
        @endif

        <!-- Spacer tambahan -->
        <div class="mt-24"></div>
    </div>
@else
    <div class="bg-[#fdf1e6] py-20 px-6 text-center">
        <p class="text-lg text-[#9c7a6e] italic">Ayat suci akan segera ditambahkan 🙏</p>
    </div>
@endif
