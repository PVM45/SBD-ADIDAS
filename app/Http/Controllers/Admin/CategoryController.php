<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;

class CategoryController extends Controller
{
  public function index()
{
  $categories = Category::all();

  return view('layouts.admin.viewkategori', compact('categories'));
}

public function create()
{
    return view('layouts.admin.addkategori');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|unique:categories|max:255',
        'id' => 'required|unique:categories|integer',
    ]);

    $category = new Category();
    $category->name = $validated['name'];
    $category->id = $validated['id'];
    $category->save();

    return redirect('/admin/categories')->with('success', 'Kategori berhasil ditambahkan!');
}
}