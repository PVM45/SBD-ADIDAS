<?php

namespace App\Http\Controllers;
use App\Models\keranjang_belanja;
use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\alamat;
use App\Models\user;
use App\Models\pembayaran;
use App\Models\produk_pesanan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\kategori;
use App\Models\subkategori;

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
    $kategoris = Kategori::all();
    $subkategoris = Subkategori::all();
    $cartItems = keranjang_belanja::where('user_id', auth()->user()->id)->get();
     return view('produk.cart', compact('cartItems', 'kategoris', 'subkategoris'));
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
    $kategoris = Kategori::all();
    $subkategoris = Subkategori::all();
    $user = Auth::user();
    $alamat = Alamat::where('user_id', auth()->user()->id)->get();
    $pembayarans = Pembayaran::all();

    $totalPrice = 0;


        foreach ($cartItems as $cart) {
            $totalPrice += $cart->produk->harga_produk * $cart->kuantitas;
        }

    return view('frontend.checkout_page.checkout', compact('cartItems', 'totalPrice', 'alamat','pembayarans','kategoris','subkategoris'));
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
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $kodePembayaran = '';

    $tanggalWaktu = Carbon::now();
    $formatTanggalWaktu = $tanggalWaktu->format('y-m-d-H:i');


    $totalPrice = 0;

    for ($i = 0; $i < 10; $i++) {
        $kodePembayaran .= $characters[rand(0, strlen($characters) - 1)];
    }

        foreach ($cartItems as $cart) {
            $totalPrice += $cart->produk->harga_produk * $cart->kuantitas;
        }

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

    $metodePembayaran = $request->input('metode_pembayaran');

        $pesanans = new pesanan;
        $pesanans->user_id = auth()->user()->id;
        $pesanans->alamat_id=$alamat->id;
        $pesanans->pembayaran_id=$metodePembayaran;
        $pesanans->total_pembayaran=$totalPrice;
        $pesanans->kode_pembayaran=$kodePembayaran;
        $pesanans->tanggal_transaksi=$formatTanggalWaktu;
        $pesanans->save();

        $totalHargaProduk = 0;

        foreach ($cartItems as $cart) {
            $totalHargaProduk += $cart->produk->harga_produk * $cart->kuantitas;

            $produk_pesanan = new produk_pesanan;
            $produk_pesanan->pesanan_id=$pesanans->id;
            $produk_pesanan->produk_id=$cart->produk->id;
            $produk_pesanan->kuantitas=$cart->kuantitas;

            $produk_pesanan->harga=$totalHargaProduk;
            $produk_pesanan->save();

        }
        keranjang_belanja::where('user_id', auth()->user()->id)->delete();
    // return redirect()->route('author.checkout.pembayaran', compact('cartItems','alamat'));

    return redirect()->route('author.checkout.receipt');
    //return redirect('frontend.checkout_page.receipt','com');

    //Hapus item-item keranjang belanja



}

public function receipt()
{
    $pesanan = Pesanan::where('user_id', auth()->user()->id)
        ->where('status_pesanan', 'belum_terkonfirmasi')
        ->get();

        $produk_pesanan = produk_pesanan::whereHas('pesanan', function ($query) use ($pesanan) {
            $query->whereIn('id', $pesanan->pluck('id'));
        })->get();




        return view('frontend.checkout_page.receipt', compact('pesanan','produk_pesanan'));
}

public function pilihanMetodePembayaran()
{

    // $cartItems = $request->cartItems;
    // $alamat = $request->alamat;

    $pembayarans = Pembayaran::all();

    return view('frontend.checkout_page.checkout_pembayaran', compact('pembayarans',));
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







