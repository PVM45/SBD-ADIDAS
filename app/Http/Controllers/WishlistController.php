<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addProduct(Request $request, $produkId)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)
            ->where('produk_id', $produkId)
            ->first();

        if ($wishlist) {
            return redirect()->back()->with('error', 'Product already in wishlist.');
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = $user->id;
        $wishlist->product_id = $produkId;
        $wishlist->save();

        return redirect()->back()->with('success', 'Product added to wishlist.');
    }

    public function removeProduct(Request $request, $produkId)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)
            ->where('product_id', $produkId)
            ->first();

        if (!$wishlist) {
            return redirect()->back()->with('error', 'Product not found in wishlist.');
        }

        $wishlist->delete();

        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}
