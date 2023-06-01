<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\subkategori;
class DashboardController extends Controller
{
    public function index() {
        return view('layouts.author.dashboard');
    }
    public function leo() {
        $kategoris=kategori::all();
        $subkategoris=subkategori::all();
        return view('term_policy',compact('kategoris','subkategoris'));
    }
}
