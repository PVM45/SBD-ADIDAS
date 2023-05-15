<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class Kategori_produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KategoriSeeder::class);

        $kategori = Kategori::find(1);
        $subkategoris = $kategori->subkategoris;

        // Lakukan apa pun yang ingin Anda lakukan dengan data subkategori yang terkait
        // Misalnya, tampilkan informasi subkategori
        foreach ($subkategoris as $subkategori) {
            echo $subkategori->nama_subkategori;
        }
    }
}
