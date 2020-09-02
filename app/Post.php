<?php

namespace App;
use App\User;
use App\Category;
use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function creator(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
