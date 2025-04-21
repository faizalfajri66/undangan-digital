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
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'pesan' => 'nullable|string',
        ]);

        // Cari undangan berdasarkan slug
        $undangan = Undangan::where('slug', $slug)->first();

        if ($undangan) {
            // Menyimpan data RSVP dengan undangan_id
            Rsvp::create([
                'nama' => $request->nama,
                'pesan' => $request->pesan,
                'undangan_id' => $undangan->id,
            ]);

            return redirect()->route('undangan.show', ['slug' => $slug])
                             ->with('success', 'Terima kasih atas kehadirannya!');
        }

        return redirect()->route('home')->with('error', 'Undangan tidak ditemukan');
    }
}
