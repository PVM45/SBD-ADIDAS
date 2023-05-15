<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            [
                'id' => 1,
                'nama_kategori' => 'Man'
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Woman'
            ],
            [
                'id' => 3,
                'nama_kategori' => 'Kids'
            ],
        ]);
    }
}
