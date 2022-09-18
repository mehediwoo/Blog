<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catData = Category::orderBy('created_at','DESC')->paginate(20);
        return view('admin.category.show',compact('catData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categoryName' => ['required', 'unique:categories,name', 'max:35'],
        ]);
        $category = new Category();
        $category->name         = $request->categoryName;
        $category->slug         = $request->categoryName;
        $category->description  = $request->description;

        $category->save();
        return redirect()->back()->with('msg','Category Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        return view('admin.category.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $cate = Category::find($id);

        $cate->name         = $request->categoryName;
        $cate->slug         = $request->categoryName;
        $cate->description  = $request->description;

        $cate->update();
        return redirect('/categoris')->with('msg','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $delete = Category::find($id);
        $delete->delete();
        return redirect()->back()->with('msg','Category Delete Successfully');
    }
}
