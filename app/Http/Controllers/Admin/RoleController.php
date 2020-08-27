<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::with('permissions')->get();
        // dd($data[5]->permissions[0]->name);
        return view('admin.role.list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::all();
        return view('admin.role.create')->with('permission',$permission);
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
            'guard_name' => 'required',
            'permission' => 'required|array',
            'permission.*'=>'required|string',
        ],
        [
            'name.required'=>'Name field is required',
            'permission.required'=>'You must select permission',
            'permission.*.required'=>'You must select a permission',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        $role = Role::all()->last();
        
        foreach ($request->permission as $value) {
            $role->permissions()->attach($value);
        }
        return redirect('back\role')->with('status', "role created successfully");

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
        $target = Role::with('permissions')->find($id);
        $permission = Permission::get();
        return view('admin.role.edit')->with('target',$target)->with('permission',$permission);
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
        $validatedData = $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
            'permission' => 'required',
            'permission.*'=>'required',
        ],
        [
            'name.required'=>'Name field is required',
            'permission.required'=>'You must select permission',
            'permission.*.required'=>'You must select a permission',
        ]);

        $role =  Role::find($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();
        // DB::table('roles_permissions')->where('role_id',$id)->delete();
        $role->permissions()->detach();
        foreach ($request->permission as $value) {
            // DB::table('roles_permissions')->insert(['permission_id'=>$value,'role_id'=>$id]);
            $role->permissions()->attach($value);
        }
        return redirect('back\role')->with('status', "role updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Role::find($id);
        $target->delete();
        return redirect('back/role')->with('status', "Role deleted successfully");
    }
}
