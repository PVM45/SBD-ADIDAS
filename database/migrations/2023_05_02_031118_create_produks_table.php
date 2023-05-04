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
            $table->string('id_produk')->primary();
            $table->string('nama_produk');
            $table->text('deskripsi_produk');
            $table->string('gambar_produk');
            $table->string('varian_warna');
            $table->string('kategori_produk');
            $table->string('ukuran');
            $table->bigInteger('stok');
            $table->enum('status_produk',['tersedia','habis']);
            $table->decimal('harga_produk', $precision = 8, $scale = 2);

            $table->timestamps();
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
