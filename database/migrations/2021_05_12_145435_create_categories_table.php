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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
<<<<<<< Updated upstream:database/migrations/2021_05_12_145435_create_categories_table.php
            $table->string('name');
            $table->timestamps();

=======
            $table->string('nama_subkategori');
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
>>>>>>> Stashed changes:database/migrations/2022_05_12_092052_create_subkategoris_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
