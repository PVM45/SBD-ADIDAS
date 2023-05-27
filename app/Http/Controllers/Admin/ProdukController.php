<?php

namespace App\Http\Controllers\Admin;
use App\Models\kategoris_subkategoris;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\produk;
use App\Models\kategori;
use App\Models\subkategori;

use App\Models\Productlog;
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
        $products = produk::paginate(10);;
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

            'product_color' => ['required', 'string'],
    'product_size' => ['required', 'string'],
    'product_price' => ['required', 'numeric'],
            'product_image_1' => 'required|image',
            'product_image_2' => 'required|image',
            'product_image_3' => 'required|image',
        ],[
            'product_color.string' => 'Warna produk harus berupa teks.',
            'product_size.string' => 'Ukuran produk harus berupa teks.',
            'product_price.numeric' => 'Harga produk harus berupa angka.',
        ]);

        // Save product to database
        $product = new produk;
        $product->id = $request->input('product_id');
        $product->nama_produk = $request->input('product_name');
        $product->id_kategori = $request->input('id_kategori');
        $product->id_subkategori = $request->input('id_sub_kategori');
        $product->deskripsi_produk = $request->input('product_description');

        $product->varian_warna = $request->input('product_color');
        $product->ukuran = $request->input('product_size');

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

        // Attach kategori dan subkategori menggunakan attach()
        $kategori_subkategori = new kategoris_subkategoris;
        $kategori_subkategori->kategori_id = $request->input('id_kategori');
        $kategori_subkategori->subkategori_id = $request->input('id_sub_kategori');
        $kategori_subkategori->produk_id = $product->id;
        $kategori_subkategori->save();

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
    $request->validate([
        'varian_warna' => ['required', 'string'],
        'ukuran' => ['required', 'string'],
        'harga_produk' => ['required', 'numeric'],
    ], [
        'varian_warna.string' => 'Warna produk harus berupa teks.',
        'ukuran.string' => 'Ukuran produk harus berupa teks.',
        'harga_produk.numeric' => 'Harga produk harus berupa angka.',
    ]);

    $product->nama_produk = $request->input('nama_produk');
    $product->id_kategori = $request->input('id_kategori');
    $product->id_subkategori = $request->input('id_subkategori');
    $product->deskripsi_produk = $request->input('deskripsi_produk');

    $product->varian_warna = $request->input('varian_warna');
    $product->ukuran = $request->input('ukuran');

    $product->harga_produk = $request->input('harga_produk');

    if ($request->hasFile('gambar_produk')) {
        Storage::delete($product->gambar_produk);
        $product_image_1 = $request->file('gambar_produk');
        $product_image_1_path = $product_image_1->store('public/products');
        $product->gambar_produk = str_replace('public/', '', $product_image_1_path);
    }

    if ($request->hasFile('gambar_produk_2')) {
        Storage::delete($product->gambar_produk_2);
        $product_image_2 = $request->file('gambar_produk_2');
        $product_image_2_path = $product_image_2->store('public/products');
        $product->gambar_produk_2 = str_replace('public/', '', $product_image_2_path);
    }

    if ($request->hasFile('gambar_produk_3')) {
        Storage::delete($product->gambar_produk_3);
        $product_image_3 = $request->file('gambar_produk_3');
        $product_image_3_path = $product_image_3->store('public/products');
        $product->gambar_produk_3 = str_replace('public/', '', $product_image_3_path);
    }

    $product->save();
    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diubah.');
}

public function destroy($id)
{
    $product = produk::find($id);
    if (!$product) {
        return redirect()->route('admin.products.index')->with('error', 'Produk tidak ditemukan.');
    }

    $kategori_subkategori = kategoris_subkategoris::where('produk_id', $id)->first();
    if (!$kategori_subkategori) {
        return redirect()->route('admin.products.index')->with('error', 'Data kategori dan subkategori tidak ditemukan.');
    }

    Storage::delete([$product->gambar_produk, $product->gambar_produk_2, $product->gambar_produk_3]);
    $product->delete();
    $kategori_subkategori->delete();

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
}


public function updatestok(Request $request, $id)
{
    $product = produk::findOrFail($id);
    $currentStok = $product->stok;
    $additionalStok = $request->stok;
    $newStok = $currentStok + $additionalStok;

    $product->stok = $newStok;

    // Jika stok habis, ubah status_produk menjadi false
    if ($request->stok >=1) {
        $product->status_produk = 'Tersedia';
    }
else {
    $product->status_produk = 'Tidak Tersedia';
}
    $product->save();
    $log = new ProductLog();
    $log->product_id = $product->id;
    $log->type = 'in';
    $log->quantity = $request->stok;
    $log->save();
    return redirect()->back()->with('success', 'Stok produk berhasil diperbarui.');
}
public function show()
{
    $products = produk::paginate(10);;

return view('layouts.admin.stock', compact('products'));
}
public function monitor()
    {
        $products = produk::join('product_logs', 'produks.id', '=', 'product_logs.product_id')
        ->where('product_logs.type', 'in')
        ->select('produks.id','produks.nama_produk', 'product_logs.quantity', 'product_logs.created_at')
        ->paginate(10);
        $produks = produk::join('product_logs', 'produks.id', '=', 'product_logs.product_id')
        ->where('product_logs.type', 'out')
        ->select('produks.id','produks.nama_produk', 'product_logs.quantity', 'product_logs.created_at')
        ->paginate(10);
        return view('layouts.admin.monitor', compact('products','produks'));
    }
}
