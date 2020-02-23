@extends('layouts.admin')
@section('page-title')
    {{__('Bill')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Bill')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Bill')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{__('Manage Bill')}}</h4>
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-icon icon-left btn-primary"><i class="fas fa-filter"></i>{{__('Filter')}}</a>
                                        <div class="dropdown-menu dropdown-list dropdown-menu-right Filter-dropdown w-64">
                                            @if(!\Auth::guard('vender')->check())
                                                {{ Form::open(array('route' => array('bill.index'),'method' => 'GET')) }}
                                            @else
                                                {{ Form::open(array('route' => array('vender.bill'),'method' => 'GET')) }}
                                            @endif
                                            @if(!\Auth::guard('vender')->check())
                                                <div class="form-group">
                                                    {{ Form::label('vender', __('Vender')) }}
                                                    {{ Form::select('vender',$vender,isset($_GET['vender'])?$_GET['vender']:'', array('class' => 'form-control font-style selectric')) }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                {{ Form::label('bill_date', __('Date')) }}
                                                {{ Form::text('bill_date', isset($_GET['bill_date'])?$_GET['bill_date']:null, array('class' => 'form-control datepicker-range')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('status', __('Status')) }}
                                                {{ Form::select('status', [''=>'All'] + $status,isset($_GET['status'])?$_GET['status']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                                @if(!\Auth::guard('vender')->check())
                                                    <a href="{{route('bill.index')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                                @else
                                                    <a href="{{route('vender.bill')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                                @endif

                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                    @can('create bill')
                                        <a href="{{ route('bill.create') }}" class="btn btn-icon icon-left btn-primary">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text"> {{__('Create')}}</span>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush" id="dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Bill')}}</th>
                                                        @if(!\Auth::guard('vender')->check())
                                                            <th> {{__('Vendor')}}</th>
                                                        @endif
                                                        <th> {{__('Category')}}</th>
                                                        <th> {{__('Bill Date')}}</th>
                                                        <th> {{__('Due Date')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        @if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill'))
                                                            <th class="text-right"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($bills as $bill)
                                                        <tr class="font-style">
                                                            <td>
                                                                @if(\Auth::guard('vender')->check())
                                                                    <a class="btn btn-outline-primary" href="{{ route('vender.bill.show',$bill->bill_id) }}">{{ AUth::user()->billNumberFormat($bill->id) }}
                                                                    </a>
                                                                @else
                                                                    <a class="btn btn-outline-primary" href="{{ route('bill.show',$bill->id) }}">{{ AUth::user()->billNumberFormat($bill->id) }}
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            @if(!\Auth::guard('vender')->check())
                                                                <td> {{ (!empty( $bill->vender)?$bill->vender->name:'') }} </td>
                                                            @endif
                                                            <td>{{ $bill->category->name}}</td>
                                                            <td>{{ Auth::user()->dateFormat($bill->bill_date) }}</td>
                                                            <td>{{ Auth::user()->dateFormat($bill->due_date) }}</td>
                                                            <td>
                                                                @if($bill->status == 0)
                                                                    <span class="badge badge-primary">{{ __(\App\Invoice::$statues[$bill->status]) }}</span>
                                                                @elseif($bill->status == 1)
                                                                    <span class="badge badge-warning">{{ __(\App\Invoice::$statues[$bill->status]) }}</span>
                                                                @elseif($bill->status == 2)
                                                                    <span class="badge badge-danger">{{ __(\App\Invoice::$statues[$bill->status]) }}</span>
                                                                @elseif($bill->status == 3)
                                                                    <span class="badge badge-info">{{ __(\App\Invoice::$statues[$bill->status]) }}</span>
                                                                @elseif($bill->status == 4)
                                                                    <span class="badge badge-success">{{ __(\App\Invoice::$statues[$bill->status]) }}</span>
                                                                @endif
                                                            </td>
                                                            @if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill'))
                                                                <td class="action text-right">
                                                                    @can('show bill')
                                                                        @if(\Auth::guard('vender')->check())
                                                                            <a href="{{ route('vender.bill.show',$bill->bill_id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="{{__('Detail')}}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('bill.show',$bill->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="{{__('Detail')}}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endcan
                                                                    @can('edit bill')
                                                                        <a href="{{ route('bill.edit',$bill->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete bill')
                                                                        <a href="#!" class="btn btn-danger btn-action trigger--fire-modal-1 trigger--fire-modal-2" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$bill->id}}').submit();">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['bill.destroy', $bill->id],'id'=>'delete-form-'.$bill->id]) !!}
                                                                        {!! Form::close() !!}
                                                                    @endcan
                                                                </td>
                                                            @endif
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
