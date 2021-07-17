<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
//    $listUser = DB::table('users')->get();
        $listUser = User::all();
    // dd($listUser); 
    return view('admin/users/index', [
        'data' => $listUser,
    ]);
})->name('admin.users.index');
//tra ve giao dien

Route::view('admin/users/create', '/admin/users/create') ->name('admin.users.create');

Route::post('admin/users/store', function(){
    // request()->all(): lấy toàn bộ dữ liêu gửi lên
    $data = request()->except('_token');
    $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
    $result = User::create($data);

    return redirect()->route('admin.users.index');
})->name('admin.users.store');

Route::get('admin/users/edit/{id}', function ($id){
   $data = User::find($id);

return view('admin.users.edit', [
    'data' => $data,
]);
})->name('admin.users.edit');

Route::post('admin/users/update/{id}', function ($id){
//nhap du lieu va luu vao db
    $data = request()->except('_token');
    $user = User::find($id);
    $user->update($data);

    return redirect()->route('admin.users.index');
})->name('admin.users.update');

Route::post('admin/users/delete/{id}', function ($id){
    //xoa du lieu theo id
    $user = User::find($id);
    $user->delete();
    return redirect()->route('admin.users.index');
    })->name('admin.users.delete');
