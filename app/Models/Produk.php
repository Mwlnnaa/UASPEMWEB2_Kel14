<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'harga',
        'stok',
        'rating',
        'min_stok',
        'jenis_produk_id',
        'foto',
        'deskripsi',
    ];

    // Relasi Many-to-One dengan JenisProduk
    public function jenisProduk()
    {
        return $this->belongsTo(JenisProduk::class);
    }

    // Relasi One-to-Many dengan Testimoni
    public function testimonis()
    {
        return $this->hasMany(Testimoni::class);
    }
}