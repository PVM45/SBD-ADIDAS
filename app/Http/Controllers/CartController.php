<?php

namespace App\Http\Controllers;
use App\Models\keranjang_belanja;
use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\alamat;
use App\Models\user;
use App\Models\pembayaran;
use Illuminate\Support\Facades\Auth;

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
public function ShowCheckout() {
    
    $cartItems = keranjang_belanja::where('user_id', auth()->user()->id)->get();

    $user = Auth::user();
    $alamat = Alamat::where('user_id', auth()->user()->id)->get();

    $totalPrice = 0;


        foreach ($cartItems as $cart) {
            $totalPrice += $cart->produk->harga_produk * $cart->kuantitas;
        }

    return view('frontend.checkout_page.checkout', compact('cartItems', 'totalPrice', 'alamat'));
}

public function processCheckout(Request $request)
{
    
    // Validasi data yang diterima dari formulir checkout
    $validatedData = $request->validate([
        'PilihanAlamat' => 'required|in:existing,new',
        'existingAlamat' => 'required_if:PilihanAlamat,existing',
        'newAlamat' => 'required_if:PilihanAlamat,new',
    ]);

    $cartItems = keranjang_belanja::where('user_id', auth()->user()->id)->get();

    // $PilihanAlamat = $request->input('PilihanAlamat');

    if ($request->PilihanAlamat == 'existing') {
        $alamat = Alamat::find($request->existingAlamat);
        // $alamatTujuan = $request->input('alamat');

    } else {
        $alamat = new Alamat;
        $alamat->user_id = auth()->user()->id;
        $alamat->alamat = $request->newAlamat;
        $alamat->save();


    }

    // return redirect()->route('author.checkout.pembayaran', compact('cartItems','alamat'));

    return view('frontend.checkout_page.checkout', compact('alamat','cartItems'));

    // Hapus item-item keranjang belanja
//    keranjang_belanja::where('user_id', auth()->user()->id)->delete();


}

public function pilihanMetodePembayaran(Request $request,)
{   
    $request->validate([
        'address_option' => 'required|in:existing,new',
        'existing_address' => 'required_if:address_option,existing|exists:alamats,id',
        'new_address' => 'required_if:address_option,new',
    ]);

    $cartItems = $request->cartItems;
    $alamat = $request->alamat;

    $pembayarans = Pembayaran::all();

    return view('frontend.checkout_page.checkout_pembayaran', compact('pembayarans','alamat','cartItems'));
}

public function prosesPilihanMetodePembayaran(Request $request)
{
    // Ambil data dari form
    $metodePembayaran = $request->input('metode_pembayaran');

    // Lakukan operasi yang diperlukan berdasarkan pilihan metode pembayaran


    // Kembali ke halaman yang sesuai setelah proses selesai
    return view('halaman_sukses');
}

}







