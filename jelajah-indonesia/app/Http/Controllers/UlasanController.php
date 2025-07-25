<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_wisata' => 'required|exists:wisatas,id',
            'komentar' => 'required|string',
            'peringkat' => 'required|integer|min:1|max:5',
        ]);

        Ulasan::create([
            'id_pengguna' => auth()->id(),
            'id_wisata' => $request->id_wisata,
            'tanggal_ulasan' => now(),
            'komentar' => $request->komentar,
            'peringkat' => $request->peringkat,
        ]);

        return back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
