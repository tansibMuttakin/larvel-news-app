<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    public function posts(){
        return $this->hasMany(Post::class,'category_id','id');
    }
}
