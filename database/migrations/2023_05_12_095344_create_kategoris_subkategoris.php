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
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('subkategori_id');
            $table->timestamps();

            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('subkategori_id')->references('id')->on('subkategoris')->onDelete('cascade');
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
