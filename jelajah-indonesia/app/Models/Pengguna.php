<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
class Pengguna extends Model implements AuthenticatableContract
{
    use Authenticatable, Notifiable;
    protected $table = 'penggunas';
    protected $fillable = ['nama', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'id_pengguna');
    }
}
