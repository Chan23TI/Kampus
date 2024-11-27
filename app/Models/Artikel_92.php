<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel_92 extends Model
{
    use HasFactory;

    protected $table = 'artikel_92';// Nama tabel yg digunakan

    public $timestamps = false;// non aktifkan timpestamp

    protected $fillable = [
        'tanggal_92',
        'judul_92',
        'kategori_92',
        'status_92',
        'artikel_92',
        'gambar_92',
    ];
}
