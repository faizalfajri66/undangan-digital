<div class="text-center py-20 px-6 bg-pink-50">
    <h2 class="text-2xl md:text-3xl font-bold text-pink-700 mb-8 tracking-wide">Cerita Cinta Kami</h2>

    @if($undangan->loveStories->count())
        <div class="max-w-3xl mx-auto">
            @foreach($undangan->loveStories->sortBy('tanggal') as $story)
                <div class="mb-12 bg-white border border-pink-200 shadow-md rounded-xl p-6 transition hover:shadow-lg">
                    <h3 class="text-xl md:text-2xl font-semibold text-pink-600">{{ $story->judul }}</h3>
                    <p class="text-sm text-pink-400 mt-1 italic">{{ \Carbon\Carbon::parse($story->tanggal)->format('d F Y') }}</p>
                    <p class="text-base md:text-lg text-gray-700 mt-4 leading-relaxed">{{ $story->cerita }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-pink-500 text-lg mt-4">Cerita cinta akan segera ditambahkan ❤️</p>
    @endif
</div>
