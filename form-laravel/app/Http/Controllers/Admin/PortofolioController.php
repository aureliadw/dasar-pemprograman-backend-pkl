<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortofolioSatu;
use App\Models\PortofolioGambar1;
use App\Models\Lpl;
use App\Models\PortofolioItem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolio_satu = PortofolioSatu::with(['gambar', 'item', 'lpl'])->get();
        return view('admin.portofolio.index', compact('portofolio_satu'));
    }

    public function create()
    {
        return view('admin.portofolio.create');
    }

public function store(Request $request)
{
    try {
        $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'keahlian' => 'required|array',
            'warna_tema' => 'required|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'layanan' => 'nullable|array',
            'setuju' => 'accepted',
        ]);

        $portofolio_satu = PortofolioSatu::create([
            'judul_portofolio' => $request->judul,
            'ringkasan' => $request->ringkasan,
            'keahlian' => $request->keahlian,
            'warna_tema' => $request->warna_tema,
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('portofolio_gambar', 'public');
                PortofolioGambar1::create([
                    'portofolio_id' => $portofolio_satu->id,
                    'file_path' => $path,
                ]);
            }
        }

        if ($request->data_proyek) {
            $items = json_decode($request->data_proyek, true);
            if (is_array($items)) {
                foreach ($items as $item) {
                    PortofolioItem::create([
                        'portofolio_id' => $portofolio_satu->id,
                        'judul_proyek' => $item['judul'],
                        'deskripsi_singkat' => $item['deskripsi'],
                        'url_proyek' => $item['url'] ?? null,
                    ]);
                }
            }
        }

        Lpl::create([
            'portofolio_id' => $portofolio_satu->id,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'terbuka_klien' => $request->has('terbuka'),
            'layanan' => $request->layanan ?? [],
            'setuju' => $request->has('setuju'),
        ]);

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil disimpan!');
    } catch (\Exception $e) {
        Log::error('Gagal menyimpan portofolio: ' . $e->getMessage());
        return back()->withErrors('Terjadi kesalahan saat menyimpan portofolio: ' . $e->getMessage())->withInput();
    }
}

    public function edit($id)
    {
        $portofolio = PortofolioSatu::with(['gambar', 'item', 'lpl'])->findOrFail($id);
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Update Request:', $request->all());

        $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'keahlian' => 'required|array',
            'warna_tema' => 'required|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'layanan' => 'nullable|array',
            'setuju' => 'nullable|boolean',
        ]);

        $portofolio_satu = PortofolioSatu::findOrFail($id);

        // Update data utama
        $portofolio_satu->update([
            'judul_portofolio' => $request->judul,
            'ringkasan' => $request->ringkasan,
            'keahlian' => $request->keahlian,
            'warna_tema' => $request->warna_tema,
        ]);

        // Update gambar hanya jika ada upload baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            foreach ($portofolio_satu->gambar as $g) {
                if (Storage::disk('public')->exists($g->file_path)) {
                    Storage::disk('public')->delete($g->file_path);
                }
                $g->delete();
            }
            // Simpan gambar baru
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('portofolio_gambar', 'public');
                PortofolioGambar1::create([
                    'portofolio_id' => $portofolio_satu->id,
                    'file_path' => $path,
                ]);
            }
        }

        // Update item proyek dari JSON
        $portofolio_satu->item()->delete();
        if ($request->data_proyek) {
            $items = json_decode($request->data_proyek, true);
            foreach ($items as $item) {
                $portofolio_satu->item()->create([
                    'judul_proyek' => $item['judul'],
                    'deskripsi_singkat' => $item['deskripsi'],
                    'url_proyek' => $item['url'] ?? null,
                ]);
            }
        }

        // Update atau buat LPL
        $lplData = [
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'terbuka_klien' => $request->has('terbuka'),
            'layanan' => $request->layanan ?? [],
            'setuju' => (bool) $request->setuju,
        ];
        if ($portofolio_satu->lpl) {
            $portofolio_satu->lpl->update($lplData);
        } else {
            $lplData['portofolio_id'] = $portofolio_satu->id;
            Lpl::create($lplData);
        }

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $portofolio = PortofolioSatu::findOrFail($id);
        $portofolio->delete();

        return redirect()->route('admin.portofolio.index')
            ->with('success', 'Portofolio berhasil dihapus.');
    }
}
