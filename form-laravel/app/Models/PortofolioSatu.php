<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortofolioSatu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'portofolio_satu'; 

    protected $fillable = [
        'judul_portofolio',
        'ringkasan', 
        'keahlian',
        'warna_tema'
    ];

    protected $casts = [
        'keahlian' => 'array', 
    ];

    public function getKeahlianAttribute($value)
    {
        return $value ? array_map('trim', explode(',', $value)) : [];
    }

    public function gambar()
    {
        return $this->hasMany(PortofolioGambar1::class, 'portofolio_id');
    }

    public function items()
    {
        return $this->hasMany(PortofolioItem::class, 'portofolio_id');
    }

    public function lpl()
    {
        return $this->hasOne(Lpl::class, 'portofolio_id');
    }
}
