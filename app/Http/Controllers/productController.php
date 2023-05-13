<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('layouts.author.produk', compact('produks'));
    }
}
