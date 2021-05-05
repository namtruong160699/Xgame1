@extends('admin::layouts.master',[
    'page_title' => 'Danh sách đơn hàng',
    'current_menu' => 'transaction',
    'menu_open' => 'transaction',
])
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Đơn hàng</h1>
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-inline" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ID" name="id"
                                           value="{{\Request::get('id')}}">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Số điện thoại..." name="phone"
                                           value="{{\Request::get('phone')}}">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="status" id="">
                                        <option value="">Trạng thái</option>
                                        <option value="1" {{\Request::get('status') == 1 ? "selected = 'selected'" : ""}}>Chờ xác nhận</option>
                                        <option value="2" {{\Request::get('status') == 2 ? "selected = 'selected'" : ""}}>Đã xác nhận</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Tìm</button>
                                <button style="right: 20px;position: absolute;background-color: #00a65a;border-radius: 8px" type="submit" name="export" value="true" class="btn btn-success"><i class="fa fa-download"></i> Xuất Excel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quản lí đơn hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
{{--                                    <th>Địa chỉ</th>--}}
                                    <th>Số điện thoại</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày mua</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->id}}</td>
                                        <td>{{isset($transaction->user->name) ? $transaction->user->name : '[N\A]'}}</td>
{{--                                        <td>{{$transaction->tr_address}}</td>--}}
                                        <td>{{$transaction->tr_phone}}</td>
                                        <td>{{number_format($transaction->tr_total,0,',','.')}} VNĐ</td>
                                        <td>
                                            @if($transaction->tr_status == 2)
                                                <a href="#" class="btn btn-block btn-success btn-sm">Đã xử lý</a>
                                            @else
                                                <a href="{{route('admin.get.active.transaction',$transaction->id)}}" class="btn btn-block btn-secondary btn-sm">Chờ xử lý</a>
                                            @endif
                                        </td>
                                        <td>
                                            {{$transaction->created_at->format('d-m-Y')}}
                                        </td>
                                        <td>
                                            <a class="js_order_item" href="{{route('admin.get.view.order',$transaction->id)}}" data-id="{{$transaction->id}}">
                                                <button class="btn btn-primary"><i class="fa fa-eye"></i> Xem</button>
                                            </a>
                                            <a onclick="return confirm(' Bạn có chắc chắn muốn xóa dữ liệu?');" href="{{route('admin.transaction.delete',$transaction->id)}}">
                                                <button class="btn btn-danger"><i class="fa fa-remove"></i> Xóa</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="card-tools">
                {!! $transactions->appends($query)->links() !!}
            </div>
        </div>
    </section>

    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết đơn hàng #<b class="transaction_id"></b></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="md_content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $(".js_order_item").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md_content").html('');
                $(".transaction_id").text('').text($this.attr('data-id'));

                $("#myModalOrder").modal('show');
                $.ajax({
                    url:url,
                }).done(function (result) {
                    if(result)
                    {
                        $("#md_content").append(result);
                    }
                });
            });
            // Xóa item
            $('body').on("click",'.js-delete-order-item',function (event) {
                event.preventDefault();
                let URL = $(this).attr('href');
                let $this = $(this);
                $.ajax({
                    url: URL
                }).done(function (result) {
                    if (result.code == 200)
                    {
                        $this.parents("tr").remove();
                    }
                });
            })
        })
    </script>
@stop
