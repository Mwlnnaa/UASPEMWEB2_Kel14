<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;

    protected $fillable = ['nama']; // Kolom yang bisa diisi secara massal

    // Relasi One-to-Many dengan Produk
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}