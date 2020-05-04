@extends('layouts.app')
@section('content')
    <style>
        .article_content h2{font-size: 1.4rem}
        .article_content {font-family: Roboto, sans-serif}
    </style>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="{{route('get.list.article')}}" title="Bài viết">Bài viết</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{$articleDetail->a_name}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- contact-details start -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="article_content" style="margin-bottom: 20px">
                        <h1>{{$articleDetail->a_name}}</h1>
                        <p style="font-weight: 500;color: #333">{{$articleDetail->a_description}}</p>
                        <div>
                            {!! $articleDetail->a_content !!}
                        </div>
                    </div>
                    <h4>Bài viết khác</h4>
                    @include('components.article')
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </div>
    <!-- contact-details end -->
@stop
