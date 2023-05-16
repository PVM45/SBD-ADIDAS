<?php

namespace App\Http\Controllers;
use App\Models\produk;
use App\Models\kategori;
use App\Models\kategoris_subkategoris;
use Illuminate\Http\Request;

class sessionproduk extends Controller
{
    public function kategori()
    {
        // $kategori = kategoris_subkategoris::where('', 1)->get();
        // // echo $kategori;kategori_id
        // foreach ($kategori as $kontol) {
        //     echo ($kontol->produk->all());       // return view('tes');

        

    $produk = Produk::get();

    foreach ($produk as $produk) {
        $komentar = $produk->komentar;
        
        if ($komentar->isNotEmpty()) {
            echo "Produk dengan ID: " . $produk->id . " memiliki komentar:";
            
            foreach ($komentar as $komen) {
                echo $komen->komentar;
            }
            
            echo "<br>";
        } else {
            echo "Produk dengan ID: " . $produk->id . " tidak memiliki komentar.<br>";
        }
    }
}

        }

        // dd($kategori);
    
