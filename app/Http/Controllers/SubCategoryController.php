<?php
    namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('layouts.admin.addsubcategory', compact('categories'));
    }
    public function index()
    {
        $subcategories = Subcategory::all();

        return view('layouts.admin.viewsubcategory', compact('subcategories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('categories.index')
                         ->with('success','Sub Category created successfully.');
    }
    public function destroy(SubCategory $subcategory)
{
    $subcategory->delete();
    return redirect()->back()->with('success', 'Sub kategori berhasil dihapus');
}
public function edit($id)
{
    $subCategory = SubCategory::findOrFail($id);
    $categories = Category::all();
    return view('layouts.admin.editsubcategory', compact('subCategory', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ]);

    $subCategory = SubCategory::findOrFail($id);
    $subCategory->name = $request->name;
    $subCategory->category_id = $request->category_id;
    $subCategory->save();

    return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
}
}


