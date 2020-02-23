@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection
@push('script-page')
    <script>
        var SalesChart = (function () {
            var $chart = $('#cash-flow');

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
                        labels: {!! json_encode($incExpLineChartData['day']) !!},
                        datasets: {!! json_encode($incExpLineChartData['incExpArr']) !!}

                    },
                });
                $this.data('chart', salesChart);
            };
            if ($chart.length) {
                init($chart);
            }
        })();
        var SalesChart = (function () {
            var $chart = $('#incExpBarChart');

            function init($this) {
                var salesChart = new Chart($this, {
                    type: 'bar',
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
                        labels: {!! json_encode($incExpBarChartData['month']) !!},
                        datasets: {!! json_encode($incExpBarChartData['incExpArr']) !!}
                    },
                });
                $this.data('chart', salesChart);
            };
            if ($chart.length) {
                init($chart);
            }
        })();

        var DoughnutChart = (function () {
            var $chart = $('#chart-doughnut-income');

            function init($this) {
                var randomScalingFactor = function () {
                    return Math.round(Math.random() * 100);
                };
                var doughnutChart = new Chart($this, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: {!! json_encode($incomeCatAmount) !!},
                            backgroundColor: {!! json_encode($incomeCategoryColor) !!},
                        }],
                        labels: {!! json_encode($incomeCategory) !!},
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                });
                $this.data('chart', doughnutChart);
            };
            if ($chart.length) {
                init($chart);
            }
        })();
        var DoughnutChart = (function () {
            var $chart = $('#chart-doughnut-expense');

            function init($this) {
                var randomScalingFactor = function () {
                    return Math.round(Math.random() * 100);
                };
                var doughnutChart = new Chart($this, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: {!! json_encode($expenseCatAmount) !!},
                            backgroundColor: {!! json_encode($expenseCategoryColor) !!},
                        }],
                        labels: {!! json_encode($expenseCategory) !!},
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                });
                $this.data('chart', doughnutChart);
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
        @if(\Auth::user()->type=='company')
            <div class="row">
                @if($constant['taxes']<=0)
                    <div class="col-3">
                        <div class="alert alert-danger">
                            {{__('Please add constant taxes. ')}}<a href="{{route('taxes.index')}}"><b>{{__('click here')}}</b></a>
                        </div>
                    </div>
                @endif
                @if($constant['category']<=0)
                    <div class="col-3">
                        <div class="alert alert-danger">
                            {{__('Please add constant category. ')}}<a href="{{route('product-category.index')}}"><b>{{__('click here')}}</b></a>
                        </div>
                    </div>
                @endif
                @if($constant['units']<=0)
                    <div class="col-3">
                        <div class="alert alert-danger">
                            {{__('Please add constant unit. ')}}<a href="{{route('product-unit.index')}}"><b>{{__('click here')}}</b></a>
                        </div>
                    </div>
                @endif
                @if($constant['paymentMethod']<=0)
                    <div class="col-3">
                        <div class="alert alert-danger">
                            {{__('Please add constant payment method. ')}}<a href="{{route('payment-method.index')}}"><b>{{__('click here')}}</b></a>
                        </div>
                    </div>
                @endif
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL CUSTOMER')}}</h4>
                        </div>
                        <div class="card-body">
                            {{\Auth::user()->countCustomers()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL VENDER')}}</h4>
                        </div>
                        <div class="card-body">
                            {{\Auth::user()->countVenders()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-money-bill-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL INVOICE')}}</h4>
                        </div>
                        <div class="card-body">
                            {{\Auth::user()->countInvoices()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-money-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL BILL')}}</h4>
                        </div>
                        <div class="card-body">
                            {{\Auth::user()->countBills()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('Income Vs Expense')}}</h4>

                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-right">{{\Auth::user()->priceFormat(\Auth::user()->todayIncome())}}</div>
                                    <div class="media-title"><a href="#">{{__('Income Today')}}</a></div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-right">{{\Auth::user()->priceFormat(\Auth::user()->todayExpense())}}</div>
                                    <div class="media-title"><a href="#">{{__('Expense Today')}}</a></div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-right">{{\Auth::user()->priceFormat(\Auth::user()->incomeCurrentMonth())}}</div>
                                    <div class="media-title"><a href="#">{{__('Income This Month')}}</a></div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-right">{{\Auth::user()->priceFormat(\Auth::user()->expenseCurrentMonth())}}</div>
                                    <div class="media-title"><a href="#">{{__('Expense This Month')}}</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('Cashflow')}}</h4>
                        <div class="card-header-action">
                            <h4>{{__('Last 15 days')}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="cash-flow" class="chartjs-render-monitor" height="210"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('Income & Expense')}}</h4>
                        <div class="card-header-action">
                            <h4>{{__('Current year').' - '.$currentYear}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="incExpBarChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{__('Income By Category')}}</h4>
                                <div class="card-header-action">
                                    <h4>{{__('Current year').' - '.$currentYear}}</h4>
                                </div>
                            </div>
                            <div class="col-12">
                                @foreach($incomeCategory as $key=>$category)
                                    <div class="text-right mt-10"><span class="graph-label" style="background-color: {{$incomeCategoryColor[$key]}}">{{$category}}</span> <span>{{\Auth::user()->priceFormat($incomeCatAmount[$key])}}</span></div>
                                @endforeach
                            </div>
                            <div class="card-body">
                                <canvas id="chart-doughnut-income" height="182"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{__('Expense By Category')}}</h4>
                                <div class="card-header-action">
                                    <h4>{{__('Current year').' - '.$currentYear}}</h4>
                                </div>
                            </div>
                            <div class="col-12">
                                @foreach($expenseCategory as $key=>$category)
                                    <div class="text-right mt-10"><span class="graph-label" style="background-color: {{$expenseCategoryColor[$key]}}">{{$category}}</span> <span>{{\Auth::user()->priceFormat($expenseCatAmount[$key])}}</span></div>
                                @endforeach
                            </div>
                            <div class="card-body">
                                <canvas id="chart-doughnut-expense" height="182"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('Latest Income')}}</h4>
                        <div class="card-header-action">
                            <a href="{{route('revenue.index')}}" class="btn btn-primary">{{__('View All')}}</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('Customer')}}</th>
                                    <th>{{__('Amount Due')}}</th>
                                    <th>{{__('Description')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latestIncome as $income)
                                    <tr class="font-style">
                                        <td>{{\Auth::user()->dateFormat($income->date)}}</td>
                                        <td>{{!empty($income->customer)?$income->customer->name:''}}</td>
                                        <td>{{\Auth::user()->priceFormat($income->amount)}}</td>
                                        <td>{{$income->description}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('Latest Expense')}}</h4>
                        <div class="card-header-action">
                            <a href="{{route('payment.index')}}" class="btn btn-primary">{{__('View All')}}</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('Vender')}}</th>
                                    <th>{{__('Amount Due')}}</th>
                                    <th>{{__('Description')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latestExpense as $expense)
                                    <tr class="font-style">
                                        <td>{{\Auth::user()->dateFormat($expense->date)}}</td>
                                        <td>{{!empty($expense->vender)?$expense->vender->name:''}}</td>
                                        <td>{{\Auth::user()->priceFormat($expense->amount)}}</td>
                                        <td>{{$expense->description}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


