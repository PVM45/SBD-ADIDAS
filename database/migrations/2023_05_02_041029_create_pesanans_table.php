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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->string('id_pesanan')->primary();
            $table->string('id_produk');
            $table->unsignedInteger('id_user');
            $table->double('total_pembayaran');
            $table->enum('status_pesanan',['terkonfirmasi','belum_terkonfirmassi']);
            $table->datetime('tanggal_transaksi');
            $table->timestamps();
            

            $table->foreign('id_produk')->references('id_produk')->on('produks')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
