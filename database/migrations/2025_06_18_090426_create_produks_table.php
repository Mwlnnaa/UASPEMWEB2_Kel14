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
        Schema::create('produks', function (Blueprint $table) {
            $table->id(); // int, primary key, auto-increment
            $table->string('kode', 10)->unique(); // varchar(10), unique
            $table->string('nama', 45); // varchar(45)
            $table->double('harga'); // double
            $table->integer('stok'); // int
            $table->integer('rating')->nullable(); // int, nullable karena rating mungkin baru diisi nanti
            $table->integer('min_stok'); // int
            $table->foreignId('jenis_produk_id')->constrained('jenis_produks')->onDelete('cascade'); // Foreign Key ke jenis_produks
            $table->text('deskripsi')->nullable(); // text, nullable
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};