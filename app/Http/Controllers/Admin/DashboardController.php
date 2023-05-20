<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;

class DashboardController extends Controller
{
    public function index() {
        $jumlahProduk = produk::count();
        return view('layouts.admin.dashboard',compact('jumlahProduk'));
    }

    public function run() {
        return view ('layouts.admin.addkategori');
          }
    
}
