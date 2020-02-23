@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Profit && Loss Summary')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Profit && Loss Summary')}}</div>
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
                                            {{ Form::open(array('route' => array('report.profit.loss.summary'),'method' => 'GET')) }}
                                            <div class="form-group">
                                                {{ Form::label('year', __('Year')) }}
                                                {{ Form::select('year',$yearList,isset($_GET['year'])?$_GET['year']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                                <a href="{{route('report.profit.loss.summary')}}" class="btn btn-danger">{{__('Reset')}}</a>
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
                                                <h4>{{__('Income')}}</h4>
                                                <table class="table table-flush border font-style" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th width="25%">{{__('Category')}}</th>
                                                        @foreach($month as $m)
                                                            <th width="15%">{{$m}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Revenue : ')}}</h6></b></td>
                                                    </tr>
                                                    @if(!empty($revenueIncomeArray))
                                                        @foreach($revenueIncomeArray as $i=>$revenue)
                                                            <tr>
                                                                <td>{{$revenue['category']}}</td>
                                                                @foreach($revenue['amount'] as $j=>$amount)
                                                                    <td width="15%">{{\Auth::user()->priceFormat($amount)}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Invoice : ')}}</h6></b></td>
                                                    </tr>
                                                    @if(!empty($invoiceIncomeArray))
                                                        @foreach($invoiceIncomeArray as $i=>$invoice)
                                                            <tr>
                                                                <td>{{$invoice['category']}}</td>
                                                                @foreach($invoice['amount'] as $j=>$amount)
                                                                    <td width="15%">{{\Auth::user()->priceFormat($amount)}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table class="table table-flush border" id="dataTable-manual">
                                                                <tbody>
                                                                <tr>
                                                                    <td colspan="13"><b><h6>{{__('Total Income =  Revenue + Invoice ')}}</h6></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">{{__('Total Income')}}</td>
                                                                    @foreach($totalIncome as $income)
                                                                        <td width="15%">{{\Auth::user()->priceFormat($income)}}</td>
                                                                    @endforeach
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>{{__('Expense')}}</h4>
                                                <table class="table table-flush border font-style" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th width="25%">{{__('Category')}}</th>
                                                        @foreach($month as $m)
                                                            <th width="15%">{{$m}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Payment : ')}}</h6></b></td>
                                                    </tr>
                                                    @if(!empty($expenseArray))
                                                        @foreach($expenseArray as $i=>$expense)
                                                            <tr>
                                                                <td>{{$expense['category']}}</td>
                                                                @foreach($expense['amount'] as $j=>$amount)
                                                                    <td width="15%">{{\Auth::user()->priceFormat($amount)}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    <tr>
                                                        <td colspan="13"><b><h6>{{__('Bill : ')}}</h6></b></td>
                                                    </tr>
                                                    @if(!empty($billExpenseArray))
                                                        @foreach($billExpenseArray as $i=>$bill)
                                                            <tr>
                                                                <td>{{$bill['category']}}</td>
                                                                @foreach($bill['amount'] as $j=>$amount)
                                                                    <td width="15%">{{\Auth::user()->priceFormat($amount)}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table class="table table-flush border" id="dataTable-manual">
                                                                <tbody>
                                                                <tr>
                                                                    <td colspan="13"><b><h6>{{__('Total Expense =  Payment + Bill ')}}</h6></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{__('Total Expenses')}}</td>
                                                                    @foreach($totalExpense as $expense)
                                                                        <td width="15%">{{\Auth::user()->priceFormat($expense)}}</td>
                                                                    @endforeach
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table class="table table-flush border" id="dataTable-manual">
                                                                <tbody>
                                                                <tr>
                                                                    <td colspan="13"><b><h6>{{__('Net Profit = Total Income - Total Expense ')}}</h6></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%">{{__('Net Profit')}}</td>
                                                                    @foreach($netProfitArray as $i=>$profit)
                                                                        <td width="15%"> {{\Auth::user()->priceFormat($profit)}}</td>
                                                                    @endforeach
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
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


