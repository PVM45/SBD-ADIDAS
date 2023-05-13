<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SubKategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subkategoris')->insert([
            [ 'nama_kategori' => 'Shoes'
            ], ['nama_kategori' => 'Clothes'], ['nama_kategori' => 'Sports'],
        ]);
    }
}
