@extends('admin::layouts.master',[
    'page_title' => 'Danh sách sản phẩm',
    'current_menu' => 'product',
    'menu_open' => 'product',
])
@section('content')
    <style>
        .rating .active{
            color: #ff9705 !important;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sản phẩm</h1>
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-inline" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tên sản phẩm ..." name="name"
                                           value="{{\Request::get('name')}}">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="cate" id="">
                                        <option value="">Danh mục</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"{{\Request::get('cate') == $category->id ? "selected=''selected" : ""}}>{{$category->c_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Tìm</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Nổi bật</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($products))
                                    @foreach($products as $product)
                                        <?php
                                        $age = 0;
                                        if ($product->pro_total_rating)
                                        {
                                            $age = round($product->pro_total_number / $product->pro_total_rating,2);
                                        }
                                        ?>
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>
                                                {{$product->pro_name}}
                                                <ul style="padding-left: 15px">
                                                    <li>
                                                        <span><i class="fas fa-dollar-sign"></i></span>
                                                        <span> {{number_format($product->pro_price,0,',','.')}} đ</span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fas fa-dollar-sign"></i></span>
                                                        <span> {{$product->pro_sale}} %</span>
                                                    </li>
                                                    <li>
                                                        <span>Đánh giá: </span>
                                                        <span class="rating">
                                        @for($i = 1 ; $i <= 5 ; $i++)
                                                                <i class="fa fa-star {{$i <= $age ? 'active' : ''}}" style="color: #999"></i>
                                                            @endfor
                                    </span>
                                                        <span>{{$age}}</span>
                                                    </li>
                                                    <li>
                                                        <span>Số lượng: </span>
                                                        <span>{{$product->pro_number}}</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>{{isset($product->category->c_name) ? $product->category->c_name : '[N\A]'}}</td>
                                            <td>
                                                <img src="{{asset(pare_url_file($product->pro_avatar))}}" alt="" class="img img-responsive" style="width: 80px;height: auto">
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.action.product',['active',$product->id])}}"
                                                   class="label {{$product->getStatus($product->pro_active)['class']}}">{{$product->getStatus($product->pro_active)['name']}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.action.product',['hot',$product->id])}}"
                                                   class="label {{$product->getHot($product->pro_hot)['class']}}">{{$product->getHot($product->pro_hot)['name']}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.edit.product',$product->id)}}">Sửa</a>
                                                |
                                                <a href="{{route('admin.get.action.product',['delete',$product->id])}}">Xóa</a>
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
