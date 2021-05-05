@extends('layouts.app')
@section('content')
    <style>
        .active {
            color: #fd9727 !important;
        }
    </style>
    <div class="slider-area an-1 hm-1">
        @include('components.slide')
            <div class="our-product-area new-product">
                <div class="container">
                    <div class="area-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <!-- our-product area start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="features-curosel">
                                    <!-- single-product start -->
                                    @foreach($productHot as $proHot)
                                        <div class="col-lg-12 col-md-12">
                                            <div class="single-product first-sale">
                                                <div class="product-img">
                                                    @if($proHot->pro_number == 0)
                                                        <span
                                                            style="position: absolute;background-color: #e91e63;color: white;border-radius: 5px;padding:4px 6px;font-size: 11px;z-index: 10;">Tạm hết hàng</span>
                                                    @endif
                                                    @if($proHot->pro_sale > 0)
                                                        <span
                                                            style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 4px 6px;color: white;font-size: 11px;right: 0;z-index: 10;">Giảm {{$proHot->pro_sale}}%</span>
                                                    @endif
                                                    <a href="{{route('get.detail.product',[$proHot->pro_slug, $proHot->id])}}">
                                                        <img class="primary-image"
                                                             src="{{asset(pare_url_file($proHot->pro_avatar))}}"
                                                             alt=""/>
                                                        <img class="secondary-image"
                                                             src="{{asset(pare_url_file($proHot->pro_avatar))}}"
                                                             alt=""/>
                                                    </a>
                                                    <div class="action-zoom">
                                                        <div class="add-to-cart">
                                                            <a href="{{route('get.detail.product',[$proHot->pro_slug,$proHot->id])}}"
                                                               title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <div class="add-to-wishlist">
                                                                    <a href="#" title="Add to Wishlist"><i
                                                                            class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="compare-button">
                                                                    <a href="{{route('add.shopping.cart',$proHot->id)}}"
                                                                       title="Thêm vào giỏ hàng"><i
                                                                            class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="quickviewbtn">
                                                                <a href="{{route('get.detail.product',[$proHot->pro_slug,$proHot->id])}}"
                                                                   title="Add to Compare"><i
                                                                        class="fa fa-retweet"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format($proHot->pro_price,0,'','.')}} ₫</span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="#">{{$proHot->pro_name}}</a></h2>
                                                    <p>{{$proHot->pro_description}}</p>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                <!-- single-product end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- our-product area end -->
                </div>
            </div>
        @include('components.product_suggest')
        <div id="product_view"></div>
    <!-- product section end -->
        <!-- latestpost area start -->
        @if(isset($articleNews))
            <div class="latest-post-area">
                <div class="container">
                    <div class="area-title">
                        <h2>Bài viết mới</h2>
                    </div>
                    <div class="row">
                        <div class="all-singlepost">
                            <!-- single latestpost start -->
                            @foreach($articleNews as $arNews)
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="single-post" style="margin-bottom: 30px">
                                        <div class="post-thumb">
                                            <a href="#">
                                                <img src="{{asset(pare_url_file($arNews->a_avatar))}}" alt=""
                                                     style="width: 370px;height: 280px"/>
                                            </a>
                                        </div>
                                        <div class="post-thumb-info">
                                            {{--                            <div class="post-time">--}}
                                            {{--                                <a href="#">Beauty</a>--}}
                                            {{--                                <span>/</span>--}}
                                            {{--                                <span>Post by</span>--}}
                                            {{--                                <span>BootExperts</span>--}}
                                            {{--                            </div>--}}
                                            <div class="postexcerpt">
                                                <p style="height: 40px">{{$arNews->a_name}}</p>
                                                <a href="#" class="read-more">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        <!-- single latestpost end -->
                        </div>
                    </div>
                </div>
            </div>
        @endif
    <!-- latestpost area end -->
        <!-- block category area start -->
        <div class="block-category">
            <div class="container">
                <div class="row">
                @if(isset($categoriesHome))
                    @foreach($categoriesHome as $categoryHome)
                        <!-- featured block start -->
                            <div class="col-md-4">
                                <!-- block title start -->
                                <div class="block-title">
                                    <h2>{{$categoryHome->c_name}}</h2>
                                </div>
                                <!-- block title end -->
                                <!-- block carousel start -->
                                <div class="block-carousel">
                                    @if(isset($categoryHome->products))
                                        @foreach($categoryHome->products as $product)
                                            <?php
                                            $ageDetail = 0;
                                            if ($product->pro_total_rating) {
                                                $ageDetail = round($product->pro_total_number / $product->pro_total_rating, 2);
                                            }
                                            ?>
                                            <div class="block-content">
                                                <!-- single block start -->
                                                <div class="single-block">
                                                    <div class="block-image pull-left">
                                                        <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><img
                                                                class="img-responsive"
                                                                style="width: 170px;max-height: 280px"
                                                                src="{{asset(pare_url_file($product->pro_avatar))}}"
                                                                alt=""/></a>
                                                    </div>
                                                    <div class="category-info">
                                                        <h3>
                                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a>
                                                        </h3>
                                                        <p>{{$product->pro_description}}</p>
                                                        <div class="cat-price">$235.00 <span
                                                                class="old-price">$333.00</span>
                                                        </div>
                                                        <div class="cat-rating">
                                                            @for($i = 1;$i <= 5; $i ++)
                                                                <a href="#"><i
                                                                        class="fa fa-star {{ $i <= $ageDetail ? 'active' : '' }}"></i></a>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single block end -->
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!-- block carousel end -->
                            </div>
                            <!-- featured block end -->
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- block category area end -->
        <!-- testimonial area start -->
        <div class="testimonial-area lap-ruffel">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="crusial-carousel">
                            <div class="crusial-content">
                                <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                                <span>BootExperts</span>
                            </div>
                            <div class="crusial-content">
                                <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                                <span>Lavoro Store!</span>
                            </div>
                            <div class="crusial-content">
                                <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                                <span>MR Selim Rana</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->
        @include('components.banner')
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let routeRenderProduct = '{{route('post.product.view')}}';
            checkRenderProduct = false;
            $(document).on('scroll',function () {
                if ($(window).scrollTop() > 150 && checkRenderProduct == false){

                    checkRenderProduct = true;

                    let products = localStorage.getItem('products');
                    products = $.parseJSON(products)
                    if (products.length > 0)
                    {
                        $.ajax({
                            url : routeRenderProduct,
                            method : "POST",
                            data : { id : products},
                            success : function (result) {
                                $("#product_view").html('').append(result.data)
                            }
                        });
                    }
                }
            })
        })
    </script>
@stop
