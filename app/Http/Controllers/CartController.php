<?php

namespace App\Http\Controllers;
use App\Models\keranjang_belanja;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'product_id' => 'required|exists:produks,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Buat entri baru dalam tabel keranjang
    $cart = new keranjang_belanja;
    $cart->produk_id = $validatedData['product_id'];
    $cart->kuantitas = $validatedData['quantity'];
    // Jika terkait dengan pengguna, set juga 'user_id'
    $cart->user_id = auth()->user()->id;
    $cart->save();



    // Redirect atau tampilkan pesan sukses
     return redirect()->back()->with('success', 'Komentar berhasil disimpan.');

}
public function showCart(){
    $cartItems = keranjang_belanja::where('user_id', auth()->user()->id)->get();
     return view('produk.cart', compact('cartItems'));
}

public function updateCart(Request $request)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'cart_id' => 'required|exists:keranjang_belanjas,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Temukan entri keranjang yang ingin diperbarui
    $cart = keranjang_belanja::findOrFail($validatedData['cart_id']);

    // Periksa apakah pengguna yang saat ini terautentikasi memiliki izin untuk memperbarui entri ini
    // Misalnya, jika item keranjang hanya bisa diperbarui oleh pemiliknya
    if ($cart->user_id != auth()->user()->id) {
        abort(403, 'Unauthorized action.');
    }

    // Perbarui kuantitas item
    $cart->kuantitas = $validatedData['quantity'];
    $cart->save();

    // Redirect atau tampilkan pesan sukses
    return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
}
public function removeFromCart(Request $request)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'cart_id' => 'required|exists:keranjang_belanjas,id',
    ]);

    // Temukan entri keranjang yang ingin dihapus
    $cart = keranjang_belanja::findOrFail($validatedData['cart_id']);

    // Periksa apakah pengguna yang saat ini terautentikasi memiliki izin untuk menghapus entri ini
    // Misalnya, jika item keranjang hanya bisa dihapus oleh pemiliknya
    if ($cart->user_id != auth()->user()->id) {
        abort(403, 'Unauthorized action.');
    }

    // Hapus entri keranjang
    $cart->delete();

    // Redirect atau tampilkan pesan sukses
}


}


