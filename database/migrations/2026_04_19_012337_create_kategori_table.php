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
        Schema::create('kategori', function (Blueprint $table) {
            $table->unsignedInteger('id_kategori')->autoIncrement()->primary();
            $table->string('nama_kategori', 50)->unique();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();   // created_at & updated_at otomatis

            // Index untuk pencarian cepat
            $table->index('nama_kategori', 'idx_nama_kategori');

            $table->comment('Tabel kategori buah-buahan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};