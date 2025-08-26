<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');

        $this->middleware('permission:view_ulasan')->only(['index', 'show']);
        $this->middleware('permission:create_ulasan')->only(['create', 'store']);
        $this->middleware('permission:edit_ulasan')->only(['edit', 'update']);
        $this->middleware('permission:delete_ulasan')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $sort = $request->get('sort', 'desc'); 
        $search = $request->get('search');

        $query = Ulasan::query();

        if ($search) {
            $query->where('komentar', 'like', "%{$search}%");
        }

        $ulasan = $query->orderBy('id', $sort)->paginate(10); 

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
