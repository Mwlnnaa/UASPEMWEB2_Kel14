<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Import model Produk
use App\Models\Testimoni; // Import model Testimoni
use App\Models\JenisProduk; // Import model JenisProduk
use App\Models\KategoriTokoh; // Import model KategoriTokoh (pastikan nama sudah 'Tokoh')

class FrontendController extends Controller
{
    public function index() // Ini untuk menampilkan daftar produk
    {
        $produks = Produk::latest()->paginate(12);
        $jenisProduks = JenisProduk::all();
        return view('frontend.produk.index', compact('produks', 'jenisProduks'));
    }

    public function showProduk($id) // Ini untuk menampilkan detail produk
    {
        $produk = Produk::with(['jenisProduk', 'testimonis.kategoriTokoh'])->findOrFail($id); // relasi ke kategoriTokoh
        return view('frontend.produk.show', compact('produk'));
    }

    public function listTestimoni() // Ini untuk menampilkan semua testimoni
    {
        $testimonis = Testimoni::with(['produk', 'kategoriTokoh'])->latest()->paginate(15); // relasi ke kategoriTokoh
        return view('frontend.testimoni.index', compact('testimonis'));
    }

    public function produkByJenis($jenisProdukId) // Ini untuk filter produk berdasarkan jenis
    {
        $jenisProduk = JenisProduk::findOrFail($jenisProdukId);
        $produks = Produk::where('jenis_produk_id', $jenisProdukId)->latest()->paginate(12);
        $jenisProduks = JenisProduk::all();
        return view('frontend.produk.index', compact('produks', 'jenisProduks', 'jenisProduk'));
    }
}