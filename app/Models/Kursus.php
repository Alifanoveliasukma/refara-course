<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kursus extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'content_course';

    protected $fillable = [
        'nama_kursus',
        'nama_pembuat',
        'deskripsi_kursus', 
        'harga_kursus',
        'category_id',
        'image',
    ]; 

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

}
