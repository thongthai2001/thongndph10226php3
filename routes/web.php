<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Controllers\Admin\UserController;
use App\Controllers\Admin\ProductController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Auth\LoginController;

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

Route::get('/', 'AdminController@index')->name('welcome');


Route::get('login', 'Auth\LoginController@getLoginForm')->name('auth.getLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');
Route::get('detail/{id}', 'AdminController@detail')->name('detail');

// Route::group([
//     'middleware' => ['check_login'],
// ], function(){
   
// });


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    // 'middleware' => [ 'check_admin' ],
], function () {
    Route::group([
        'prefix' => 'user',
        'as' => 'users.',
        
    ], function (){
    Route::get('/', 'UserController@index')->name('index');
    Route::get('create', 'UserController@create')->name('create');
    Route::get('/{id}', 'UserController@show')->name('show');
    Route::post('store', 'UserController@store')->name('store');
    Route::get('edit/{id}', 'UserController@edit')->name('edit');
    Route::post('update/{id}', 'UserController@update')->name('update');
    Route::post('delete/{id}', 'UserController@delete')->name('delete');
    });

    Route::group([
        'prefix' => 'product',
        'as' => 'products.'
    ], function (){
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('create', 'ProductController@create')->name('create');
    Route::post('store', 'ProductController@store')->name('store');
    Route::get('/{id}', 'ProductController@show')->name('show');
    Route::get('edit/{id}', 'ProductController@edit')->name('edit');
    Route::post('update/{id}', 'ProductController@update')->name('update');
    Route::post('delete/{id}', 'ProductController@delete')->name('delete');
    });

    Route::group([
        'prefix' => 'category',
        'as' => 'categories.'
    ], function (){
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('create', 'CategoryController@create')->name('create');
    Route::post('store', 'CategoryController@store')->name('store');
    Route::get('/{id}', 'CategoryController@show')->name('show');
    Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
    Route::post('update/{id}', 'CategoryController@update')->name('update');
    Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
    });

});







