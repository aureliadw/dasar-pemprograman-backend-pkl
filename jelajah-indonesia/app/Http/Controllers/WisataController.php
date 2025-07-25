<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Ulasan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BaseWisataController extends Controller
{
    protected function getWisataByCategory($namaKategori, $view)
    {
        $wisataList = Wisata::whereHas('kategori', function ($query) use ($namaKategori) {
            $query->where('nama_kategori', $namaKategori);
        })->get();

        return view($view, compact('wisataList'));
    }
}

class WisataController extends BaseWisataController
{
    public function gunungList()
    {
        return $this->getWisataByCategory('Gunung', 'destinations.gunung');
    }

    public function budayaList()
    {
        return $this->getWisataByCategory('Budaya', 'destinations.budaya');
    }

    public function kulinerList()
    {
        return $this->getWisataByCategory('Kuliner', 'destinations.kuliner');
    }

    public function pantaiList()
    {
        return $this->getWisataByCategory('Pantai', 'destinations.beach');
    }
    
public function detail($kategori, $id)
{
    $wisata = Wisata::findOrFail($id);

    if (($kategori == 'pantai' && $wisata->id_kategori != 1) ||
        ($kategori == 'gunung' && $wisata->id_kategori != 2) ||
        ($kategori == 'budaya' && $wisata->id_kategori != 3) ||
        ($kategori == 'kuliner' && $wisata->id_kategori != 4)) {
        abort(404); 
    }

    $ulasan = Ulasan::where('id_wisata', $id)->get();

    // Kirim data ke Blade
    return view('wisatas.detail', compact('wisata', 'ulasan'));
}

}