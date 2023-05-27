<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;

class CategoryController extends Controller
{
  public function index()
{
  $categories = kategori::all();

  return view('layouts.admin.viewkategori', compact('categories'));
}

public function create()
{
    return view('layouts.admin.createkategori');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'nama_kategori' => 'required|max:255',
        'id' => 'required|unique:kategoris|integer',
    ]);

    $category = new Kategori();
    $category->nama_kategori = $validated['nama_kategori'];
    $category->id = $validated['id'];
    $category->save();

    return redirect('/admin/categories')->with('success', 'Kategori berhasil ditambahkan!');
}
public function update(Request $request, $id)
{
    $category = kategori::findOrFail($id);
    $category->nama_kategori = $request->name;
    $category->save();
    return redirect()->back()->with('success', 'Category updated successfully');
}
/**
 * Remove the specified resource from storage.
 */
public function destroy( $id)
{
    $category = kategori::findOrFail($id);
    $category->delete();
    return redirect()->back()->with('success', 'Category deleted successfully');
}
}