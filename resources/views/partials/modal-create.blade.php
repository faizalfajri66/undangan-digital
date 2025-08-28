<div 
    x-show="openCreate" 
    x-cloak 
    x-transition:enter="transition ease-out duration-200" 
    x-transition:enter-start="opacity-0 scale-90" 
    x-transition:enter-end="opacity-100 scale-100" 
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
>
    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl overflow-y-auto max-h-[90vh]" x-data="{ tab: 1 }">
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <h2 class="text-xl font-bold">➕ Tambah Undangan</h2>
            <button @click="openCreate = false" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <!-- Tabs -->
        <div class="border-b flex">
            <button @click="tab = 1" :class="tab===1 ? 'bg-pink-100 font-bold' : ''" class="flex-1 py-2 text-center">Informasi Dasar</button>
            <button @click="tab = 2" :class="tab===2 ? 'bg-pink-100 font-bold' : ''" class="flex-1 py-2 text-center">Mempelai Pria</button>
            <button @click="tab = 3" :class="tab===3 ? 'bg-pink-100 font-bold' : ''" class="flex-1 py-2 text-center">Mempelai Wanita</button>
            <button @click="tab = 4" :class="tab===4 ? 'bg-pink-100 font-bold' : ''" class="flex-1 py-2 text-center">Acara & Lainnya</button>
        </div>

        <form action="{{ route('undangan.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Tab 1 -->
            <div x-show="tab === 1" class="space-y-4">
                <div>
                    <label class="font-semibold">Template</label>
                    <input type="text" name="template" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Slug</label>
                    <input type="text" name="slug" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Cover</label>
                    <input type="file" name="cover" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <!-- Tab 2 -->
            <div x-show="tab === 2" class="space-y-4">
                <div>
                    <label class="font-semibold">Nama Pria</label>
                    <input type="text" name="nama_pria" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Foto Pria</label>
                    <input type="file" name="foto_pria" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Ayah Pria</label>
                    <input type="text" name="ayah_pria" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Ibu Pria</label>
                    <input type="text" name="ibu_pria" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Instagram Pria</label>
                    <input type="text" name="instagram_pria" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <!-- Tab 3 -->
            <div x-show="tab === 3" class="space-y-4">
                <div>
                    <label class="font-semibold">Nama Wanita</label>
                    <input type="text" name="nama_wanita" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Foto Wanita</label>
                    <input type="file" name="foto_wanita" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Ayah Wanita</label>
                    <input type="text" name="ayah_wanita" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Ibu Wanita</label>
                    <input type="text" name="ibu_wanita" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Instagram Wanita</label>
                    <input type="text" name="instagram_wanita" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <!-- Tab 4 -->
            <div x-show="tab === 4" class="space-y-4">
                <div>
                    <label class="font-semibold">Quotes</label>
                    <textarea name="quotes" class="w-full border rounded px-3 py-2"></textarea>
                </div>
                <div>
                    <label class="font-semibold">Lokasi Acara</label>
                    <input type="text" name="lokasi" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Tanggal Acara</label>
                    <input type="date" name="tanggal_acara" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Jenis Rekening</label>
                    <input type="text" name="rekening_bank" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Nama Rekening</label>
                    <input type="text" name="rekening_nama" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Nomor Rekening</label>
                    <input type="text" name="rekening_nomor" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="font-semibold">Musik</label>
                    <input type="text" name="musik" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-between pt-4 border-t">
                <button type="button" @click="tab = tab > 1 ? tab - 1 : tab" class="bg-gray-300 px-4 py-2 rounded">⬅ Sebelumnya</button>
                <div class="flex gap-2">
                    <button type="button" @click="tab = tab < 4 ? tab + 1 : tab" class="bg-gray-300 px-4 py-2 rounded">Berikutnya ➡</button>
                    <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
