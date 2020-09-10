<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class DetailsPageController extends Controller
{
    public function index($slug){
        $posts = Post::with(['comments','creator','category'])->where('status',1)
        ->where('slug',$slug)->get();
        $post->view_count = $post->view_count + 1;
        $post->save();
        return view('front.details')->with('posts',$posts);
    }
}
