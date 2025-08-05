<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPenawaran extends Model
{
    use HasFactory;

    protected $table = 'penawaran'; 

    protected $fillable = [
        'jumlah_penawaran',
        'pesan',
        'durasi_pengerjaan',
    ];
}
