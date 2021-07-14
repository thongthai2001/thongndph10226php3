<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users', function (){
   $listUser = DB::table('users')->get();
    // dd($listUser); 
    return view('admin/users/index', [
        'data' => $listUser,
    ]);
});

Route::view('/admin/users/create', '/admin/users/create');

Route::post('/users', function(){
    dd($_REQUEST);
});

route::view('/layout', 'layout');
