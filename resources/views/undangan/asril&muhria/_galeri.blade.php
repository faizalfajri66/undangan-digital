<div class="text-center my-20 px-4">
    <h2 class="text-3xl md:text-4xl font-bold text-yellow-400 mb-10 tracking-wide font-serif">Galeri Kami</h2>

    @if($undangan->galeris->count())
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 max-w-6xl mx-auto">
            @foreach($undangan->galeris as $foto)
                <div class="bg-pink-50 p-2 rounded-2xl shadow-lg hover:scale-105 transform transition duration-300 ease-in-out border border-pink-200">
                    <img 
                        src="{{ asset('assets/' . $foto->gambar) }}" 
                        alt="Galeri" 
                        class="w-full h-48 object-cover rounded-xl"
                    >
                </div>
            @endforeach
        </div>
    @else
        <p class="text-yellow-400 text-lg mt-6 font-medium">Belum ada foto galeri.</p>
    @endif
</div>
