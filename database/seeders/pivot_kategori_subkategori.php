<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class pivot_kategori_subkategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_subkategori =[
            [
                'kategori_id' => 1,
                'subkategori_id' => 1,
            ],[
                'kategori_id' => 1,
                'subkategori_id' => 2,
            ],[
                'kategori_id' => 1,
                'subkategori_id' => 3,
            ],[
                'kategori_id' => 2,
                'subkategori_id' =>1,
            ],[
                'kategori_id' => 2,
                'subkategori_id' =>2,
            ],[
                'kategori_id' => 2,
                'subkategori_id' =>3,
            ],[
                'kategori_id' => 3,
                'subkategori_id' =>1,
            ],[
                'kategori_id' => 3,
                'subkategori_id' =>2,
            ],[
                'kategori_id' => 3,
                'subkategori_id' =>3,
            ]
            ];
    }
    \DB::table('pivot_kategori_subkategori')->insert( $kategori_subkategori);
}
