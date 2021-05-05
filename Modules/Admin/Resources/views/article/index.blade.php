@extends('admin::layouts.master',[
    'page_title' => 'Danh sách bài viết',
    'current_menu' => 'article',
    'menu_open' => 'article',
])
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Bài viết</h1>
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
                            <h3 class="card-title">Danh sách bài viết</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="20%">Tên bài viết</th>
                                    <th style="width: 100px">Hình ảnh</th>
                                    <th style="width: 300px">Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Nổi bật</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($articles))
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{$article->id}}</td>
                                            <td>{{$article->a_name}}</td>
                                            <td>
                                                <img src="{{asset(pare_url_file($article->a_avatar))}}" alt=""
                                                     class="img img-responsive" style="width: 100px;height: 80px">
                                            </td>
                                            <td>{{$article->a_description}}</td>
                                            <td>
                                                <a href="{{route('admin.get.action.article',['active',$article->id])}}"
                                                   class="label {{$article->getStatus($article->a_active)['class']}}">{{$article->getStatus($article->a_active)['name']}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.action.article',['hot',$article->id])}}"
                                                   class="label {{$article->getHot($article->a_hot)['class']}}">{{$article->getHot($article->a_hot)['name']}}</a>
                                            </td>
                                            <td>{{$article->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.get.edit.article',$article->id)}}"><i
                                                        class="fas fa-pen"></i></a>
                                                <a href="{{route('admin.get.action.article',['delete',$article->id])}}"><i
                                                        class="fas fa-trash-alt"></i></a>
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
