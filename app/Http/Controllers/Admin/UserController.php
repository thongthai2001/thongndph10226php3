<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $list = User::all();
        // dd($list);
        return view('admin/users/index', ['data' => $list]);
    }
    public function show()
    {
        return view('admin/users/create');
    }
    public function create(){
        return view('admin/users/create'); 
    }
    public function store()
    {
         // dd($_REQUEST);
    //  Hàm laravel quy định sẵn  $_REQUEST = request()->all() 
    // Lấy toàn bộ sữ liệu gửi lên trừ _token dùng : request()->except("_token)
        $data = request()->except("_token");

        $data['password'] = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi ";
        User::Create($data);

        return redirect()->route('admin.users.index');
    }
    public function edit($id)

    {
        $data = User::find($id);
        return view('admin/users/edit', ['data' => $data]);
    }
    public function update($id)
    {
        $user = User::find($id);
        $data = request()->except("_token");
        // gửi dữ liệu lên 2 cách
        $user->update($data);
        return redirect()->route('admin.users.index');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete($id);
        return redirect()->route('admin.users.index');
    }
}