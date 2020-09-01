<?php

namespace App;
use App\User;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function creator(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
