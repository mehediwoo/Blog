<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\tag;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id','DESC')->paginate(20);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag  = tag::all();
        $cate = Category::all();
        return view('admin.post.create', compact(['tag', 'cate']));
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
            'postTitle' => 'required',
            'postCategory' => 'required',
            // 'postCoverPhoto' => 'required',
            'description' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->input('postTitle');
        $post->slug = $request->input('postTitle');
        $post->description = $request->input('description');
        $post->cate_name = $request->input('postCategory');
        $post->user_id = 1;
        $post->publish_at = Carbon::NOW();
        // $post->tags()->attach($request->allTags);

        if ($request->hasFile('postCoverPhoto')) {
            $image     = $request->file('postCoverPhoto');
            $ext       = $image->extension();
            $fileName  =time().'.'.$ext;
            $image->move('admin/post', $fileName);
            $post->image = 'admin/post/'.$fileName;
        }
        $post->save();
        return redirect()->back()->with('msg','Post Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates= Category::all();
        $edit = Post::find($id);
        return view('admin.post.edit', compact(['edit','cates']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'postTitle' => 'required',
            'postCategory' => 'required',
            // 'postCoverPhoto' => 'required',
            'description' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->input('postTitle');
        $post->slug = $request->input('postTitle');
        $post->description = $request->input('description');
        $post->cate_id = $request->input('postCategory');
        $post->user_id = 1;
        $post->publish_at = Carbon::NOW();
        if ($request->hasFile('postCoverPhoto')) {
            unlink($post->image);
            $image     = $request->file('postCoverPhoto');
            $ext       = $image->extension();
            $fileName  =time().'.'.$ext;
            $image->move('admin/post', $fileName);
            $post->image = 'admin/post/'.$fileName;


        }
        $post->update();
        return redirect()->back()->with('msg','Post Updated  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (file_exists($post->image)) {
            unlink($post->image);
        }

        $post->delete();
        return redirect()->back()->with('msg','Post Delete Successfully');
    }
}
