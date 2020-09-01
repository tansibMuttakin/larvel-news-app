<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function index($id){
        $data = Comment::with('post')->where('post_id',$id)->orderBy('id','DESC')->get();
        return view('admin.comment.list')->with('data',$data);
    }

    public function reply($id){
        return view('admin.comment.reply')->with('id',$id);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'reply'=>'required',
            'post_id'=>'required',
        ]);
        $comment = new Comment;
        $comment->name = Auth::user()->name;
        $comment->comment = $request->reply;
        $comment->post_id = $request->post_id;
        $comment->status = 0;
        $comment->save();
        return redirect()->action('Admin\CommentController@index',$request->post_id)->with('status','replied successfully');
    }
    public function status($id)
    {
        $comment = Comment::find($id);
        if ($comment->status === 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }
        $comment->save();   
        return redirect()->action('Admin\CommentController@index',$comment->post_id)->with('status','Comment status changed');
    }
}
