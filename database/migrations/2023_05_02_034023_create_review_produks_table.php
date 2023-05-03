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
        Schema::create('review_produks', function (Blueprint $table) {
            $table->string('id_produk');
            $table->unsignedInteger('id_pengguna');
            $table->text('isi_ulasan');
            $table->datetime('tanggal');
            $table->timestamps('');

            $table->foreign('id_produk')->references('id_produk')->on('produks')->onDelete('cascade');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('penggunas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_produks');
    }
};
