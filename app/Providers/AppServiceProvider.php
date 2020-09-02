<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Setting;
use App\Category;
use App\User;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::all();
        $categories = Category::where('status',1)->get();
        $authors = User::where('type','!=',1)->get();
        $posts = Post::with(['creator','comments'])->where('status',1)->orderBy('view_count','DESC')->get();
        foreach($settings as $key=>$setting){
            if ($key==0) {
                $system_name = $setting->value;
            }
            else if ($key==1) {
                $favicon = $setting->value;
            }
            else if ($key==2) {
                $front_logo = $setting->value;
            }
            else if ($key==3) {
                $admin_logo = $setting->value;
            }
        }
        $shareData = array(
            'system_name' => $system_name,
            'favicon' => $favicon,
            'front_logo' => $front_logo,
            'admin_logo' => $admin_logo,
            'categories' => $categories,
            'authors' => $authors,
            'posts' => $posts,
        );
        View::share('shareData', $shareData);
    }
}
