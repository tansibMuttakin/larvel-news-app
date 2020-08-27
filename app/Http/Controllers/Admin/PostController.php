<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image,Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type === 1) {
            $data = Post::with('creator')->orderBy('id','DESC')->get();
        } else {
            $data = Post::with('creator')->orderBywhere('id',Auth::id())->orderBy('id','DESC')->get();
        }
        return view('admin.post.list')->with('data',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('admin.post.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title, '-');
        $post->category_id = $request->category_id;
        $post->main_img = '';
        $post->thumb_img = '';
        $post->list_img = '';
        $post->view_count = 0;
        $post->hot_news = 0;
        $post->status = 1;
        $post->created_by = Auth::id();
        $post->save();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $post = Post::get()->last();
            $main_img = 'post_main_'.$post->id.'.'.$extension;
            $thumb_img = 'post_thumb_'.$post->id.'.'.$extension;
            $list_img = 'post_list_'.$post->id.'.'.$extension;
            Image::make($file)->resize(653,569)->save(public_path('post/'.$main_img));
            Image::make($file)->resize(360,309)->save(public_path('post/'.$list_img));
            Image::make($file)->resize(122,122)->save(public_path('post/'.$thumb_img));
            $post->main_img = $main_img;
            $post->thumb_img = $thumb_img;
            $post->list_img = $list_img;
            $post->save();
        }
        return redirect()->action('Admin\PostController@index')->with('status','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
