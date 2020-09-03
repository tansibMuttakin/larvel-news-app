<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use DB;

class HomePageController extends Controller
{
    public function index(){

        $top_viewed = Post::with('creator')->withCount('comments')->where('status',1)
        ->orderBy('view_count','DESC')->take(2)->get();

        $hot_news = Post::with('creator')->withCount('comments')->where('hot_news',1)
        ->where('status',1)->orderBy('id','DESC')->first();

        $category_post = Category::with('posts')->where([['status','=','1']])->orderBy('id',"DESC")->take(5)->get();

        return view('front.home')->with('hot_news',$hot_news)->with('top_viewed',$top_viewed)->with('category_post',$category_post);
    }
}
