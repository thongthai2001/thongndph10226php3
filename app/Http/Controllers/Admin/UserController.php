<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;



class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
         $user = User::where('name','LIKE',"%$keyword%")->get();
        }else{
            $user = User::all();
        }
        
        $user->load([
            'invoices',  
        ]);
        // $user = $user->first();
        // dd($user);
        // $user = $user->find('10'); 
        // dd($user->invoices());
  
        return view('admin/users/index', ['data' => $user]);
    }
    public function show($id)
    {
       $user = User::find($id);
       return view('admin/users/show',[
           'user' => $user,
       ]);
        // $user = User::find($id);
        
        // return view('admin/users/show', [
        //     'user' => $user,
        // ]);
    }
    public function create(){
        return view('admin/users/create'); 
    }
    public function store(StoreRequest $request)
    {
         // dd($_REQUEST);
    //  Hàm laravel quy định sẵn  $_REQUEST = request()->all() 
    // Lấy toàn bộ sữ liệu gửi lên trừ _token dùng : request()->except("_token)
        $data = $request->except("_token");

        // $data['password'] = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        // User::Create($data);
        $result = User::create($data);

        if ($request->ajax() == true) {
            return response()->json([
                'status' => 200,
                'message' => 'ok'
            ]);
        }

        return redirect()->route('admin.users.index');
    }
    public function edit($id)

    {
        $data = User::find($id);
        return view('admin/users/edit', ['data' => $data]);
    }
    public function update( $id)
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