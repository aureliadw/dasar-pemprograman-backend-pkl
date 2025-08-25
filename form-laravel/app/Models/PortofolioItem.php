<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortofolioItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'portofolio_item';
    protected $fillable = ['portofolio_id', 'judul_proyek', 'deskripsi_singkat', 'url_proyek'];

    public function portofolio()
    {
        return $this->belongsTo(PortofolioSatu::class, 'portofolio_id');
    }
}
