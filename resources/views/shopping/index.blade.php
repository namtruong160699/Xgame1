@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-area-start">
        <div class="container">
            <!-- Shopping Cart Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="cart-table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th></th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 ?>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <a href="#"><img src="{{pare_url_file($product->attributes->avatar)}}" class="img-responsive"
                                                         alt=""></a>
                                    </td>
                                    <td>
                                        <h6>{{$product->name}}</h6>
                                    </td>
                                    <td><a href="#">Edit</a></td>
                                    <td>
                                        <div class="cart-price">{{number_format($product->price,0,',','.')}} đ</div>
                                    </td>
                                    <td>
                                        <form>
                                            <input type="text" placeholder="{{$product->quantity}}">
                                        </form>
                                    </td>
                                    <td>
                                        <div class="cart-subtotal">{{number_format($product->quantity * $product->price,0,',','.')}} đ</div>
                                    </td>
                                    <td><a title="Xóa sản phẩm" href="{{route('delete.shopping.cart',$key)}}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                <?php $i ++ ?>
                            @endforeach
                            <tr>
                                <td class="actions-crt" colspan="7">
                                    <div class="">
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="/">Tiếp tục mua hàng</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">
                                                Cập nhật giỏ hàng</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="#">
                                                Xóa tất cả</a></div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Table -->
            <!-- Shopping Coupon -->
                    <div class="row">
                        <div class="col-md-12 vendee-clue">
                            <!-- Shopping Totals -->
                            <div class="shipping coupon cart-totals">
                                <ul>
{{--                                    <li class="cartSubT">Subtotal: <span>$50.00</span></li>--}}
                                    <li class="cartSubT">Số tiền cần thanh toán: <span>{{number_format(\Cart::getSubTotal(),0,',','.')}} đ</span></li>
                                </ul>
                                <a class="proceedbtn" href="{{route('get.form.pay')}}">THANH TOÁN</a>
                                <div class="multiCheckout">
{{--                                    <a href="#">Checkout with Multiple Addresses</a>--}}
                                </div>
                            </div>
                            <!-- Shopping Totals -->
                        </div>
                    </div>
        <!-- Shopping Coupon -->
        </div>
    </div>
@stop
