@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Thành viên</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lý thành viên <a href="" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($users))
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <a href="{{route('admin.get.edit.product',$user->id)}}"><i class="fas fa-pen"></i></a>
                            <a href="{{route('admin.get.action.product',['delete',$user->id])}}"><i
                                    class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop
