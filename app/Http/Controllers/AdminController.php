<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class AdminController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('layout.product', [
                         'data' => $product,
                   ]);
    }
    public function detail($id){
        $product = Product::find($id);
        $relateProducts = Product::where('id', '<>', $id)
                                ->get();

                                return view('layout.detail', [
                                    'data' => $product,
                                     'relateProducts' => $relateProducts,
                              ]);

    }
}
