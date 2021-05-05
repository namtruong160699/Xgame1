@extends('layouts.app')
@section('content')
    <style>
        .cart-products__discount-prices {
            font-size: 12px;
            margin-bottom: 8px;
            color: rgb(162, 162, 162);
        }
        .cart-products__percent-prices {
            color: rgb(36, 36, 36);
            font-weight: 600;
            margin-left: 17px;
            position: relative;
        }

        .cart-products__percent-prices::before {
            content: "";
            width: 1px;
            height: 10px;
            position: absolute;
            left: -8px;
            top: 2px;
            background: rgb(120, 120, 120);
        }
        .cart-table tbody tr td {
            padding: 20px;
        }

    </style>
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
    @if($products->count()>0)
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
                                            <a href="#"><img src="{{pare_url_file($product->attributes->avatar)}}"
                                                             class="img-responsive"
                                                             alt=""></a>
                                        </td>
                                        <td>
                                            <h6>{{$product->name}}</h6>
                                        </td>
                                        <td>
                                            <div style="font-size: 14px"
                                                 class="cart-price">{{number_format($product->price,0,',','.')}}đ
                                            </div>
                                            @if($product->attributes->sale > 0)
                                                <p class="cart-products__discount-prices"><del>{{number_format($product->attributes->price_old,0,',','.')}}đ</del><span class="cart-products__percent-prices">- {{$product->attributes->sale}}%</span></p>
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            <input type="text" min="1" value="{{$product->quantity}}" id=""/>
                                            <a style="background-color: #c2a476;color: white;font-weight: 500;display: inline-block;padding: 10px;border-radius: 4px;margin-top: 3px" href="{{route('update.shopping.cart',$key)}}"
                                               data-id-product="{{$product->id}}" class="js-update-item-cart"
                                               data-id="{{$key}}">Cập nhật</a>
                                        </td>
                                        <td>
                                            <div style="font-size: 14px"
                                                 class="cart-subtotal">{{number_format($product->quantity * $product->price,0,',','.')}}</div>
                                        </td>
                                        <td><a title="Xóa sản phẩm" href="{{route('delete.shopping.cart',$key)}}"><i
                                                    class="fa fa-times"></i></a></td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
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
                                <li class="cartSubT">Số tiền cần thanh toán: <span>{{number_format(\Cart::getSubTotal(),0,',','.')}} đ</span>
                                </li>
                            </ul>
                            <a class="proceedbtn" href="{{route('get.form.pay')}}">TIẾN HÀNH ĐẶT HÀNG</a>
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
    @else
        <center>
            <img style="width: 190px;max-width: 100%" src="https://salt.tikicdn.com/desktop/img/mascot@2x.png">
            <p style="font-size: 16px;margin: 15px 0px 30px">Không có sản phẩm nào trong giỏ hàng của bạn.</p>
            <a href="{{route('home')}}"
               style="background-color: rgb(253, 216, 53);color: rgb(74, 74, 74);font-weight: 500;display: inline-block;padding: 10px 55px;border-radius: 4px;margin-bottom: 30px">Tiếp
                tục mua hàng</a>
        </center>
    @endif
@stop
@section('script')
    <script type="text/javascript">
        $(function () {
            $(".js-update-item-cart").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                let qty = $this.prev().val();
                let idProduct = $this.attr('data-id-product')

                if (url) {
                    $.ajax({
                        url: url,
                        data: {
                            qty: qty,
                            idProduct: idProduct
                        }
                    }).done(function (results) {
                        alert(results.messages)
                        window.location.reload();
                    });
                }
            })
        })
    </script>
@stop
