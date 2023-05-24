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
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_subkategori');
            $table->text('deskripsi_produk');
            $table->string('gambar_produk');
            $table->string('varian_warna');
            $table->string('ukuran');
            $table->bigInteger('stok');
            $table->enum('status_produk',['tersedia','habis']);
<<<<<<< Updated upstream
            $table->decimal('harga_produk', $precision = 12, $scale = 2);
            $table->timestamps();
            $table->foreign('id_kategori')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('id_subkategori')->references('id')->on('subcategories')->onDelete('cascade');
            
=======
            $table->double('harga_produk');
            $table->integer('stok')->default(0);
            $table->enum('status_produk', ['Tersedia', 'Tidak Tersedia'])->default('Tidak Tersedia');
            $table->float('harga_produk');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('subkategoris')->onDelete('cascade');
            $table->foreign('id_subkategori')->references('id')->on('subkategoris')->onDelete('cascade');

>>>>>>> Stashed changes
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
