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

// <?php

// namespace App;
// use App\User;
// use App\Category;
// use App\Comment;

// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
// {
//     public function creator(){
//         return $this->belongsTo(User::class,'created_by','id');
//     }
//     public function category(){
//         return $this->belongsTo(Category::class,'category_id','id');
//     }
//     public function comments(){
//         return $this->hasMany(Comment::class,'post_id','id');
//     }
// }

// Schema::create('posts', function (Blueprint $table) {
//     $table->id();
//     $table->string('title');
//     $table->longText('short_description');
//     $table->longText('description');
//     $table->string('slug');
//     $table->unsignedBigInteger('category_id');
//     $table->string('main_img');
//     $table->string('thumb_img');
//     $table->string('list_img');
//     $table->integer('view_count');
//     $table->integer('hot_news');
//     $table->integer('status');
//     $table->integer('created_by');
//     $table->timestamps();

//     $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
// });