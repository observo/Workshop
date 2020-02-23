@extends('layouts.admin')
@section('page-title')
    {{__('Invoice')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Invoice')}}</h1>
            <div class="section-header-breadcrumb">
                @if(\Auth::guard('customer')->check())
                    <div class="breadcrumb-item active"><a href="{{route('customer.dashboard')}}">{{__('Dashboard')}}</a></div>
                @else
                    <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                @endif
                <div class="breadcrumb-item">{{__('Invoice')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{__('Manage Invoice')}}</h4>
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-icon icon-left btn-primary"><i class="fas fa-filter"></i>{{__('Filter')}}</a>
                                        <div class="dropdown-menu dropdown-list dropdown-menu-right Filter-dropdown w-64">
                                            @if(!\Auth::guard('customer')->check())
                                                {{ Form::open(array('route' => array('invoice.index'),'method' => 'GET')) }}
                                            @else
                                                {{ Form::open(array('route' => array('customer.invoice'),'method' => 'GET')) }}
                                            @endif
                                            @if(!\Auth::guard('customer')->check())
                                                <div class="form-group">
                                                    {{ Form::label('customer', __('Customer')) }}
                                                    {{ Form::select('customer',$customer,isset($_GET['customer'])?$_GET['customer']:'', array('class' => 'form-control font-style selectric')) }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                {{ Form::label('issue_date', __('Date')) }}
                                                {{ Form::text('issue_date', isset($_GET['issue_date'])?$_GET['issue_date']:null, array('class' => 'form-control datepicker-range')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('status', __('Status')) }}
                                                {{ Form::select('status', [''=>'All']+$status,isset($_GET['status'])?$_GET['status']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                                @if(!\Auth::guard('customer')->check())
                                                    <a href="{{route('invoice.index')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                                @else
                                                    <a href="{{route('customer.invoice')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                                @endif
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                    @can('create bank account')
                                        <a href="{{ route('invoice.create') }}" class="btn btn-icon icon-left btn-primary">
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

                                                        <th> {{__('Invoice')}}</th>
                                                        @if(!\Auth::guard('customer')->check())
                                                            <th> {{__('Customer')}}</th>
                                                        @endif
                                                        <th> {{__('Category')}}</th>
                                                        <th> {{__('Isuue Date')}}</th>
                                                        <th> {{__('Due Date')}}</th>
                                                        <th> {{__('Status')}}</th>
                                                        @if(Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice'))
                                                            <th class="text-right"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($invoices as $invoice)
                                                        <tr class="font-style">
                                                            <td>
                                                                @if(\Auth::guard('customer')->check())
                                                                    <a class="btn btn-outline-primary" href="{{ route('customer.invoice.show',$invoice->invoice_id) }}">{{ AUth::user()->invoiceNumberFormat($invoice->invoice_id) }}
                                                                    </a>
                                                                @else
                                                                    <a class="btn btn-outline-primary" href="{{ route('invoice.show',$invoice->id) }}">{{ AUth::user()->invoiceNumberFormat($invoice->invoice_id) }}
                                                                    </a>
                                                                @endif

                                                            </td>
                                                            @if(!\Auth::guard('customer')->check())
                                                                <td> {{!empty($invoice->customer())? $invoice->customer()->name:'' }} </td>
                                                            @endif
                                                            <td>{{ $invoice->category->name}}</td>
                                                            <td>{{ Auth::user()->dateFormat($invoice->issue_date) }}</td>
                                                            <td>{{ Auth::user()->dateFormat($invoice->due_date) }}</td>
                                                            <td>
                                                                @if($invoice->status == 0)
                                                                    <span class="badge badge-primary">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                                                @elseif($invoice->status == 1)
                                                                    <span class="badge badge-warning">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                                                @elseif($invoice->status == 2)
                                                                    <span class="badge badge-danger">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                                                @elseif($invoice->status == 3)
                                                                    <span class="badge badge-info">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                                                @elseif($invoice->status == 4)
                                                                    <span class="badge badge-success">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                                                @endif
                                                            </td>
                                                            @if(Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice'))
                                                                <td class="action text-right">
                                                                    @can('show invoice')
                                                                        @if(\Auth::guard('customer')->check())
                                                                            <a href="{{ route('customer.invoice.show',$invoice->invoice_id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="{{__('Detail')}}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('invoice.show',$invoice->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="{{__('Detail')}}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endcan
                                                                    @can('edit invoice')
                                                                        <a href="{{ route('invoice.edit',$invoice->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete invoice')
                                                                        <a href="#!" class="btn btn-danger btn-action trigger--fire-modal-1 trigger--fire-modal-2" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$invoice->id}}').submit();">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['invoice.destroy', $invoice->id],'id'=>'delete-form-'.$invoice->id]) !!}
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
