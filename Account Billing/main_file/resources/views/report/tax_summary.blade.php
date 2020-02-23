@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Tax Summary')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Tax Summary')}}</div>
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
                                            {{ Form::open(array('route' => array('report.tax.summary'),'method' => 'GET')) }}
                                            <div class="form-group">
                                                {{ Form::label('year', __('Year')) }}
                                                {{ Form::select('year',$yearList,isset($_GET['year'])?$_GET['year']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                                <a href="{{route('report.tax.summary')}}" class="btn btn-danger">{{__('Reset')}}</a>
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
                                                <table class="table table-flush border" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>{{__('Tax')}}</th>
                                                        @foreach($monthList as $month)
                                                            <th>{{$month}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($incomes as $i=>$income)
                                                        <tr>
                                                            <td>{{$income['tax']}}</td>
                                                            @foreach($income['data'] as $j=>$data)
                                                                <td>{{\Auth::user()->priceFormat($data)}}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-sm-12">
                                                <h4>{{__('Expense')}}</h4>
                                                <table class="table table-flush border" id="dataTable-manual">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>{{__('Tax')}}</th>
                                                        @foreach($monthList as $month)
                                                            <th>{{$month}}</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($expenses as $i=>$expense)
                                                        <tr>
                                                            <td>{{$expense['tax']}}</td>
                                                            @foreach($expense['data'] as $j=>$data)
                                                                <td>{{\Auth::user()->priceFormat($data)}}</td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
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


