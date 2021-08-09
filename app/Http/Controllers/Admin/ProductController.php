<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\Admin\Product\ProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return view('admin/products/index', [
                         'data' => $product,
                   ]);
                 
                
    }
    public function show($id)
    {
       
    }
    public function create(){
        return view('admin/products/create', '/admin/products/create');
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile('file_upload')){
            $newFileName = uniqid(). '-'. $request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/products', $newFileName);
            $product->image = str_replace('public/', '', $path);
        }
        $product->save();
         return redirect()->route('admin.products.index');



    }

    public function edit($id)

    {
        $data = Product::find($id);
         
                 return view('admin.products.edit', [
                     'data' => $data,
                  ]);
    }
    public function update($id, Request $request)
    {
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('admin.products.index');
        }
        $product->fill($request->all());
        if($request->hasFile('file_upload')){
            $newFileName = uniqid(). '-' . $request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/products', $newFileName);
            $product->image = str_replace('public/', '', $path);
        }
        $product->save();
         return redirect()->route('admin.products.index');
    }
    public function delete($id)
    {
        $product = Product::find($id);
                         $product->delete();
                         return redirect()->route('admin.products.index');
    }

  
}
