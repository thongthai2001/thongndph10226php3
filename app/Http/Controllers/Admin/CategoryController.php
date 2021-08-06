<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
       
        $category = Category::all();
             return view('admin/categories/index', [
                 'data' => $category,
             ]);       
    }
    public function show($id)
    {
       
    }
    public function create(){
       return view('admin/categories/create', '/admin/categories/create');
    }
    public function store(CategoryRequest $request)
    {
        $data = request()->except('_token');
             $result = Category::create($data);
        
             return redirect()->route('admin.categories.index');
    }
    public function edit($id)

    {
        $data = Category::find($id);
 
          return view('admin.categories.edit', [
              'data' => $data,
          ]);
    }
    public function update($id)
    {
        $data = request()->except('_token');
                 $category = Category::find($id);
                 $category->update($data);
            
                 return redirect()->route('admin.categories.index');
    }
    public function delete($id)
    {
        $category = Category::find($id);
         $category->delete();
         return redirect()->route('admin.categories.index');
    }
}
