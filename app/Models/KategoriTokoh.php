<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriTokoh extends Model
{
    use HasFactory;

    protected $fillable = ['nama']; // Kolom yang bisa diisi secara massal

    // Relasi One-to-Many dengan Testimoni
    public function testimonis()
    {
        return $this->hasMany(Testimoni::class);
    }
}