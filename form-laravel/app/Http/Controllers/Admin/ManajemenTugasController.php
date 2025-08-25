<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManajemenTugas;
use App\Models\Portofolio;

class ManajemenTugasController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'desc');
        $search = $request->get('search');

        $query = ManajemenTugas::query();

        if ($search) {
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $tugas = $query->orderBy('id', $sort)->paginate(10);

        return view('admin.manajemen_tugas.index', compact('tugas', 'sort'));
    }

    public function create()
    {
        return view('manajemen_tugas.create');
    }

    public function store(Request $request)
    {
        foreach ($request->tugas as $data) {
            if (isset($data['id'])) {
                // update
                ManajemenTugas::where('id', $data['id'])->update([
                'judul'     => $data['judul'],
                'deskripsi' => $data['deskripsi'],
                'batas'     => $data['batas'],
                'status'    => $data['status'],
                'progres'   => $data['progres'],
            ]);
        } else {
            // insert
            ManajemenTugas::create($data);
        }
    }

    return redirect()->route('admin.manajemen-tugas.index')->with('success', 'Tugas diperbarui.');
}


    public function edit($id)
    {
        $tugas = ManajemenTugas::findOrFail($id);
        return view('manajemen_tugas.edit', compact('tugas'));
    }

    public function update(Request $request, $id)
    {
        $tugas = ManajemenTugas::findOrFail($id);
        $tugas->update($request->all());
        return redirect()->route('admin.manajemen-tugas.index');
    }

    public function destroy($id)
    {
        ManajemenTugas::destroy($id);
        return redirect()->route('admin.manajemen-tugas.index');
    }
}
