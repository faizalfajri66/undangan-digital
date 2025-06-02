<div class="text-center py-20 px-6 bg-[#fffaf0]">
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-8">Cerita Cinta Kami</h2>

    @if($undangan->loveStories->count())
        <div class="max-w-3xl mx-auto">
            @foreach($undangan->loveStories->sortBy('tanggal') as $story)
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-[#c0392b]">{{ $story->judul }}</h3>
                    <p class="text-sm text-gray-500 mt-2">{{ \Carbon\Carbon::parse($story->tanggal)->format('d F Y') }}</p>
                    <p class="text-lg text-gray-700 mt-4">{{ $story->cerita }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 text-lg mt-4">Cerita cinta akan segera ditambahkan ❤️</p>
    @endif
</div>
