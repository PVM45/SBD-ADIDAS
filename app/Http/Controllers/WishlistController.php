<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addProduct(Request $request, $produkId)
    {
        $produkId = $request->input('produk_id');

        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)
            ->where('produk_id', $produkId)
            ->first();

        if ($wishlist) {
            return redirect()->back()->with('error', 'Product already in wishlist.');
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = $user->id;
        $wishlist->produk_id = $produkId;
        $wishlist->save();

        return redirect()->back()->with('success', 'Product added to wishlist.');
    }

    public function removeProduct(Request $request, $produkId)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)
            ->where('produk_id', $produkId)
            ->first();

        if (!$wishlist) {
            return redirect()->back()->with('error', 'Product not found in wishlist.');
        }

        $wishlist->delete();

        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
    public function listWishList()
    {
        if(Auth::check()){
            $wishlists = Wishlist::with(['produk'])->where('user_id', Auth::id())->latest()->paginate(5);
        }else{
            $wishlists = [];
        }
        //return $wishlists;
        return view('frontend.frontend_layout.wishlist_page.wishlist_list', compact('wishlists'));
    }
}
