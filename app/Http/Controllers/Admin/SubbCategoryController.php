<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subkategori;

class SubbCategoryController extends Controller
{
    public function create()
    {
        return view('layouts.admin.addsubcategory');
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
    ]);

    $subcategory = new subkategori();
    $subcategory->nama_subkategori = $validated['nama_subkategori'];
    $subcategory->id = $validated['id'];
    $subcategory->save();

    return redirect('/admin/categories')->with('success', 'Sub Kategori berhasil ditambahkan!');
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
