@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection
@push('script-page')

    <script>
        var SalesChart = (function () {
            var $chart = $('#chart-sales');

            function init($this) {
                var salesChart = new Chart($this, {
                    type: 'line',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[200],
                                    zeroLineColor: Charts.colors.gray[200]
                                },
                                ticks: {}
                            }]
                        }
                    },
                    data: {
                        labels:{!! json_encode($chartData['label']) !!},
                        datasets: [{
                            label: 'Order',
                            data:{!! json_encode($chartData['data']) !!}
                        }]
                    }
                });
                $this.data('chart', salesChart);
            };
            if ($chart.length) {
                init($chart);
            }
        })();
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Dashboard')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL USERS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{$user->total_user}}
                        </div>
                    </div>
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <div class="progreess-status mt-2">
                                <span>{{__('PAID USERS')}} :</span>
                                <span><strong>{{$user['total_paid_user']}} </strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL ORDERS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{$user->total_orders}}
                        </div>
                    </div>
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <div class="progreess-status mt-2">
                                <span>{{__('TOTAL ORDER AMOUNT')}} :</span>
                                <span><strong>{{\Auth::user()->priceFormat($user['total_orders_price'])}}  </strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL PLANS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{$user['total_plan']}}
                        </div>
                    </div>
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <div class="progreess-status mt-2">
                                <span>{{__('MOST PURCHASE PLAN')}} :</span>
                                <span><strong>{{$user['most_purchese_plan']}}  </strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="h3 mb-0">{{__('Recent Order')}}</h5>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="chart-sales" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </section>
@endsection


