<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use Illuminate\Http\Request;

class UndanganPublicController extends Controller
{
    public function show($slug, $namaTamu = null)
    {
        $undangan = Undangan::where('slug', $slug)->firstOrFail();

        return view('undangan.public.show', [
            'undangan' => $undangan,
            'namaTamu' => $namaTamu
        ]);
    }
}
