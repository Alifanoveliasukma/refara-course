<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'data_lengkap';

    protected $fillable = [
        'peserta_id',
        'kursus_id',
        'pesanan_id',
        'history_id',
        'status_masa_aktif',
        'status_owner',
        'pesanan_detail_id',
    ];

    protected static function boot()
    {
        parent::boot();

        // Menangani event deleting
        static::deleting(function ($data) {
            // Hapus terkait PesananDetail jika ada
            if ($data->pesanan_detail_id) {
                PesananDetail::findOrFail($data->pesanan_detail_id)->delete();
            }
        });
    }

    public function pesanandetail()
    {
        return $this->belongsTo(PesananDetail::class, 'pesanan_detail_id');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }
    
    public function history()
    {
        return $this->belongsTo(History::class, 'history_id');
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
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
}

