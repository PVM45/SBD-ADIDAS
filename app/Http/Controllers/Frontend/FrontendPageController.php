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

class FrontendPageController extends Controller
{
<<<<<<< HEAD
    public function home(){
        return view('frontend.index');
    }
    
    public function admin(){
        return view('admin.index');
    }
    public function product(){
        return view('frontend.product_page.product');
    }
}


=======
    public function home()
    {
        return view('frontend.index');
    }
    public function admin()
    {
        return view('admin.index');
    }
}
>>>>>>> 4748808c827061a3c878b919e507ddf37effe2cf
