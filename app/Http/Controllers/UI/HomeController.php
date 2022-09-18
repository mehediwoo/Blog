<?php

namespace App\Http\Controllers\UI;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::OrderBy('id','DESC')->paginate(9);

        $top   = Post::OrderBy('id','DESC')->get();
        $first = $top->splice(0,2);
        $middle= $top->splice(3,1);
        $third = $top->splice(4,2);

        $footer= Post::inRandomOrder()->get();
        $top   = $footer->splice(6,1);
        $bottom= $footer->splice(6,2);
        $right = $footer->splice(0,1);
        return view('ui.home', compact(['post','first','third','middle','top','bottom','right']));
    }
    public function readMorePost($id)
    {
        $single = Post::find($id);
        return view('ui.single', compact('single'));
    }
}
