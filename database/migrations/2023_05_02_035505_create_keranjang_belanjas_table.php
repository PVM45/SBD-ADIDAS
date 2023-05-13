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
        Schema::create('keranjang_belanjas', function (Blueprint $table) {
            $table->string('id_keranjang')->primary();
            $table->unsignedBigInteger('id_produk');
            $table->double('total_harga');
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
            $table->enum('aksi',['checkout','hapus']);
            $table->integer('kuantitas_beli');
            $table->double('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang_belanjas');
    }
};
