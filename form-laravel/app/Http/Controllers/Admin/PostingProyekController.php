<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostingProyek;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostingProyekController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');

        $this->middleware('permission:view_posting-proyek')->only(['index', 'show']);
        $this->middleware('permission:create_posting-proyek')->only(['create', 'store']);
        $this->middleware('permission:edit_posting-proyek')->only(['edit', 'update']);
        $this->middleware('permission:delete_posting-proyek')->only(['destroy']);
    }

    public function index(Request $request)
{
    $query = PostingProyek::query();

    // Search
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('detail_proyek', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%");
        });
    }

    $sort = $request->get('sort', 'desc');
    $query->orderBy('created_at', $sort);

    $data = $query->paginate(10);

    return view('admin.posting-proyek.index', compact('data'));
}

    public function create()
    {
        return view('admin.posting-proyek.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'detail_proyek'     => 'required|string',
            'deskripsi'         => 'required|string',
            'kategori'          => 'required|string',
            'anggaran'          => 'required|numeric',
            'batas_penawaran'   => 'required|date',
            'lampiran'          => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'lokasi_pengerjaan' => 'required|in:remote,onsite',
        ]);

        DB::transaction(function () use ($request, $validated) {
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('lampiran', $filename, 'public');
                $validated['lampiran'] = $filename;
            }

            PostingProyek::create($validated);
        });

        return redirect()->route('admin.posting-proyek.index')
            ->with('success', 'Proyek berhasil diposting!');
    }

    public function edit($id)
    {
        $data = PostingProyek::findOrFail($id);
        return view('admin.posting-proyek.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'detail_proyek'     => 'required|string',
            'deskripsi'         => 'required|string',
            'kategori'          => 'required|string',
            'anggaran'          => 'required|numeric',
            'batas_penawaran'   => 'required|date',
            'lokasi_pengerjaan' => 'required|in:remote,onsite',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $proyek = PostingProyek::findOrFail($id);
     
        DB::transaction(function () use ($request, $validated, $proyek) {
            if ($request->hasFile('lampiran')) {
                if ($proyek->lampiran && Storage::disk('public')->exists('lampiran/' . $proyek->lampiran)) {
                    Storage::disk('public')->delete('lampiran/' . $proyek->lampiran);
                }

                $file = $request->file('lampiran');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('lampiran', $filename, 'public');
                $validated['lampiran'] = $filename;
            }

            $proyek->update($validated);
        });

        return redirect()->route('admin.posting-proyek.index')
            ->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $proyek = PostingProyek::findOrFail($id);

        DB::transaction(function () use ($proyek) {
            if ($proyek->lampiran && Storage::disk('public')->exists('lampiran/' . $proyek->lampiran)) {
                Storage::disk('public')->delete('lampiran/' . $proyek->lampiran);
            }

            $proyek->delete();
        });

        return back()->with('success', 'Proyek berhasil dihapus');
    }
}
