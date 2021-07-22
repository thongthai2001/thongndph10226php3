<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Controllers\Admin\UserController;

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

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function () {
    Route::group([
        'prefig' => 'user',
        'as' => 'users.'
    ], function (){
    Route::get('/', 'UserController@index')->name('index');
    Route::get('create', 'UserController@create')->name('create');
    Route::post('store', 'UserController@store')->name('store');
    Route::get('edit/{id}', 'UserController@edit')->name('edit');
    Route::post('update/{id}', 'UserController@update')->name('update');
    Route::post('delete/{id}', 'UserController@delete')->name('delete');
    });

});


// //tra ve giao dien

// Route ->name('admin.users.create');

// Route::post('admin/users/store', function(){
//     // request()->all(): lấy toàn bộ dữ liêu gửi lên
  
// })->name('admin.users.store');

// Route::get('admin/users/edit/{id}', function ($id){
  
// ]);
// })->name('admin.users.edit');

// Route::post('admin/users/update/{id}', function ($id){
// //nhap du lieu va luu vao db
    
// })->name('admin.users.update');

// Route::post('admin/users/delete/{id}', function ($id){
//     //xoa du lieu theo id
   
//     })->name('admin.users.delete');



// Route::get('/admin/products', function (){
//                 $productUser = Product::all();
//             return view('admin/products/index', [
//                 'data' => $productUser,
//             ]);
//         })->name('admin.products.index');


//         Route::view('admin/products/create', '/admin/products/create') ->name('admin.products.create');

//         Route::post('admin/products/store', function(){
//             // request()->all(): lấy toàn bộ dữ liêu gửi lên
//             $data = request()->except('_token');
//             $result = Product::create($data);
        
//             return redirect()->route('admin.products.index');
//         })->name('admin.products.store');

//         Route::get('admin/products/edit/{id}', function ($id){
//             $data = Product::find($id);
         
//          return view('admin.products.edit', [
//              'data' => $data,
//          ]);
//          })->name('admin.products.edit');

//          Route::post('admin/products/update/{id}', function ($id){
//             //nhap du lieu va luu vao db
//                 $data = request()->except('_token');
//                 $product = Product::find($id);
//                 $product->update($data);
            
//                 return redirect()->route('admin.products.index');
//             })->name('admin.products.update');
            
//             Route::post('admin/products/delete/{id}', function ($id){
//                 //xoa du lieu theo id
//                 $product = Product::find($id);
//                 $product->delete();
//                 return redirect()->route('admin.products.index');
//                 })->name('admin.products.delete');


//     //cate


//     Route::get('/admin/categories', function (){
//         $categoryUser = Category::all();
//     return view('admin/categories/index', [
//         'data' => $categoryUser,
//     ]);
// })->name('admin.categories.index');


// Route::view('admin/categories/create', '/admin/categories/create') ->name('admin.categories.create');

// Route::post('admin/categories/store', function(){
//     // request()->all(): lấy toàn bộ dữ liêu gửi lên
//     $data = request()->except('_token');
//     $result = Category::create($data);

//     return redirect()->route('admin.categories.index');
// })->name('admin.categories.store');

// Route::get('admin/categories/edit/{id}', function ($id){
//     $data = Category::find($id);
 
//  return view('admin.categories.edit', [
//      'data' => $data,
//  ]);
//  })->name('admin.categories.edit');

//  Route::post('admin/categories/update/{id}', function ($id){
//     //nhap du lieu va luu vao db
//         $data = request()->except('_token');
//         $category = Category::find($id);
//         $category->update($data);
    
//         return redirect()->route('admin.categories.index');
//     })->name('admin.categories.update');
    
//     Route::post('admin/categories/delete/{id}', function ($id){
//         //xoa du lieu theo id
//         $category = Category::find($id);
//         $category->delete();
//         return redirect()->route('admin.categories.index');
//         })->name('admin.categories.delete');
