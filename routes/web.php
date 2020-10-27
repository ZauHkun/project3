<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/',function(){    
    
//     return view('welcome');
    
// });
Route::group(array('namespace'=>'postcreator','middleware'=>'auth'),function(){
    Route::get('/','PostController@index');
});

Route::get('user/register','Auth\RegisterController@show');
Route::post('user/register','Auth\RegisterController@register');

Route::get('user/logout','Auth\LoginController@logout');

Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');

Route::post('comment/create','CommentController@store');

Route::group(array('middleware'=>'auth'),function(){
    Route::get('/dashboard','HomeController@index');
});

Route::group(array('prefix'=>'admin','namespace'=>'admin','middleware'=>'manager'),function(){
    Route::get('/','AdminController@index');

    Route::get('user','UserController@index');
    Route::get('user/{id}/edit','UserController@edit');
    Route::post('user/{id}/edit','UserController@update');

    Route::get('role','RoleController@index');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@store');

    Route::get('category','CategoryController@index');
    Route::get('category/create','CategoryController@create');
    Route::post('category/create','CategoryController@store');
    Route::get('category/{id}/edit','CategoryController@edit');
    Route::post('category/{id}/edit','CategoryController@update');
});

Route::group(array('prefix'=>'postcreator','namespace'=>'postcreator','middleware'=>'auth'),function(){

   // Route::get('/','PostController@index');
    Route::get('post/{id}/view','PostController@show');

    Route::get('post/create','PostController@create');
    Route::post('post/create','PostController@store');
    Route::get('post/{id}/edit','PostController@edit');
    Route::post('post/{id}/edit','PostController@update');    
});

Route::group(array('prefix'=>'admin','namespace'=>'admin','middleware'=>'auth'),function(){
    Route::get('spliter','SpliterController@index');
    Route::get('spliter/create','SpliterController@create');
    Route::post('spliter/create','SpliterController@store');
    Route::get('spliter/{id}/edit','SpliterController@edit');
    Route::post('spliter/{id}/edit','SpliterController@update');

    Route::get('customer','CustomerController@index');
    Route::get('customer/create','CustomerController@create');
    Route::post('customer/create','CustomerController@store');
    Route::get('customer/{id}/edit','CustomerController@edit');
    Route::post('customer/{id}/edit','CustomerController@update');
    Route::get('due/customer','CustomerController@due');
    Route::get('active/customer','CustomerController@active');
    Route::get('all/customer','CustomerController@all');
    
    Route::get('plan','PaymentplanController@index');
    Route::get('plan/create','PaymentplanController@create');
    Route::post('plan/create','PaymentplanController@store');
    Route::get('plan/{id}/edit','PaymentplanController@edit');
    Route::post('plan/{id}/edit','PaymentplanController@update');

    Route::get('installation','InstallationController@index');
    Route::get('installation/create','InstallationController@create');
    Route::post('installation/create','InstallationController@store');
    Route::get('installation/{id}/edit','InstallationController@edit');
    Route::post('installation/{id}/edit','InstallationController@update');

    Route::get('test','InstallationController@test');
    Route::get('data','InstallationController@data');
});