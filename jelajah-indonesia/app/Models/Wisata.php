<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisatas'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['nama_wisata', 'lokasi', 'deskripsi', 'id_kategori', 'foto', 'rating'];

    

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class, 'id_wisata', 'id');
    }

    public function kategori()
    {
    return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
