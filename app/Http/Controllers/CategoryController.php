<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.createkategori');

    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect('/categories')->with('success', 'Kategori berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function indexx()
    {
        $categories = Category::all();

        return view('layouts.admin.viewkategori', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Category updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
