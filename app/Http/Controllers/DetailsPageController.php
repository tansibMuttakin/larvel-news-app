<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class DetailsPageController extends Controller
{
    public function index($slug){
        $post = Post::with(['comments','creator','category'])->where('status',1)
        ->where('slug',$slug)->first();
        // $post->view_count = $post->view_count + 1;
        // $post->save();

        $related_post = Post::with(['comments','creator','category'])->where('status',1)
        ->where('category_id',$post->category_id)->where('id','!=',$post->id)->limit(4)->get();
        return view('front.details')->with('post',$post)->with('related_post',$related_post);
    }

    public function comment(Request $request){
        $valiadteDta = $request->validate(
            [
                'comment'=>'required',
                'id'=>'required',
                'name'=>'required'
            ]
        );
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->post_id = $request->id;
        $comment->status = 0;
        $comment->save();

        return redirect()->back();
    }
}
