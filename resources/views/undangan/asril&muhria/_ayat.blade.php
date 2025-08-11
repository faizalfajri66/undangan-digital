@if($undangan->quote)
    <div class="text-center px-6 py-10 bg-gradient-to-r from-[#1a1a1a] via-[#231f20] to-[#1a1a1a]">
        <blockquote class="text-xl md:text-2xl italic text-gray-300 border-l-4 border-white pl-6 py-6 mx-auto max-w-3xl">
            “{{ $undangan->quote }}”
        </blockquote>
        @if($undangan->sumber_quote)
            <p class="text-sm text-gray-400 mt-2 italic">— {{ $undangan->sumber_quote }}</p>
        @endif
    </div>
@else
    <div class="text-center px-6 py-10 bg-gradient-to-r from-[#1a1a1a] via-[#231f20] to-[#1a1a1a]">
        <p class="text-lg text-gray-400 italic">Ayat suci akan segera ditambahkan 🙏</p>
    </div>
@endif
