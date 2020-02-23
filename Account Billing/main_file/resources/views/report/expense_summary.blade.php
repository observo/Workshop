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
                        labels: {!! json_encode($monthList) !!},
                        datasets: [{
                            label: 'Expense',
                            data:{!! json_encode($chartExpenseArr) !!},
                            borderColor: '#ff0000b8',
                            backgroundColor: '#ff0000b8',
                            fill: '!0',
                        }]
                    },
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
            <h1>{{__('Expense Summary')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Expense Summary')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{$currentYear}}</h4>
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-icon icon-left btn-primary"><i class="fas fa-filter"></i>{{__('Filter')}}</a>
                                        <div class="dropdown-menu dropdown-list dropdown-menu-right Filter-dropdown">
                                            {{ Form::open(array('route' => array('report.expense.summary'),'method' => 'GET')) }}
                                            <div class="form-group">
                                                {{ Form::label('year', __('Year')) }}
                                                {{ Form::select('year',$yearList,isset($_GET['year'])?$_GET['year']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('account', __('Account')) }}
                                                {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('category', __('Category')) }}
                                                {{ Form::select('category',$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('vender', __('Vender')) }}
                                                {{ Form::select('vender',$vender,isset($_GET['vender'])?$_GET['vender']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                                <a href="{{route('report.expense.summary')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <canvas id="chart-sales" height="300"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush border font-style" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>{{__('Category')}}</th>
                                                        @foreach($monthList as $month)
                                                            <th>{{$month}}</th>
                                                        @endforeach
                                                    </tr>

                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Payment :')}}</h6></b></td>
                                                    </tr>
                                                    @foreach($expenseArr as $i=>$expense)
                                                        <tr>
                                                            <td>{{$expense['category']}}</td>
                                                            @foreach($expense['data'] as $j=>$data)
                                                                <td>{{\Auth::user()->priceFormat($data)}}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Bill :')}}</h6></b></td>
                                                    </tr>
                                                    @foreach($billArray as $i=>$bill)
                                                        <tr>
                                                            <td>{{$bill['category']}}</td>
                                                            @foreach($bill['data'] as $j=>$data)
                                                                <td>{{\Auth::user()->priceFormat($data)}}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Expense = Payment + Bill :')}}</h6></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Total')}}</td>
                                                        @foreach($chartExpenseArr as $i=>$expense)
                                                            <td>{{\Auth::user()->priceFormat($expense)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection


