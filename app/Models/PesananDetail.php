<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PesananDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pesanan_detail';

    protected $fillable = [
        'kursus_id',
        'pesanan_id',
        'peserta_id',
        'status',
        'jumlah',
        'jumlah_harga'
    ];

    public function kursus()
	{
	      return $this->belongsTo(Kursus::class,'kursus_id', 'id');
	}

	public function pesanan()
	{
	      return $this->belongsTo(Pesanan::class,'pesanan_id', 'id');
	}

}
