<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'nama_toko',
        'komentar',
        'rating',
        'produk_id',
        'kategori_toko_id',
    ];

    // Relasi Many-to-One dengan Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    // Relasi Many-to-One dengan KategoriToko
    public function kategoriToko()
    {
        return $this->belongsTo(KategoriToko::class);
    }
}