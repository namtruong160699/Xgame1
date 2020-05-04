@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}" title="Trang chủ">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.product')}}" title="Sản phẩm">Sản phẩm</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </div>
    <div class="">
        @include("admin::product.form")
    </div>
@stop
