<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kategori;
use App\Models\subkategori;

class OrderHistoryController extends Controller
{
    public function orderHistory()
    {   
        $kategoris = kategori::all();

        $subkategoris = subkategori::all();

        $pesanans = pesanan::where('user_id', Auth::id())->orderBy('id')->get();
        
        return view('frontend.order.order-history', compact('pesanans','kategoris','subkategoris'));
    }
}
