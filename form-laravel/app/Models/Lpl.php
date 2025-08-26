<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lpl extends Model
{
    use HasFactory;
    
    protected $table = 'lpl';
    protected $fillable = [
        'portofolio_id', 'longitude', 'latitude', 
        'terbuka_klien', 'layanan', 'setuju'
    ];

    protected $casts = [
        'layanan' => 'array', 
        'terbuka_klien' => 'boolean',
        'setuju' => 'boolean',
    ];

    public function getLayananAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function portofolio()
    {
        return $this->belongsTo(PortofolioSatu::class, 'portofolio_id');
    }
}
