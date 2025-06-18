<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id(); // int, primary key, auto-increment
            $table->date('tanggal'); // date
            $table->string('nama_toko', 45); // varchar(45)
            $table->string('komentar', 200); // varchar(200)
            $table->integer('rating')->nullable(); // int, nullable
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade'); // Foreign Key ke produks
            $table->foreignId('kategori_toko_id')->constrained('kategori_tokos')->onDelete('cascade'); // Foreign Key ke kategori_tokos
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};