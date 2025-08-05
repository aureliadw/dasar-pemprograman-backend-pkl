<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        return view('admin.pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ]);

        Pembayaran::create([
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'setuju_syarat' => $request->has('setuju_syarat') ? 1 : 0,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'setuju_syarat' => $request->has('setuju_syarat') ? 1 : 0,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data berhasil dihapus!');
    }
}
