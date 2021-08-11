<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Admin\Product\ProductRequest;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $pagesize = config('common.default_page_size');
        // nhận dữ liệu từ form gửi lên & thực hiện filter
        $productQuery = Product::where('name', 'like', "%".$request->keyword."%");

        if($request->has('category_id') && $request->category_id > 0){
            $productQuery->where('category_id', $request->category_id);
        }
        if($request->has('order_by') && $request->order_by > 0){
            if($request->order_by == 1){
                $productQuery->orderBy('name');
            }else if($request->order_by == 2){
                $productQuery->orderByDesc('name');
            }else if($request->order_by == 3){
                $productQuery->orderBy('price');
            }else if($request->order_by == 4){
                $productQuery->orderByDesc('price');
            }else if($request->order_by == 5){
                $productQuery->orderBy('quantity');
            }else{
                $productQuery->orderByDesc('quantity');
            }
        }
        // 1. dựa vào model Product lấy toàn bộ data trong db
        $cates = Category::all();
        $product = $productQuery->get();
        // $productQuery->where('created_by', Auth::id());


        $product = $productQuery->paginate($pagesize);
        $product->appends($request->except('page'));
        // dd($products->currentPage());
        // 2. sinh ra màn hình danh sách với dữ liệu đã lấy đc
        // $product = Product::all();
        return view('admin/products/index', [
                         'data' => $product,
                         'cates' => $cates,
                   ]);
                 
                
    }
    public function show($id)
    {
       
    }
    public function create(){

        $cate = Category::all();

        return view('admin/products/create', [
                         'data' => $cate,
                   ]);
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
