<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostingProyek;

class PostingProyekController extends Controller
{
    public function index() {
        $data = PostingProyek::all();
        return view('admin.posting-proyek.index', compact('data'));
    }

    public function create() {
        return view('admin.posting-proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'detail_proyek' => 'required|string',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'anggaran' => 'required|numeric',
            'batas_penawaran' => 'required|date',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'lokasi_pengerjaan' => 'required|in:remote,onsite',
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('lampiran', $filename, 'public');
            $data['lampiran'] = $filename;
        }

        PostingProyek::create($data);
 
        return redirect()->route('admin.posting-proyek.index')->with('success', 'Proyek berhasil diposting!');
    }

    public function edit($id) {
        $data = PostingProyek::findOrFail($id);
        return view('admin.posting-proyek.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'detail_proyek' => 'required|string',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'anggaran' => 'required|numeric',
            'batas_penawaran' => 'required|date',
            'lokasi_pengerjaan' => 'required|in:remote,onsite',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $proyek = PostingProyek::findOrFail($id);

        $data = $request->except('_token');

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('lampiran', $filename, 'public');
            $data['lampiran'] = $filename;
        }

        $proyek->update($data);

        return redirect()->route('admin.posting-proyek.index')->with('success', 'Proyek berhasil diperbarui');
    }

    public function destroy($id) {
        $data = PostingProyek::findOrFail($id);
        $data->delete();

        return back()->with('success', 'Proyek berhasil dihapus');
    }
}
