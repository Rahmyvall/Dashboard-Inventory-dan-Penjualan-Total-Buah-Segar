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
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('kode_produk', 20)->unique();
            $table->string('nama_buah', 100);

            $table->unsignedInteger('id_kategori')->nullable();

            $table->enum('satuan', ['kg', 'buah', 'ikat', 'dus', 'kg_box'])
                ->default('kg');

            $table->decimal('harga_beli', 12, 2)->default(0.00);
            $table->decimal('harga_jual', 12, 2)->default(0.00);
            $table->decimal('stok', 12, 2)->default(0.00);
            $table->decimal('stok_minimal', 12, 2)->default(10.00);

            $table->integer('shelf_life_days')->nullable()->comment('Umur simpan default dalam hari');
            $table->text('deskripsi')->nullable();

            $table->string('foto')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->foreign('id_kategori')
                ->references('id_kategori')
                ->on('kategori')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};