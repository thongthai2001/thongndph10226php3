<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;


class AdminController extends Controller
{
    public function index(request $request){
        $product = Product::all();
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
         $product = Product::where('name','LIKE',"%$keyword%")->get();
        }else{
            $product = Product::all();
        }
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

  
    public function cartDetail(){
        $cart = isset($_SESSION['cart']) == true ? $_SESSION['cart'] : [];
        return view('layout.cart', compact('cart'));
    }
    
        public function addToCart($id){
            $cart = isset($_SESSION['cart']) == true ? $_SESSION['cart'] : [];
            // dựa vào id nhận đc, lấy ra thông tin sản phẩm => mảng
            $product = Product::find($id);
          
            $product = $product->toArray();
            // kiểm tra trong giỏ hàng xem đã có sản phẩm này hay chưa ?
            $existedIndex = -1;
          
            for($i = 0; $i < count($cart); $i++){
                if($cart[$i]['id'] == $id){
                    $existedIndex = $i;
                    break;
                }
            }
            if($existedIndex == -1){
                // nếu chưa có thì bổ sung thêm 1 phần tử trong mảng sản phẩm là quantity = 1
                // sau đó add sản phẩm vào biến $cart
                $product['quantity'] = 1;
                array_push($cart, $product);
            }else{
                // nếu sản phẩm đã có trong giỏ hàng rồi
                // thì thay đổi giá trị của phần tử quantity += 1
                $cart[$existedIndex]['quantity'] += 1;
            }
    
            $_SESSION['cart'] = $cart;
    
            return view('layout.cart', compact('cart'));
            die;
        }
      
      
  
}
