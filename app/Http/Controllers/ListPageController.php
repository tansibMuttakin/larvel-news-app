<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ListPageController extends Controller
{
    public function index(){
        return view('front.list');
    }

    public function listing($id){

        $posts = Post::with(['comments','creator','category'])->where('status',1)
        ->where('category_id',$id)->orWhere('created_by',$id)->orderBy('id','DESC')->paginate(3);

        return view('front.list')->with('posts',$posts);
    }
}
