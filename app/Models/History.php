<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';

    protected $fillable = [
        'peserta_id',
        'kursus_id',
        'pesanan_id',
        'pesanan_detail_id',
        'status_masa_aktif',
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
