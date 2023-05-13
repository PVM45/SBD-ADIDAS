<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Kategori_produkSeeder;
use Database\Seeders\kategori_subkategori;
use Database\Seeders\KategoriSeeder;
use Database\Seeders\SubKategori;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProdukSeeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            // Kategori_produkSeeder::class,
            // Subkategori::class,
            // kategori_subkategori::class,
            // ProdukSeeder::class,
        ]);
    }
}
