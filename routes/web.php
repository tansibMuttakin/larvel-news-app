<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomePageController@index');
Route::get('/list', 'ListPageController@index');
Route::get('/details', 'DetailsPageController@index');


Route::get('/adminPanel', function () {
    return view('admin.layout.master');
});
Route::prefix('back')->middleware('auth')->group(function () {
    Route::get('/','Admin\DashboardController@index');

    Route::get('/category','Admin\CategoryController@index');
    Route::get('/category/create','Admin\CategoryController@create');
    Route::post('/category/store','Admin\CategoryController@store');
    Route::get('/category/status/{id}','Admin\CategoryController@status');
    Route::get('/category/edit/{id}','Admin\CategoryController@edit');
    Route::post('/category/update/{id}','Admin\CategoryController@update');
    Route::get('/category/delete/{id}','Admin\CategoryController@destroy');

    Route::get('/permission/create','Admin\PermissionController@create');
    Route::post('/permission/store','Admin\PermissionController@store');
    Route::get('/permission','Admin\PermissionController@index');

    Route::get('/permission/edit/{id}','Admin\PermissionController@edit');
    Route::post('/permission/update/{id}','Admin\PermissionController@update');
    Route::get('/permission/delete/{id}','Admin\PermissionController@destroy');

    Route::get('/role','Admin\RoleController@index');
    Route::get('/role/create','Admin\RoleController@create');
    Route::post('/role/store','Admin\RoleController@store');
    Route::post('/role/update/{id}','Admin\RoleController@update');
    Route::get('/role/edit/{id}','Admin\RoleController@edit');
    Route::get('/role/delete/{id}','Admin\RoleController@destroy');

    Route::get('/author','Admin\AuthorController@index');
    Route::get('/author/create','Admin\AuthorController@create');
    Route::post('/author/store','Admin\AuthorController@store');
    Route::post('/author/update/{id}','Admin\AuthorController@update');
    Route::get('/author/edit/{id}','Admin\AuthorController@edit');
    Route::get('/author/delete/{id}','Admin\AuthorController@destroy');

    Route::get('/post','Admin\PostController@index');
    Route::get('/post/create','Admin\PostController@create');
    Route::post('/post/store','Admin\PostController@store');
    Route::post('/post/update/{id}','Admin\PostController@update');
    Route::get('/post/edit/{id}','Admin\PostController@edit');
    Route::get('/post/delete/{id}','Admin\PostController@destroy');

    


});
// Route::get('/about','AboutController@index');
// Route::get('/back','DashboardController@index');


Route::get('/about', function(){
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');