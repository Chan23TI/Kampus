<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';// Nama tabel yg digunakan

    public $timestamps = false;// non aktifkan timpestamp

    protected $fillable = [
        'judul',
        'isi_berita',
        'gambar',
    ];
}
