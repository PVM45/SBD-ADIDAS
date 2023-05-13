<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {
            $categories = Category::all();
            $subCategories = SubCategory::all();
        
            return view('layouts.admin.addproduct', compact('categories', 'subCategories'));
        }
        
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
    
        $product->nama_produk = $request->input('nama_produk');
        $product->id_kategori = $request->input('id_kategori');
        $product->id_sub_kategori = $request->input('id_sub_kategori');
        $product->deskripsi = $request->input('deskripsi');
        $product->warna = $request->input('warna');
        $product->ukuran = $request->input('ukuran');
        $product->stok = $request->input('stok');
        $product->harga_produk = $request->input('harga_produk');
        
        // Simpan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);
            $product->gambar = $fileName;
        }
    
        $product->save();
    
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
