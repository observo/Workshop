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
                        datasets: {!! json_encode($invoiceChartData['statusData']) !!},
                        labels: {!! json_encode($invoiceChartData['month']) !!},
                    },
                });
                $this.data('chart', salesChart);
            }

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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">

                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted">{{$invoiceChartData['progressData']['totalInvoice'] .'/'.$invoiceChartData['progressData']['totalUnpaidInvoice']}}</div>
                            <div class="font-weight-bold mb-1">{{__('Unpaid')}}</div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="{{$invoiceChartData['progressData']['unpaidPr']}}%" aria-valuenow="{{$invoiceChartData['progressData']['unpaidPr']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$invoiceChartData['progressData']['unpaidPr']}}%; background-color: {{$invoiceChartData['progressData']['unpaidColor']}}"></div>
                            </div>
                            {{($invoiceChartData['progressData']['unpaidPr'].'%')}}
                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted">{{$invoiceChartData['progressData']['totalInvoice'] .'/'.$invoiceChartData['progressData']['totalPaidInvoice']}}</div>
                            <div class="font-weight-bold mb-1">{{__('Paid')}}</div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="{{$invoiceChartData['progressData']['paidPr']}}%" aria-valuenow="{{$invoiceChartData['progressData']['paidPr']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$invoiceChartData['progressData']['paidPr']}}%;background-color: {{$invoiceChartData['progressData']['paidColor']}}"></div>
                            </div>
                            {{($invoiceChartData['progressData']['paidPr'].'%')}}
                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted">{{$invoiceChartData['progressData']['totalInvoice'] .'/'.$invoiceChartData['progressData']['totalPartialInvoice']}}</div>
                            <div class="font-weight-bold mb-1">{{__('Partial Paid')}}</div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="{{$invoiceChartData['progressData']['partialPr']}}%" aria-valuenow="{{$invoiceChartData['progressData']['partialPr']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$invoiceChartData['progressData']['partialPr']}}%;background-color: {{$invoiceChartData['progressData']['partialColor']}}"></div>
                            </div>
                            {{($invoiceChartData['progressData']['partialPr'].'%')}}
                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted">{{$invoiceChartData['progressData']['totalInvoice'] .'/'.$invoiceChartData['progressData']['totalDueInvoice']}}</div>
                            <div class="font-weight-bold mb-1">{{__('Due')}}</div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="{{$invoiceChartData['progressData']['duePr']}}%" aria-valuenow="{{$invoiceChartData['progressData']['duePr']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$invoiceChartData['progressData']['duePr']}}%;background-color: {{$invoiceChartData['progressData']['dueColor']}}"></div>
                            </div>
                            {{($invoiceChartData['progressData']['duePr'].'%')}}
                        </div>
                    </div>

                    <div class="card-header"><h4>{{__('Current year').' - '.date('Y')}}</h4></div>
                    <div class="card-body">
                        <canvas id="chart-sales" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


