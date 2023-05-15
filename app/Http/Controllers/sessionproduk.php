<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\kategoris_subkategoris;
use Illuminate\Http\Request;

class sessionproduk extends Controller
{
    public function kategori()
    {
        $kategori = kategoris_subkategoris::where('kategori_id', 1)->get();
        // echo $kategori;
        foreach ($kategori as $kontol) {
            echo ($kontol->produk->all());       // return view('tes');
        }

        // dd($kategori);
    }
}
