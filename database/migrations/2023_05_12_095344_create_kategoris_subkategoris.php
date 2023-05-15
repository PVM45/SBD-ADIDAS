<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris_subkategoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk');
            $table->unsignedBigInteger('kategori');
            $table->unsignedBigInteger('subkategori');
            $table->timestamps();

            $table->foreign('produk')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('subkategori')->references('id')->on('subkategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategoris_subkategoris');
    }
};
