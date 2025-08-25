<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanPenawaran;

class PengajuanPenawaranController extends Controller
{
      public function index(Request $request)
    {
        $search = $request->get('search'); // keyword search
        $sort = $request->get('sort', 'desc'); // default descending

        // Query builder
        $query = PengajuanPenawaran::query();

        // Jika ada keyword search
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('jumlah_penawaran', 'like', "%{$search}%")
                  ->orWhere('pesan', 'like', "%{$search}%");
            });
        }

        // Urutkan berdasarkan id
        $pengajuans = $query->orderBy('id', $sort)
                            ->paginate(10) // 10 data per halaman
                            ->withQueryString(); // supaya query string tetap ada saat pagination

        return view('admin.pengajuan-penawaran.index', compact('pengajuans', 'sort'));
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
