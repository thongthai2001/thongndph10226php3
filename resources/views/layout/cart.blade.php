@extends('layout.trangchu')
@section('main-contents')
<form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tbody><tr class="table_head">
                                    <th class="column-1">image</th>
                                    <th class="column-2">Name</th>
                                    <th class="column-3">Quantity</th>
                                    <th class="column-4">price</th>
                                    <th class="column-5">total</th>
                                    
                                </tr>

                                <tr class="table_row">
                                @php
                                                    $totalPrice = 0;
                                                @endphp
                                                @foreach ($cart as $item)
                                                @php
                                                    $totalPrice += $item['price']*$item['quantity'];
                                                   
                                                @endphp
                                    <td class="column-1">
                                    
                                        <div class="how-itemcart1">
                                           <img src="{{asset('storage/' . $item['image'])}}" alt="{{$item['name']}}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{$item['name']}}</td>
                                    <td class="column-3">
                                    <input type="number" value="">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$item['quantity']}}">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-4">{{number_format($item['price'], 0, '.', '.')}}</td>
                                    <td class="column-5">{{number_format($item['price']*$item['quantity'], 0, '.', '.')}}</td>
                                   
                                </tr>

                                @endforeach
                            </tbody>
                                
                                </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            

                            <a href="" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                               Delete 
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                           information
                        </h4>

                        

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                           

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                               

                                <div class="p-t-15">

                                <form class="user" action="savecart" method="POST" multiple="" enctype="multipart/form-data">
                                <input type="text" name="customer_name" class="form-control "
                       placeholder="customer_name"><br>

                            <input type="text" name="customer_email" class="form-control "
                            placeholder="customer_email"><br>

                            <input type="text" name="customer_address" class="form-control "
                                                placeholder="customer_address"><br>

                            <input type="number" name="">

                            
                                                
                                                <button type="submit" class="btn btn-primary">Đặt hàng</button>
                      </form>

                                   

                                </div>
                            </div>
                        </div>

                       

                        
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection