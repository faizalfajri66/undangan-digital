<div class="text-center my-20 px-4">
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-8 tracking-wide">Galeri Kami</h2>

    @if($undangan->galeris->count())
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
            @foreach($undangan->galeris as $foto)
                <div class="overflow-hidden rounded-xl shadow-md hover:scale-105 transform transition duration-300 ease-in-out">
                    <img 
                        src="{{ asset('storage/galeri/' . $foto->gambar) }}" 
                        alt="Galeri" 
                        class="w-full h-48 object-cover"
                    >
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 text-lg mt-4">Belum ada foto galeri.</p>
    @endif
</div>
