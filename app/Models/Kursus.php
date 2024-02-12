<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;
    protected $table = 'content_course';

    protected $fillable = [
        'nama_kursus',
        'nama_pembuat',
        'deskripsi_kursus',
        'harga_kursus'
    ];
}
