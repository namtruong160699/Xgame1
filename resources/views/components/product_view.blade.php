<div>
    <div class="container">
        <div class="area-title">
            <h2>Sản phẩm vừa xem</h2>
        </div>
        <!-- our-product area start -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- single-product start -->
                    @foreach($productView as $product)
                        <div class="col-lg-3 col-md-3">
                            <div class="single-product first-sale">
                                <div class="product-img">
                                    @if($product->pro_number == 0)
                                        <span
                                            style="position: absolute;background-color: #e91e63;color: white;border-radius: 5px;padding:4px 6px;font-size: 11px;z-index: 10;">Tạm hết hàng</span>
                                    @endif
                                    @if($product->pro_sale > 0)
                                        <span
                                            style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 4px 6px;color: white;font-size: 11px;right: 0;z-index: 10;">Giảm {{$proHot->pro_sale}}%</span>
                                    @endif
                                    <a href="{{route('get.detail.product',[$product->pro_slug, $product->id])}}">
                                        <img class="primary-image"
                                             src="{{asset(pare_url_file($product->pro_avatar))}}"
                                             alt=""/>
                                        <img class="secondary-image"
                                             src="{{asset(pare_url_file($product->pro_avatar))}}"
                                             alt=""/>
                                    </a>
                                    <div class="action-zoom">
                                        <div class="add-to-cart">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"
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
                                                    <a href="{{route('add.shopping.cart',$product->id)}}"
                                                       title="Thêm vào giỏ hàng"><i
                                                            class="icon-bag"></i></a>
                                                </div>
                                            </div>
                                            <div class="quickviewbtn">
                                                <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"
                                                   title="Add to Compare"><i
                                                        class="fa fa-retweet"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="new-price">{{number_format($product->pro_price,0,'','.')}} ₫</span>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h2 class="product-name"><a href="#">{{$product->pro_name}}</a></h2>
                                    <p>{{$product->pro_description}}</p>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- single-product end -->
                </div>
            </div>
        </div>
        <!-- our-product area end -->
    </div>
</div>
