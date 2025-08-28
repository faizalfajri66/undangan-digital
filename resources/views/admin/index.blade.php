@extends('layouts.user')

@section('title', 'Admin Undangan')

@section('content')
<style>
    [x-cloak] { display: none !important; }
</style>

<div 
    x-data="{ 
        openCreate:false, 
        openEdit:false, 
        openDelete:false, 
        openDetail:false,
        selectedUndangan:null,
        closeAll() {
            this.openCreate = this.openEdit = this.openDelete = this.openDetail = false;
            this.selectedUndangan = null;
        }
    }" 
    class="max-w-7xl mx-auto my-10 px-4 sm:px-6 lg:px-8"
>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6 shadow text-sm sm:text-base">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📜 Daftar Undangan</h1>
        <button 
            @click="openCreate = true" 
            class="bg-pink-500 hover:bg-pink-600 transition text-white px-5 py-2 rounded-lg shadow text-sm sm:text-base"
        >
            ➕ Tambah Undangan
        </button>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="w-full min-w-[700px] border-collapse text-sm sm:text-base">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border p-3">#</th>
                    <th class="border p-3">Template</th>
                    <th class="border p-3">Slug</th>
                    <th class="border p-3">Nama Pria</th>
                    <th class="border p-3">Nama Wanita</th>
                    <th class="border p-3">Tanggal</th>
                    <th class="border p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($undangans as $u)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border p-3 text-center">{{ $loop->iteration }}</td>
                        <td class="border p-3">{{ $u->template }}</td>
                        <td class="border p-3">{{ $u->slug }}</td>
                        <td class="border p-3">{{ $u->nama_pria }}</td>
                        <td class="border p-3">{{ $u->nama_wanita }}</td>
                        <td class="border p-3">{{ $u->tanggal_acara }}</td>
                        <td class="border p-3 flex flex-wrap gap-2 justify-center">
                            <button 
                                @click='selectedUndangan = @json($u); openDetail = true' 
                                class="bg-gray-500 hover:bg-gray-600 transition text-white px-3 py-1 rounded shadow"
                            >👁️ Detail</button>

                            <button 
                                @click='selectedUndangan = @json($u); openEdit = true' 
                                class="bg-blue-500 hover:bg-blue-600 transition text-white px-3 py-1 rounded shadow"
                            >✏️ Edit</button>

                            <button 
                                @click='selectedUndangan = @json($u); openDelete = true' 
                                class="bg-red-500 hover:bg-red-600 transition text-white px-3 py-1 rounded shadow"
                            >🗑️ Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center p-6 text-gray-500">
                            Belum ada undangan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Components --}}
    @foreach (['Create' => 'modal-create', 'Edit' => 'modal-edit', 'Delete' => 'modal-delete', 'Detail' => 'modal-detail'] as $modalType => $modalPartial)
        <div 
            x-show="open{{ $modalType }}" 
            x-cloak 
            @click.self="closeAll()" 
            x-transition.opacity
            class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
        >
            <div class="w-full max-w-3xl sm:rounded-lg bg-white shadow-lg overflow-y-auto max-h-[90vh]">
                @include("partials.$modalPartial")
            </div>
        </div>
    @endforeach

</div>
@endsection
