@extends('admin::layouts.master',[
     'page_title' => 'Dashboard',
     'current_menu' => 'dashboard',
     'menu_open' => 'dashboard',
])
@section('content')
    <!-- Main content -->
    <section style="margin-top: 15px" class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$totalTransaction}}</h3>

                            <p>Tổng số đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.get.list.transaction')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$totalProduct}}</h3>

                            <p>Tổng số sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('admin.get.list.product')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$totalUser}}</h3>

                            <p>Tổng số thành viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('admin.get.list.user')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$totalRating}}</h3>

                            <p>Tổng số đánh giá</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('admin.get.list.rating')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-8 connectedSortable ui-sortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="container" data-list-day="{{$listDay}}"
                                     data-money-default="{{$arrRevenueTransactionMonthDefault}}"
                                     data-money="{{$arrRevenueTransactionMonth}}"></div>
                            </figure>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-4 connectedSortable ui-sortable">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="container1" data-json="{{$statusTransaction}}"></div>
                            </figure>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@stop
@section('script')
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{--    <script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
    {{--    <script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        let listDay = $("#container").attr('data-list-day');
        listDay = JSON.parse(listDay);

        let listMoneyMonth = $("#container").attr('data-money');
        listMoneyMonth = JSON.parse(listMoneyMonth);

        let listMoneyMonthDefault = $("#container").attr('data-money-default');
        listMoneyMonthDefault = JSON.parse(listMoneyMonthDefault);

        let dataTransaction = $("#container1").attr('data-json');
        dataTransaction = JSON.parse(dataTransaction);
        Highcharts.chart('container', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ doanh thu các ngày trong tháng'
            },
            // subtitle: {
            //     text: 'Source: WorldClimate.com'
            // },
            xAxis: {
                categories: listDay
            },
            yAxis: {
                title: {
                    text: 'Đơn vị (VNĐ)'
                },
                labels: {
                    formatter: function () {
                        return this.value;
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Đã xử lý',
                marker: {
                    symbol: 'square'
                },
                data: listMoneyMonth

            }, {
                name: 'Chờ xử lý',
                marker: {
                    symbol: 'diamond'
                },
                data: listMoneyMonthDefault
            }]
        });
        // Build the chart
        Highcharts.chart('container1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Thống kê trạng thái đơn hàng'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Số lượng',
                colorByPoint: true,
                data: dataTransaction
            }]
        });
    </script>
@stop
