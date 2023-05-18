<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subkategori;
use App\Models\kategori;

class SubbCategoryController extends Controller
{
    public function create()
    {
        $categories = kategori::all();
        return view('layouts.admin.addsubcategory',compact('categories'));
    }
    public function index()
    {
        $subcategories = subkategori::all();
        return view('layouts.admin.viewsubcategory', compact('subcategories'));
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_subkategori' => 'required|unique:subkategoris|max:255',
        'id' => 'required|unique:subkategoris|integer',
        'category_id' => 'required|exists:kategoris,id'
    ]);

    $subcategory = new subkategori();
    $subcategory->nama_subkategori = $validated['nama_subkategori'];
    $subcategory->id = $validated['id'];
    $subcategory->id_kategori = $validated['category_id'];
    $subcategory->save();

    return redirect('/admin/subcategories')->with('success', 'Sub Kategori berhasil ditambahkan!');
}
    public function destroy(subkategori $subcategory)
{
    $subcategory->delete();
    return redirect()->back()->with('success', 'Sub kategori berhasil dihapus');
}

public function update(Request $request, $id)
{
    $subcategory = subkategori::findOrFail($id);
    $subcategory->nama_subkategori = $request->name;
    $subcategory->save();
    return redirect()->back()->with('success', 'Category updated successfully');
}
}
