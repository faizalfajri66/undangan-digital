<div 
    x-show="openDetail" 
    x-transition:enter="transition ease-out duration-200" 
    x-transition:enter-start="opacity-0 scale-90" 
    x-transition:enter-end="opacity-100 scale-100" 
    x-transition:leave="transition ease-in duration-150" 
    x-transition:leave-start="opacity-100 scale-100" 
    x-transition:leave-end="opacity-0 scale-90" 
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
>
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl overflow-y-auto max-h-[90vh]">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <h2 class="text-xl font-bold">👁 Detail Undangan</h2>
            <button @click="openDetail = false" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="font-semibold">Template</label>
                    <p class="text-gray-700" x-text="selectedUndangan.template"></p>
                </div>
                <div>
                    <label class="font-semibold">Slug</label>
                    <p class="text-gray-700" x-text="selectedUndangan.slug"></p>
                </div>
                <div>
                    <label class="font-semibold">Nama Pria</label>
                    <p class="text-gray-700" x-text="selectedUndangan.nama_pria"></p>
                </div>
                <div>
                    <label class="font-semibold">Nama Wanita</label>
                    <p class="text-gray-700" x-text="selectedUndangan.nama_wanita"></p>
                </div>
                <div>
                    <label class="font-semibold">Ayah Pria</label>
                    <p class="text-gray-700" x-text="selectedUndangan.ayah_pria"></p>
                </div>
                <div>
                    <label class="font-semibold">Ibu Pria</label>
                    <p class="text-gray-700" x-text="selectedUndangan.ibu_pria"></p>
                </div>
                <div>
                    <label class="font-semibold">Ayah Wanita</label>
                    <p class="text-gray-700" x-text="selectedUndangan.ayah_wanita"></p>
                </div>
                <div>
                    <label class="font-semibold">Ibu Wanita</label>
                    <p class="text-gray-700" x-text="selectedUndangan.ibu_wanita"></p>
                </div>
                <div>
                    <label class="font-semibold">Instagram Pria</label>
                    <p class="text-gray-700" x-text="selectedUndangan.instagram_pria"></p>
                </div>
                <div>
                    <label class="font-semibold">Instagram Wanita</label>
                    <p class="text-gray-700" x-text="selectedUndangan.instagram_wanita"></p>
                </div>
                <div class="col-span-2">
                    <label class="font-semibold">Quotes</label>
                    <p class="text-gray-700" x-text="selectedUndangan.quotes"></p>
                </div>
                <div class="col-span-2">
                    <label class="font-semibold">Lokasi Acara</label>
                    <p class="text-gray-700" x-text="selectedUndangan.lokasi"></p>
                </div>
                <div>
                    <label class="font-semibold">Tanggal Acara</label>
                    <p class="text-gray-700" x-text="selectedUndangan.tanggal_acara"></p>
                </div>
                <div>
                    <label class="font-semibold">Musik</label>
                    <p class="text-gray-700" x-text="selectedUndangan.musik"></p>
                </div>
                <div>
                    <label class="font-semibold">Jenis Rekening</label>
                    <p class="text-gray-700" x-text="selectedUndangan.rekening_bank"></p>
                </div>
                <div>
                    <label class="font-semibold">Nama Rekening</label>
                    <p class="text-gray-700" x-text="selectedUndangan.rekening_nama"></p>
                </div>
                <div>
                    <label class="font-semibold">Nomor Rekening</label>
                    <p class="text-gray-700" x-text="selectedUndangan.rekening_nomor"></p>
                </div>
            </div>

            <!-- Foto -->
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="font-semibold">Foto Pria</label>
                    <img :src="selectedUndangan.foto_pria" alt="Foto Pria" class="w-full rounded-lg shadow">
                </div>
                <div>
                    <label class="font-semibold">Foto Wanita</label>
                    <img :src="selectedUndangan.foto_wanita" alt="Foto Wanita" class="w-full rounded-lg shadow">
                </div>
                <div class="col-span-2">
                    <label class="font-semibold">Cover</label>
                    <img :src="selectedUndangan.cover" alt="Cover" class="w-full rounded-lg shadow">
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="px-6 py-4 border-t flex justify-end">
            <button @click="openDetail = false" class="bg-gray-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
</div>
