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

            $table->id();
            $table->string('nama_produk');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('subkategori_id');
            $table->text('deskripsi_produk');
            $table->string('gambar_produk');
            $table->string('gambar_produk_2');
            $table->string('gambar_produk_3');
            $table->string('varian_warna');
            $table->string('ukuran');
            $table->integer('stok')->default(0);
            $table->enum('status_produk', ['Tersedia', 'Tidak Tersedia'])->default('Tidak Tersedia');
            $table->float('harga_produk');
  ///
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('subkategori_id')->references('id')->on('subkategoris')->onDelete('cascade');

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
