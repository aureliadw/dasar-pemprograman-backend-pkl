<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostingProyek extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'posting_proyek';

    protected $fillable = [
        'detail_proyek',
        'deskripsi',
        'kategori',
        'anggaran',
        'batas_penawaran',
        'lampiran',
        'lokasi_pengerjaan',
    ];
}
