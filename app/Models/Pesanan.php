<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta');
    }

    protected $fillable = [
        'id_peserta',
        'status',
        'tanggal',
        'jumlah_harga'
    ];

}
