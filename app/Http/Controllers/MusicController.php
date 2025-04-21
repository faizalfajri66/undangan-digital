<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Undangan;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // Tampilkan daftar undangan untuk memilih undangan saat upload musik
    public function index()
    {
        $undangans = Undangan::all(); // pakai model Undangan
        return view('music.index', compact('undangans'));
    }

    // Simpan musik baru ke storage dan database
    public function show($slug, Request $request)
    {
        $undangan = Undangan::where('slug', $slug)->firstOrFail();
        $namaTamu = $request->query('nama');
        $rsvps = $undangan->rsvps;
    
        // Ambil musik utama (dari relasi)
        $music = $undangan->musics()->latest()->first();
    
        // Jika tidak ada musik dari relasi, cek kolom `musik` di undangans
        if (!$music && $undangan->musik) {
            $music = (object) ['file' => $undangan->musik];
        }
    
        // Jika tetap tidak ada, fallback ke musik default
        if (!$music) {
            $music = (object) ['file' => 'musik/musik_1.mp3']; // pastikan file ini ada di storage/app/public/musik
        }
    
        return view("undangan.{$slug}.index", compact('undangan', 'namaTamu', 'rsvps', 'music'));
    }    
}
