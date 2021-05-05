@extends('admin::layouts.master',[
    'page_title' => 'Danh sách danh mục',
    'current_menu' => 'category',
    'menu_open' => 'category',
])
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh mục</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách danh mục</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th>Title Seo</th>
                                    <th>Trang chủ</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($categories))
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->c_name}}</td>
                                            <td>{{$category->c_title_seo}}</td>
                                            <td>
                                                <a href="{{route('admin.get.action.category',['home',$category->id])}}"
                                                   class="{{$category->getHome($category->c_home)['class']}}">{{$category->getHome($category->c_home)['name']}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.action.category',['active',$category->id])}}"
                                                   class="{{$category->getStatus($category->active)['class']}}">{{$category->getStatus($category->active)['name']}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.edit.category',$category->id)}}">Sửa</a>
                                                |
                                                <a href="{{route('admin.get.action.category',['delete',$category->id])}}">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
