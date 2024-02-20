<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Peserta extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'list_peserta';
   
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_peserta');
    }
    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'password',
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

