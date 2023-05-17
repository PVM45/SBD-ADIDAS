<?php

namespace App\Http\Controllers;

use App\Models\rating;
use App\Models\komentar;
use App\Models\produk;
use App\Models\kategori;
use App\Models\kategoris_subkategoris;


use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {

        $produks = Produk::all();
        return view('frontend.frontend_layout.product_page.products', compact('produks'));
    }
    public function show($id)
{   
    $produk =  kategoris_subkategoris::where('produk_id', $id)->get();
    $produks = Komentar::where('produk_id', $id)->get();
    $produksr = Rating::where('produk_id', $id)->get();
    $limit =  Produk::where('id','!=',$id)->latest()->take(3)->get();
    return view('frontend.frontend_layout.product_page.single_product', compact('produk','produks','limit','produks','produksr'));


}   
//=======

    public function Showmore()
    {
        $produks = Produk::latest()->take(3)->get();
        return view('frontend.frontend_layout.product_page.more_product', compact('produks'));

    }

}
