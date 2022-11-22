<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;
    protected $fillable =[
        'kategori_id',
        'nama_kursus',
        'slug',
        'harga',
        'deskripsi',
        'thumbnail',
        'kuota',
        'durasi',
        'status',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
