<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('layouts.admin.dashboard');
    }

    public function run() {
        return view ('layouts.admin.addkategori');
          }
    
}
