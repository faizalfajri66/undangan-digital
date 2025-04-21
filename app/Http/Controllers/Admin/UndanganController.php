<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:undangans',
            'nama_pria' => 'required',
            'nama_wanita' => 'required',
            'tanggal_acara' => 'required|date',
            'lokasi' => 'required',
            'foto_pria' => 'nullable|image|mimes:jpg,jpeg,png',
            'foto_wanita' => 'nullable|image|mimes:jpg,jpeg,png',
            'musik' => 'nullable|mimes:mp3',
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
    
        \App\Models\Undangan::create($data);
    
        return redirect()->route('undangan.index')->with('success', 'Undangan berhasil dibuat!');
    }    
}
