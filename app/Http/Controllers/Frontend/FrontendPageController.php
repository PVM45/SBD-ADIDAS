<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\produk;

class FrontendPageController extends Controller
{

    public function home()
    {
        $limit = Produk::latest()->take(3)->get();
        return view('frontend.index',compact('limit'));
    }

}
