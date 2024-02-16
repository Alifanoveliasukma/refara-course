<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $table = 'pesanan_detail';

    protected $fillable = [
        'kursus_id',
        'pesanan_id',
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
