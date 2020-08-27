<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function creator(){
        return $this->belongsTo(User::class,'created_by','id');
    }
}
