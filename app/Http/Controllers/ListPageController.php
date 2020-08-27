<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListPageController extends Controller
{
    public function index(){
        return view('front.list');
    }
}
