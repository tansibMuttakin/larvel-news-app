<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::find(1);
        $system_name = $setting->value;
        return view('admin.settings.update')->with('system_name',$system_name);
    }

    public function update(Request $request){
        $validateData = $request->validate([
            'name'=>'required',
        ]);

        $favicon = Setting::find(2);
        if ($request->hasFile('favicon')) {
            if(file_exists(public_path('others/'.$favicon->value))){
                unlink(public_path('others/'.$favicon->value));  
            }
            $file = $request->file('favicon');
            $extension = $file->getClientOriginalExtension();
            $favicon_img = 'favicon.'.$extension;
            $file->move(public_path('others/'),$favicon_img);
            $favicon->value = $favicon_img;
            $favicon->save();
        }

        $front_logo = Setting::find(3);
        if ($request->hasFile('front_logo')) {
            if(file_exists(public_path('others/'.$front_logo->value))){
                unlink(public_path('others/'.$front_logo->value));  
            }
            $file = $request->file('front_logo');
            $extension = $file->getClientOriginalExtension();
            $front_logo_img = 'front_logo.'.$extension;
            $file->move(public_path('others/'),$front_logo_img);
            $front_logo->value = $front_logo_img;
            $front_logo->save();
        }

        $admin_logo = Setting::find(4);
        if ($request->hasFile('admin_logo')) {
            if(file_exists(public_path('others/'.$admin_logo->value))){
                unlink(public_path('others/'.$admin_logo->value));  
            }
            $file = $request->file('admin_logo');
            $extension = $file->getClientOriginalExtension();
            $admin_logo_img = 'admin_logo.'.$extension;
            $file->move(public_path('others/'),$admin_logo_img);
            $admin_logo->value = $admin_logo_img;
            $admin_logo->save();
        }
        $system_name = Setting::find(1);
        $system_name->value = $request->name;
        $system_name->save();
        return redirect()->back()->with('status','Settings updated successfully');
    }
}
