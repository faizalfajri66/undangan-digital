@if($undangan->quote)
    <div class="text-center my-20 px-6">
        <blockquote class="text-xl md:text-2xl italic text-gray-800 border-l-4 border-pink-500 pl-6 py-6 mx-auto max-w-3xl bg-white/70 backdrop-blur-sm rounded-xl shadow-sm">
            “{{ $undangan->quote }}”
        </blockquote>
        @if($undangan->sumber_quote)
            <p class="text-sm text-gray-600 mt-4 italic">— {{ $undangan->sumber_quote }}</p>
        @endif
    </div>
@else
    <p class="text-center text-lg text-gray-500 mt-10 italic">Ayat suci akan segera ditambahkan 🙏</p>
@endif
