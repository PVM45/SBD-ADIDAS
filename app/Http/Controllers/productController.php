<?php

namespace App\Http\Controllers;

use App\Models\rating;
use App\Models\komentar;
use App\Models\produk;
use App\Models\kategori;
use App\Models\subkategori;
use App\Models\kategoris_subkategoris;


use Illuminate\Http\Request;

class productController extends Controller
{

    public function index()
    {
        $produks = Produk::all();
        $kategoris = kategori::all();
        $subkategoris = subkategori::all();
        return view('frontend.frontend_layout.product_page.products', compact('produks', 'kategoris', 'subkategoris'));
    }

    public function show($id)
    {
        $kategoris = kategori::all();
        $subkategoris = subkategori::all();
        $produk =  kategoris_subkategoris::where('produk_id', $id)->get();
        $produks = Komentar::where('produk_id', $id)->get();
        $produksr = Rating::where('produk_id', $id)->take(1)->get();
        $limit =  Produk::where('id', '!=', $id)->latest()->take(3)->get();
        return view('frontend.frontend_layout.product_page.single_product', compact('produk', 'produks', 'limit', 'produks', 'produksr', 'kategoris', 'subkategoris'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $kategoris = kategori::all();
        $subkategoris = subkategori::all();
        $products = Produk::where('nama_produk',  'LIKE', "%$keyword%")->get();
        if ($products->isEmpty()) {
            return view('produk.not-found');
        }
        return view('produk.search', compact('products', 'kategoris', 'subkategoris'));
    }

    public function filter(Request $request)
    {

        $kategoris = Kategori::all();
        $subkategoris = subkategori::all();
        $kategoriId = $request->input('kategori');
        $subkategoriId = $request->input('subkategori');

        // Dapatkan objek kategori berdasarkan ID
        $kategori = Kategori::findOrFail($kategoriId);

        // Dapatkan subkategoris berdasarkan kategori yang dipilih
        $subkategoriss = $kategori->subkategoris;

        // Lakukan filter berdasarkan kategori dan subkategori yang dipilih
        $produks = Produk::whereHas('subkategoris', function ($query) use ($subkategoriId) {
            $query->where('subkategori_id', $subkategoriId);
        })->get();

        return view('produk.filterproduk', compact('produks', 'kategoris', 'subkategoris', 'subkategoriss'));
    }
}
