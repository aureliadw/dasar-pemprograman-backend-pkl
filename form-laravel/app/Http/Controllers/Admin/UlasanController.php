<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'desc'); // default descending
        $search = $request->get('search');

        $query = Ulasan::query();

        // Fitur search (komentar)
        if ($search) {
            $query->where('komentar', 'like', "%{$search}%");
        }

        // Urutkan berdasarkan id
        $ulasan = $query->orderBy('id', $sort)->paginate(10); // 10 per halaman

        return view('admin.ulasan.index', compact('ulasan', 'sort'));
    }

    public function create()
    {
        return view('admin.ulasan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000',
        ]);

        Ulasan::create($request->only('rating', 'komentar'));

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('admin.ulasan.show', compact('ulasan'));
    }

    public function edit($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('admin.ulasan.edit', compact('ulasan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000',
        ]);

        $ulasan = Ulasan::findOrFail($id);
        $ulasan->update($request->only('rating', 'komentar'));

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil dihapus.');
    }
}
