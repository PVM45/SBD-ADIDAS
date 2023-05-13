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
        $request->validate([
            'name' => 'required',
         
        ]);

        subkategori::create([
            'name' => $request->nama_subkategori,
           
           
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success','Sub Category created successfully.');
    }
    public function destroy(subkategori $subcategory)
{
    $subcategory->delete();
    return redirect()->back()->with('success', 'Sub kategori berhasil dihapus');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $subCategory = subkategori::findOrFail($id);
    $subCategory->name = $request->nama_subkategori;
    $subCategory->save();

    return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
}
}
