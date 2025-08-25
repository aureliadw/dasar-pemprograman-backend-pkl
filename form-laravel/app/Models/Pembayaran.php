<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pembayaran';

    protected $fillable = [
        'jumlah_pembayaran',
        'metode_pembayaran',
        'setuju_syarat',
    ];
}
