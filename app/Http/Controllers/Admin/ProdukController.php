<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\produk;
use App\Models\kategori;
use App\Models\subkategori;
class ProdukController extends Controller
{
    public function create()
    {
        $categories = kategori::all();
        $subcategories = subkategori::all();
        return view('layouts.admin.addproduct', compact('categories', 'subcategories'));
    }
    public function index()
    {
        $products = produk::all();
//         $imageUrls = [];
// foreach ($products as $product) {
//     $imageUrls[] = Storage::url($product->gambar_produk);
// }
return view('layouts.admin.viewproduk', compact('products'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'product_id' => 'required',
            'product_name' => 'required',
            'id_kategori' => 'required',
            'id_sub_kategori' => 'required',
            'product_description' => 'required',
            'product_stock' => 'required',
            'product_color' => 'required',
            'product_size' => 'required',
            'product_status' => 'required',
            'product_price' => 'required',
            'product_image_1' => 'required|image',
            'product_image_2' => 'required|image',
            'product_image_3' => 'required|image',
        ]);
    
        // Save product to database
        $product = new produk;
        $product->id = $request->input('product_id');
        $product->nama_produk = $request->input('product_name');
        $product->id_kategori = $request->input('id_kategori');
        $product->id_subkategori = $request->input('id_sub_kategori');
        $product->deskripsi_produk = $request->input('product_description');
        $product->stok = $request->input('product_stock');
        $product->varian_warna = $request->input('product_color');
        $product->ukuran = $request->input('product_size');
        $product->status_produk = $request->input('product_status');
        $product->harga_produk = $request->input('product_price');
    
        // Handle image uploads
        $product_image_1 = $request->file('product_image_1');
        $product_image_2 = $request->file('product_image_2');
        $product_image_3 = $request->file('product_image_3');
    
        $product_image_1_path = $product_image_1->store('public/products');
        $product_image_2_path = $product_image_2->store('public/products');
        $product_image_3_path = $product_image_3->store('public/products');
    
        $product->gambar_produk = str_replace('public/', '', $product_image_1_path);
        $product->gambar_produk_2 = str_replace('public/', '', $product_image_2_path);
        $product->gambar_produk_3 = str_replace('public/', '', $product_image_3_path);
    
        $product->save();
    
        // Redirect to products index with success message
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }
    public function edit($id)
{
    $product = produk::find($id);
    $categories = kategori::all();
    $subcategories = subkategori::all();
    return view('layouts.admin.editproduk', compact('product','categories','subcategories'));
}

public function update(Request $request, $id)
{
    $product = produk::find($id);
    $product->nama_produk = $request->input('nama_produk');
    $product->id_kategori = $request->input('id_kategori');
    $product->id_subkategori = $request->input('id_subkategori');
    $product->deskripsi_produk = $request->input('deskripsi_produk');
    $product->stok = $request->input('stok');
    $product->varian_warna = $request->input('varian_warna');
    $product->ukuran = $request->input('ukuran');
    $product->status_produk = $request->input('status_produk');
    $product->harga_produk = $request->input('harga_produk');
    
    if ($request->hasFile('gambar_produk')) {
        Storage::delete($product->gambar_produk);
        $product->gambar_produk = $request->file('gambar_produk')->store('public');
    }
    
    if ($request->hasFile('gambar_produk_2')) {
        Storage::delete($product->gambar_produk_2);
        $product->gambar_produk_2 = $request->file('gambar_produk_2')->store('public');
    }
    
    if ($request->hasFile('gambar_produk_3')) {
        Storage::delete($product->gambar_produk_3);
        $product->gambar_produk_3 = $request->file('gambar_produk_3')->store('public');
    }
    
    $product->save();
    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diubah.');
}

public function destroy($id)
{
    $product = produk::find($id);
    Storage::delete([$product->gambar_produk, $product->gambar_produk_2, $product->gambar_produk_3]);
    $product->delete();
    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
}

}
