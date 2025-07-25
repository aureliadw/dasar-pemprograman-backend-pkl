<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\folder;
use App\Models\file;

class ApiController extends Controller
{
        public function tree()
    {
        $folders = folder::with(['children', 'files'])->whereNull('parent_id')->get();
        return response()->json($folders);
    }

        public function folder($id)
    {
        $folder = folder::with(['children', 'files'])->findOrFail($id);
        return response()->json([
            'subfolders' => $folder->children,
            'files' => $folder->files,
        ]);
    }

        public function search(Request $request)
    {
        $q = $request->query('q');

        $folders = folder::where('name', 'like', "%$q%")->get();
        $files = file::where('name', 'like', "%$q%")->get();

        return response()->json([
            'folders' => $folders,
            'files' => $files,
        ]);
    }
}
