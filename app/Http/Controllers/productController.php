<?php

namespace App\Http\Controllers;

use App\Models\rating;
use App\Models\komentar;
use App\Models\produk;
use App\Models\kategori;
use App\Models\kategoris_subkategoris;
use App\Models\subkategori;


use Illuminate\Http\Request;

class productController extends Controller
{

    public function index()
    {
//cek
      $produks = produk::all();
        return view('layouts.author.produk', compact('produks'));

        $produks = Produk::all();
        return view('frontend.frontend_layout.product_page.products', compact('produks'));
    }

    public function show($id)
{
    $produk =  kategoris_subkategoris::where('produk_id', $id)->get();
    $produks = Komentar::where('produk_id', $id)->get();
    $produksr = Rating::where('produk_id', $id)->take(1)->get();
    $limit =  Produk::where('id','!=',$id)->latest()->take(3)->get();
    return view('frontend.frontend_layout.product_page.single_product', compact('produk','produks','limit','produks','produksr'));

}

  public function search(Request $request)
    {  $kategoris = Kategori::all();
        $subkategoris = Subkategori::all();
        $keyword = $request->input('keyword');
        $products = Produk::where('nama_produk',  'LIKE', "%$keyword%")->get();
        if ($products->isEmpty()) {
            return view('produk.not-found');
        }
        return view('produk.search', compact('products', 'kategoris', 'subkategoris'));
    }

    public function filter(Request $request)
    {
        $kategoris = Kategori::all();
        $subkategoris = Subkategori::all();
        $kategoriId = $request->input('kategori');
        $subkategoriId = $request->input('subkategori');

        // Dapatkan objek kategori dan subkategori berdasarkan ID
        $kategori = Kategori::findOrFail($kategoriId);
        $subkategori = Subkategori::findOrFail($subkategoriId);

        // Lakukan filter berdasarkan kategori dan subkategori yang dipilih
        $produks = Produk::whereHas('subkategoris', function ($query) use ($subkategoriId) {
            $query->where('subkategori_id', $subkategoriId);
        })->where('kategori_id', $kategoriId)->get();

        return view('produk.filterproduk', compact('produks', 'kategoris', 'subkategoris'));
    }

}
