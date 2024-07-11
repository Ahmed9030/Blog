<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategotyiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name'        => "required",
            'description' => "required"
        ]);

        $category = new Category;

        $category->name        = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->back()->with("success" , "Category added successflly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit' ,compact("category"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request , [
            'name'        => "required",
            'description' => "required"
        ]);

        $category->name        = $request->name;
        $category->description = $request->description;

        $category->update();

        return redirect()->back()->with("success" , "Category updated successflly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with("success" , "Category deleted successflly");
    }
}
