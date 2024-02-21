<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data_lengkap';

    protected $fillable = [
        'peserta_id',
        'kursus_id',
        'pesanan_id',
        'pesanan_detail_id',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function pesananDetail()
    {
    return $this->belongsTo(PesananDetail::class);
    }
    
}
