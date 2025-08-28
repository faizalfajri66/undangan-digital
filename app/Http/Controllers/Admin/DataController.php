<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Undangan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Tampilkan daftar undangan
     */
    public function index()
    {
        $undangans = Undangan::latest()->get(); // urut dari terbaru
        return view('admin.index', compact('undangans'));
    }

    /**
     * Simpan undangan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug'              => 'required|unique:undangans',
            'template'          => 'required',
            'nama_pria'         => 'required',
            'nama_wanita'       => 'required',
            'ayah_pria'         => 'required',
            'ibu_pria'          => 'required',
            'ayah_wanita'       => 'required',
            'ibu_wanita'        => 'required',
            'instagram_pria'    => 'required',
            'instagram_wanita'  => 'required',
            'tanggal_acara'     => 'required|date',
            'rekening_nama'     => 'required',
            'rekening_nomor'    => 'required',
            'rekening_bank'     => 'required',
            'lokasi'            => 'required',
            'foto_pria'         => 'nullable|image|mimes:jpg,jpeg,png',
            'foto_wanita'       => 'nullable|image|mimes:jpg,jpeg,png',
            'musik'             => 'nullable|mimes:mp3',
        ]);

        $data = $request->except(['foto_pria', 'foto_wanita', 'musik']);

        if ($request->hasFile('foto_pria')) {
            $data['foto_pria'] = $request->file('foto_pria')->store('foto_pria', 'public');
        }

        if ($request->hasFile('foto_wanita')) {
            $data['foto_wanita'] = $request->file('foto_wanita')->store('foto_wanita', 'public');
        }

        if ($request->hasFile('musik')) {
            $data['musik'] = $request->file('musik')->store('musik', 'public');
        }

        Undangan::create($data);

        // Redirect ke index agar data terbaru ditampilkan
        return redirect()->route('admin.index')->with('success', 'Undangan berhasil dibuat!');
    }

    /**
     * Hapus undangan
     */
    public function destroy(Undangan $undangan)
    {
        $undangan->delete();
        return redirect()->route('admin.index')->with('success', 'Undangan berhasil dihapus!');
    }
}
