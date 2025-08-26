<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view_pembayaran')->only(['index']);
        $this->middleware('permission:create_pembayaran')->only(['create', 'store']);
        $this->middleware('permission:edit_pembayaran')->only(['edit', 'update']);
        $this->middleware('permission:delete_pembayaran')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $sort = $request->get('sort', 'desc');
        $search = $request->get('search');

        $query = Pembayaran::orderBy('id', $sort);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('jumlah_pembayaran', 'like', "%{$search}%")
                  ->orWhere('metode_pembayaran', 'like', "%{$search}%");
            });
        }

        $pembayarans = $query->paginate(10);

        return view('admin.pembayaran.index', compact('pembayarans', 'sort'));
    }

    public function create()
    {
        return view('admin.pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_pembayaran' => 'required|numeric|min:100',
            'metode_pembayaran' => 'required|string',
            'setuju_syarat'     => 'accepted'
        ]);

        Pembayaran::create([
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'setuju_syarat'     => $request->has('setuju_syarat') ? 1 : 0,
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
            'jumlah_pembayaran' => 'required|numeric|min:100',
            'metode_pembayaran' => 'required|string',
            'setuju_syarat'     => 'accepted'
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'setuju_syarat'     => $request->has('setuju_syarat') ? 1 : 0,
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
