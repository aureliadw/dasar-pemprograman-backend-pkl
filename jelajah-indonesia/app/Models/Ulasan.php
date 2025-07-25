<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = ['id_pengguna', 'id_wisata', 'tanggal_ulasan', 'komentar', 'peringkat'];

    protected $casts = [
        'tanggal_ulasan' => 'date', // Otomatis cast ke Carbon
    ];
    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata', 'id');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }

}
