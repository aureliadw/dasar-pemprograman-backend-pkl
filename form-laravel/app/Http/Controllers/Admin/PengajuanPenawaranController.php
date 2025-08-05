<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanPenawaran;

class PengajuanPenawaranController extends Controller
{
    public function index()
    {
        $pengajuans = PengajuanPenawaran::all();
        return view('admin.pengajuan-penawaran.index', compact('pengajuans'));
    }

    public function create()
    {
        return view('admin.pengajuan-penawaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_penawaran' => 'required|numeric',
            'pesan' => 'nullable|string',
            'durasi_pengerjaan' => 'required|numeric',
        ]);

        PengajuanPenawaran::create([
            'jumlah_penawaran' => $request->jumlah_penawaran,
            'pesan' => $request->pesan,
            'durasi_pengerjaan' => $request->durasi_pengerjaan,
        ]);

        return redirect()->route('admin.pengajuan-penawaran.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengajuan = PengajuanPenawaran::findOrFail($id);
        return view('admin.pengajuan-penawaran.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_penawaran' => 'required|numeric',
            'pesan' => 'nullable|string',
            'durasi_pengerjaan' => 'required|numeric',
        ]);

        $pengajuan = PengajuanPenawaran::findOrFail($id);
        $pengajuan->update([
            'jumlah_penawaran' => $request->jumlah_penawaran,
            'pesan' => $request->pesan,
            'durasi_pengerjaan' => $request->durasi_pengerjaan,
        ]);

        return redirect()->route('admin.pengajuan-penawaran.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanPenawaran::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('admin.pengajuan-penawaran.index')->with('success', 'Data berhasil dihapus!');
    }
}
