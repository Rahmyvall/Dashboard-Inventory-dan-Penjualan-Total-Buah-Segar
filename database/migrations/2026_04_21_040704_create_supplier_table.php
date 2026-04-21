<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->increments('id_supplier');

            $table->string('kode_supplier', 20)->unique();
            $table->string('nama_supplier', 100);

            $table->text('alamat')->nullable();
            $table->string('kota', 50)->nullable();

            $table->string('telepon', 20)->nullable();
            $table->string('email', 100)->nullable();

            $table->string('kontak_person', 100)->nullable();

            // 📷 Field foto supplier
            $table->string('foto')->nullable();
            // contoh isi: "supplier/abc.jpg"

            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->timestamps();

            $table->index('nama_supplier');
            $table->index('kota');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
