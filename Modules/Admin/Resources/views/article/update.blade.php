@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}" title="Trang chủ">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.article')}}" title="Bài viết">Bài viết</a></li>
            <li class="active">Cập nhật</li>
        </ol>
    </div>
    <div class="">
        @include("admin::article.form")
    </div>
@stop
