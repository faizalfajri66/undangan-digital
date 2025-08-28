<div x-show="openDelete" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
        <button @click="openDelete = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">✖</button>
        <h2 class="text-xl font-bold mb-4">⚠️ Konfirmasi Hapus</h2>
        <p>Apakah Anda yakin ingin menghapus undangan "<span x-text="selectedUndangan.template"></span>"?</p>
        <div class="flex justify-end mt-6 gap-2">
            <button @click="openDelete = false" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
            <form :action="'/undangan/' + selectedUndangan.id" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
            </form>
        </div>
    </div>
</div>
