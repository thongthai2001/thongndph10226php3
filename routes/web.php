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
})->name('admin.users.index');
//tra ve giao dien

Route::view('admin/users/create', '/admin/users/create') ->name('admin.users.create');

Route::post('admin/users/store', function(){
    return redirect()->route('admin.users.index');
})->name('admin.users.store');

Route::get('admin/users/edit/{id}', function ($id){
   $data = DB::table('users')->find($id);

return view('admin.users.edit', [
    'data' => $data,
]);
})->name('admin.users.edit');

Route::post('admin/users/update/{id}', function (){
//nhap du lieu va luu vao db
})->name('admin.users.update');

Route::post('admin/users/delete/{id}', function (){
    //xoa du lieu theo id
    return redirect()->route('admin.users.index');
    })->name('admin.users.delete');
