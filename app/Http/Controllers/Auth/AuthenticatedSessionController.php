<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kategori;
use App\Models\subkategori;
use App\Models\keranjang_belanja;
use app\Models\User;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $kategoris = kategori::all();

        $subkategoris = subkategori::all();

        return view('auth.login', compact('kategoris','subkategoris'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function store(LoginRequest $request)
    // {   
    //     $kategoris = kategori::all();

    //     $subkategoris = subkategori::all();

    //     $request->authenticate();

    //     $request->session()->regenerate();
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         // Temukan keranjang belanja sementara dalam session
    //         $cartItems = session()->get('cartItems', []);
    
    //         // Periksa apakah keranjang belanja sementara ada dalam session
    //         if (!empty($cartItems)) {
    //             // Pindahkan produk dari keranjang belanja sementara ke keranjang pengguna yang terkait
    //             foreach ($cartItems as $cartItem) {
    //                 $productId = $cartItem['product_id'];
    //                 $quantity = $cartItem['quantity'];
    
    //                 // Cek apakah produk sudah ada dalam keranjang pengguna
    //                 $existingCart = keranjang_belanja::where('user_id', auth()->user()->id)
    //                     ->where('produk_id', $productId)
    //                     ->first();
    
    //                 if ($existingCart) {
    //                     // Jika produk sudah ada dalam keranjang, tambahkan kuantitas
    //                     $existingCart->kuantitas += $quantity;
    //                     $existingCart->save();
    //                 } else {
    //                     // Jika produk belum ada dalam keranjang, buat entri baru
    //                     $cart = new keranjang_belanja;
    //                     $cart->produk_id = $productId;
    //                     $cart->kuantitas = $quantity;
    //                     $cart->user_id = auth()->user()->id;
    //                     $cart->save();
    //                 }
    //             }
    
    //             // Hapus keranjang belanja sementara dari session
    //             session()->forget('cartItems');
    //         }
    
    //         // Redirect ke halaman setelah login
    //         return redirect()->route('dashboard');
    //     } else {
    //         // Jika login gagal, kembalikan ke halaman login dengan pesan error
    //         return redirect()->route('login')->with('error', 'Login gagal.');
    //     }

    //     return redirect()->intended(RouteServiceProvider::home());
    // }

    public function store(LoginRequest $request)
{   
    $kategoris = Kategori::all();
    $subkategoris = Subkategori::all();
    
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // User authenticated successfully

        // Temukan keranjang belanja pengguna yang terkait
        $cartItems = keranjang_belanja::where('user_id', auth()->user()->id)->get();
        
        // Pindahkan produk dari keranjang belanja sementara ke keranjang pengguna yang terkait
        $temporaryCartItems = session()->get('cartItems', []);
        
        foreach ($temporaryCartItems as $temporaryCartItem) {
            $productId = $temporaryCartItem['produk_id'];
            $quantity = $temporaryCartItem['quantity'];

            // Cek apakah produk sudah ada dalam keranjang pengguna
            $existingCart = $cartItems->where('produk_id', $productId)->first();

            if ($existingCart) {
                // Jika produk sudah ada dalam keranjang, tambahkan kuantitas
                $existingCart->kuantitas += $quantity;
                $existingCart->save();
            } else {
                // Jika produk belum ada dalam keranjang, buat entri baru
                $cart = new keranjang_belanja;
                $cart->produk_id = $productId;
                $cart->kuantitas = $quantity;
                $cart->user_id = auth()->user()->id;
                $cart->save();
            }
        }

        // Hapus keranjang belanja sementara dari session
        session()->forget('cartItems');

        return redirect()->intended(RouteServiceProvider::home());
    } else {
        // Authentication failed
        return redirect()->route('login')->with('error', 'Login gagal.');
    }
    
    
}


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
