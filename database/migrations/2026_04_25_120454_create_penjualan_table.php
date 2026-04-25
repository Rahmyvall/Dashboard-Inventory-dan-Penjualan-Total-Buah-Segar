<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');

            $table->string('no_invoice', 20)->unique();
            $table->dateTime('tanggal_penjualan')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->unsignedBigInteger('id_pelanggan')->nullable();

            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('diskon', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);
            $table->decimal('dibayar', 12, 2)->default(0);

            // generated column
            $table->decimal('kembalian', 12, 2)
                ->storedAs('dibayar - total');

            $table->enum('metode_bayar', ['cash', 'transfer', 'qris', 'kartu'])
                ->default('cash');

            $table->unsignedBigInteger('id_user');

            $table->timestamps();

            // foreign key pelanggan
            $table->foreign('id_pelanggan')
                ->references('id_pelanggan')
                ->on('pelanggan')
                ->nullOnDelete();

            // foreign key users
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
