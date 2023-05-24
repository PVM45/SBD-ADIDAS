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
<<<<<<< Updated upstream:database/migrations/2022_05_12_145446_create_subcategories_table.php
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
=======
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('metode_pembayaran');
>>>>>>> Stashed changes:database/migrations/2023_05_02_033346_create_pembayarans_table.php
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
