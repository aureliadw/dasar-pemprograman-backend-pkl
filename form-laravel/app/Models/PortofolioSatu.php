<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortofolioSatu extends Model
{
    use HasFactory, SoftDeletes;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'portofolio_satu'; // atau nama tabel yang benar di database Anda

    protected $fillable = [
        'judul_portofolio',
        'ringkasan', 
        'keahlian',
        'warna_tema'
    ];

    protected $casts = [
        'keahlian' => 'array', // Cast sebagai array
    ];

    // Ubah keahlian string jadi array
    public function getKeahlianAttribute($value)
    {
        return $value ? array_map('trim', explode(',', $value)) : [];
    }

    // Relasi ke gambar
    public function gambar()
    {
        return $this->hasMany(PortofolioGambar1::class, 'portofolio_id');
    }

    // Relasi ke item proyek
    public function items()
    {
        return $this->hasMany(PortofolioItem::class, 'portofolio_id');
    }

    // Relasi ke LPL
    public function lpl()
    {
        return $this->hasOne(Lpl::class, 'portofolio_id');
    }
}
