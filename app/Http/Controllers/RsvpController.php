<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;
use App\Models\Undangan;

class RsvpController extends Controller
{
    public function index($slug)
    {
        // Cari undangan berdasarkan slug
        $undangan = Undangan::where('slug', $slug)->firstOrFail();

        // Ambil semua RSVP yang terkait dengan undangan
        $rsvps = Rsvp::where('undangan_id', $undangan->id)->get();

        return view('admin.rsvp.index', compact('rsvps', 'undangan'));
    }

    public function list()
    {
        // Tampilkan semua RSVP (jika perlu)
        $rsvps = Rsvp::all();
        return view('admin.rsvp.index', compact('rsvps'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'pesan' => 'nullable|max:1000',
        ]);
    
        $undangan = Undangan::where('slug', $slug)->firstOrFail();
    
        $rsvp = Rsvp::create([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
            'undangan_id' => $undangan->id,
        ]);
    
        return response()->json([
            'message' => 'Ucapan berhasil dikirim!',
            'rsvp' => $rsvp
        ]);
    }    
}    
