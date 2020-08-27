<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('admin.category.list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required',
        ],[
            'name.required'=>'name is required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->status = 1;
        $category->save();
        return redirect('back/category')->with('status','Category created successfully');
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
        $target = Category::find($id);
        return view('admin.category.edit')->with('target',$target);
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
        $validateData = $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'name is required',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('back/category')->with('status','Category updated successfully');
    }

    public function status($id)
    {
        $category = Category::find($id);
        if ($category->status === 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->save();   
        return redirect('back/category')->with('status','Category status changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Category::find($id);
        $target->delete();
        return redirect('back/category')->with('status','Category deleted successfully');
    }

}
