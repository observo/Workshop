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
                        datasets: {!! json_encode($billChartData['statusData']) !!},
                        labels: {!! json_encode($billChartData['month']) !!},
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
                            <div class="text-small float-right font-weight-bold text-muted">{{$billChartData['progressData']['totalBill'] .'/'.$billChartData['progressData']['totalUnpaidBill']}}</div>
                            <div class="font-weight-bold mb-1">{{__('Unpaid')}}</div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="{{$billChartData['progressData']['unpaidPr']}}%" aria-valuenow="{{$billChartData['progressData']['unpaidPr']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$billChartData['progressData']['unpaidPr']}}%; background-color: {{$billChartData['progressData']['unpaidColor']}}"></div>
                            </div>
                            {{  number_format($billChartData['progressData']['unpaidPr'], 2, '.', '').'%'}}
                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted">{{$billChartData['progressData']['totalBill'] .'/'.$billChartData['progressData']['totalPaidBill']}}</div>
                            <div class="font-weight-bold mb-1">{{__('Paid')}}</div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="{{$billChartData['progressData']['paidPr']}}%" aria-valuenow="{{$billChartData['progressData']['paidPr']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$billChartData['progressData']['paidPr']}}%;background-color: {{$billChartData['progressData']['paidColor']}}"></div>
                            </div>
                            {{  number_format($billChartData['progressData']['paidPr'], 2, '.', '').'%'}}
                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted">{{$billChartData['progressData']['totalBill'] .'/'.$billChartData['progressData']['totalPartialBill']}}</div>
                            <div class="font-weight-bold mb-1">{{__('Partial Paid')}}</div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="{{$billChartData['progressData']['partialPr']}}%" aria-valuenow="{{$billChartData['progressData']['partialPr']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$billChartData['progressData']['partialPr']}}%;background-color: {{$billChartData['progressData']['partialColor']}}"></div>
                            </div>
                            {{  number_format($billChartData['progressData']['partialPr'], 2, '.', '').'%'}}
                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted">{{$billChartData['progressData']['totalBill'] .'/'.$billChartData['progressData']['totalDueBill']}}</div>
                            <div class="font-weight-bold mb-1">{{__('Due')}}</div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="{{$billChartData['progressData']['duePr']}}%" aria-valuenow="{{$billChartData['progressData']['duePr']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$billChartData['progressData']['duePr']}}%;background-color: {{$billChartData['progressData']['dueColor']}}"></div>
                            </div>
                            {{  number_format($billChartData['progressData']['duePr'], 2, '.', '').'%'}}
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


