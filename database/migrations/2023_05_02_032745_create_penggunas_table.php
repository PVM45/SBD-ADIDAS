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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->increments('id_pengguna');
            $table->string('nama_pengguna');
            $table->integer('nomor_telepon');
            $table->date('tanggal_lahir');
            $table->string('email');
            $table->string('password');
            $table->enum('role', ['admin','user'])->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
