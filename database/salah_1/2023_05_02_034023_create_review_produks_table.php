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
<<<<<<<< HEAD:database/salah_1/2023_05_02_034023_create_review_produks_table.php

========
>>>>>>>> 281930cec3f88ea3e13adc762cdd77d3715aff02:database/migrations/2023_05_02_034023_create_review_produks_table.php
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_user');
            $table->text('isi_ulasan');
            $table->datetime('tanggal');
            $table->timestamps('');

<<<<<<<< HEAD:database/salah_1/2023_05_02_034023_create_review_produks_table.php

========
>>>>>>>> 281930cec3f88ea3e13adc762cdd77d3715aff02:database/migrations/2023_05_02_034023_create_review_produks_table.php
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
