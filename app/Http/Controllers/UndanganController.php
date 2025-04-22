<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Undangan;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function show($slug, Request $request)
    {
        $undangan = Undangan::where('slug', $slug)->firstOrFail();
        $namaTamu = $request->query('nama');
        $rsvps = $undangan->rsvps;
    
        // Ambil musik dari relasi one-to-one
        $music = $undangan->music;
    
        // Fallback ke kolom musik lama (jika ada)
        if (!$music && $undangan->musik) {
            $music = (object) ['file' => $undangan->musik];
        }
    
        // Fallback ke musik default sistem
        if (!$music) {
            $music = (object) ['file' => 'musik/musik_1.mp3'];
        }
    
        return view("undangan.{$slug}.index", compact('undangan', 'namaTamu', 'rsvps', 'music'));
    }    

    public function store(Request $request)
    {
        $undangan = new Undangan();
        $undangan->slug = $request->slug;
        $undangan->nama_pria = $request->nama_pria;
        $undangan->nama_wanita = $request->nama_wanita;
        $undangan->kata_pengantar = $request->kata_pengantar;
        $undangan->tanggal_acara = $request->tanggal_acara;
        $undangan->lokasi = $request->lokasi;
        $undangan->link_maps = $request->link_maps;

        // Cek apakah memilih dari select
        if ($request->filled('musik_select')) {
            $undangan->musik = $request->musik_select;
        } 
        // Kalau tidak, cek apakah upload file baru
        elseif ($request->hasFile('musik_upload')) {
            $file = $request->file('musik_upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/music', $filename);
            $undangan->musik = 'storage/music/' . $filename;

            // Simpan juga ke tabel musics (opsional)
            \App\Models\Music::create([
                'title' => $file->getClientOriginalName(),
                'file_path' => 'storage/music/' . $filename,
            ]);
        }

        $undangan->save();

        return redirect()->route('undangan.index')->with('success', 'Undangan berhasil dibuat!');
    }

    public function create()
    {
        $musics = Music::all(); // Ambil semua data musik dari tabel musics
        return view('admin.create', compact('musics'));
    }
}
 