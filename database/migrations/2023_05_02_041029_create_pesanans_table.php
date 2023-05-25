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
            $table->id();

            $table->id();


            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('alamat_id');
            $table->unsignedBigInteger('pembayaran_id');
            $table->double('total_pembayaran');
            $table->string('kode_pembayaran');
            $table->enum('status_pesanan',['terkonfirmasi','belum_terkonfirmasi'])->default('belum_terkonfirmasi');
            $table->datetime('tanggal_transaksi');
            $table->timestamps();

            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('alamat_id')->references('id')->on('alamats')->onDelete('cascade');
            $table->foreign('pembayaran_id')->references('id')->on('pembayarans')->onDelete('cascade');


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
