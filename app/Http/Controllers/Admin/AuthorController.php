<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Permission;
use DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('roles')->where('type',2)->get();
        return view('admin.author.list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::with('permissions')->get();
        return view('admin.author.create')->with('role',$role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|size:6',
            'role.*'=>'required',
        ],
        [
            'name.required'=>'Name field is required',
            'email.email'=>'Invalid email address',
            'email.unique'=>'This email already exixt',
            'password.size'=>'Your password must be 6 characters or more',
            'role.*.required'=>'role is required',
        ]);

        $author = new User;
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->type = 2;
        $author->save();

        $author = User::all()->last();
        
        foreach ($request->role as $value) {
            $data = json_decode($value,true);
            $author->roles()->attach($data['id']);
            foreach($data['permissions'] as $permission){

                $author->permissions()->attach($permission['id']);
            }

            // DB::table('users_permissions')->insert(['permission_id'=>$value,'user_id'=>$authorId]);
        }
        return redirect('back\author')->with('status', "author created successfully");
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
        $target = User::with('roles')->find($id);
        $role = Role::with('permissions')->get();
        return view('admin.author.edit')->with('target',$target)->with('role',$role);
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
        $author =  User::find($id);
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->save();
        
        // DB::table('users_roles')->where('user_id',$id)->delete();
        $author->roles()->detach();
        $author->permissions()->detach();

        foreach ($request->role as $value) {
            $data = json_decode($value,true);
            $author->roles()->attach($data['id']);
            foreach($data['permissions'] as $permission){

                $author->permissions()->attach($permission['id']);
            }
        }
        
        return redirect('back\author')->with('status', "author updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = User::where('id',$id);
        $target->delete();
        return redirect('back/author')->with('status', "author deleted successfully");
    }
}
