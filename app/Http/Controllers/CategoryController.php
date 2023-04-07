<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $categories = category::all();
        return view('pages.admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name',
        ]);

        $category = category::create($validatedData);
        return redirect()->route('admin.categories.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = category::find($id);
        return view('pages.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,',
        ]);

        $category = category::find($id);
        $category->name = $request->name;

        $category->save();

        // $validatedData = $request->validate([
        //     ' . $category->id,
        // ]);

        // $category->update($validatedData);
        return redirect()->route('admin.categories.list')->with('success', "This category is edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.list')->with('success', "This category is deleted successfully");
    }
}
