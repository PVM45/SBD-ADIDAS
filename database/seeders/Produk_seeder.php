<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory;

class Produk_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [];
        $faker = Factory::create();
        $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i = 1; $i <= 4; $i++) {
            $id_produk = '';
            for ($j = 1; $j <= 4; $j++) {
                $id_produk .= $huruf[rand(0, strlen($huruf))];
            }
            for ($i = 1; $i <= 4; $i++) {
                $image = "Produk image" . rand(1, 3) . ".jpg";
                $produk[] = [
                    'id_produk' => $id_produk,
                    'id_kategori' => $faker->randomDigit(rand(0,4)),
                    'id_subkategori' => $faker->randomDigit(rand(0,4)),
                    'nama_produk' => 'produk ' . $i,
                    'deskripsi_produk' => $faker->paragraph(rand(8, 12), true),
                    'gambar_produk' => $image,
                    'varian_warna' => $faker->word(rand(1,5)),
                    'ukuran'       => $faker->word(rand(1,5)),
                    'stok'         => $faker->randomDigit(rand(50, 100)),
                    'status_produk' => $faker->randomElement(['tersedia', 'habis']),
                    'harga_produk'         => $faker->randomDigit(rand(100000, 10000000)),


                ];
            }
        }
        \DB::table('produks')->insert($produk);
    }
}
