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
        'status_masa_aktif',
        'status_owner',
        'pesanan_detail_id',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
