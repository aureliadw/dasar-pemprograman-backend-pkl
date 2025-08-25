<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengajuanPenawaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penawaran'; 

    protected $fillable = [
        'jumlah_penawaran',
        'pesan',
        'durasi_pengerjaan',
    ];
}
