@extends('admin::layouts.master',[
    'page_title' => 'Danh sách đánh giá',
    'current_menu' => 'rating',
    'menu_open' => 'rating',
])
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Đánh giá</h1>
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
                            <h3 class="card-title">Quản lí đánh giá</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên TV</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Đánh giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($ratings))
                                    @foreach($ratings as $rating)
                                        <tr>
                                            <td>{{$rating->id}}</td>
                                            <td>{{isset($rating->user->name) ? $rating->user->name : '[N\A]'}}</td>
                                            <td><a href="#">{{isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]'}}</a></td>
                                            <td>{{$rating->ra_content}}</td>
                                            <td>{{$rating->ra_number}}</td>
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
            <div class="card-tools">
                {!! $ratings->links() !!}
            </div>
        </div>
    </section>
@stop
