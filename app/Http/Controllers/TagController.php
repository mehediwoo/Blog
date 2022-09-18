<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = tag::OrderBy('id','DESC')->paginate(20);
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tagName' => 'required|unique:tags,name|max:30',
        ]);

        $tags = new tag;
        $tags->name   = $request->tagName;
        $tags->slug   = $request->tagName;
        $tags->desc   = $request->tagDesc;
        $tags->save();
        return redirect()->back()->with('msg','Tag Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = tag::find($id);
        return view('admin.tag.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tagName' => 'required|unique:tags,name|max:30',
        ]);

        $tags = tag::find($id);
        $tags->name   = $request->tagName;
        $tags->slug   = $request->tagName;
        $tags->desc   = $request->description;
        $tags->update();
        return redirect()->back()->with('msg','Successfully Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = tag::find($id);
        $tags->delete();
        return redirect()->back()->with('msg','Successfully Deleted');
    }
}
