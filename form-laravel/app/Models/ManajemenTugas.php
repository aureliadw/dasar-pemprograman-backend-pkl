<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManajemenTugas extends Model
{
    use HasFactory;
     protected $table = 'manajemen_tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'batas',
        'status',
        'progres',
        'aksi'
    ];
}
