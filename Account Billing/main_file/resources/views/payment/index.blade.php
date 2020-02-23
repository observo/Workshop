@extends('layouts.admin')
@section('page-title')
    {{__('Payment')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Payment')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Payment')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{__('Manage Payment')}}</h4>
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-icon icon-left btn-primary"><i class="fas fa-filter"></i>Filter</a>
                                        <div class="dropdown-menu dropdown-list dropdown-menu-right Filter-dropdown w-64">
                                            {{ Form::open(array('route' => array('payment.index'),'method' => 'GET')) }}
                                            <div class="form-group">
                                                {{ Form::label('date', __('Date')) }}
                                                {{ Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control datepicker-range')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('account', __('Account')) }}
                                                {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('vender', __('Vender')) }}
                                                {{ Form::select('vender',$vender,isset($_GET['vender'])?$_GET['vender']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('category', __('Category')) }}
                                                {{ Form::select('category',$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('payment', __('Payment Method')) }}
                                                {{ Form::select('payment',$payment,isset($_GET['payment'])?$_GET['payment']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                                <a href="{{route('payment.index')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                    @can('create payment')
                                        <a href="#" data-url="{{ route('payment.create') }}" data-ajax-popup="true" data-title="{{__('Create New Payment')}}" class="btn btn-icon icon-left btn-primary">
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
                                                        <th> {{__('Date')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Account')}}</th>
                                                        <th> {{__('Vender')}}</th>
                                                        <th> {{__('Category')}}</th>
                                                        <th> {{__('Payment Method')}}</th>
                                                        <th> {{__('Reference')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        @if(Gate::check('edit payment') || Gate::check('delete payment'))
                                                            <th class="text-right"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach ($payments as $payment)
                                                        <tr class="font-style">
                                                            <td>{{  Auth::user()->dateFormat($payment->date)}}</td>
                                                            <td>{{  Auth::user()->priceFormat($payment->amount)}}</td>
                                                            <td>{{ $payment->bankAccount->bank_name.' '.$payment->bankAccount->holder_name}}</td>
                                                            <td>{{  !empty($payment->vender)?$payment->vender->name:''}}</td>
                                                            <td>{{  $payment->category->name}}</td>
                                                            <td>{{  $payment->paymentMethod->name}}</td>
                                                            <td>{{  $payment->reference}}</td>
                                                            <td>{{  $payment->description}}</td>

                                                            @if(Gate::check('edit revenue') || Gate::check('delete revenue'))
                                                                <td class="action text-right">
                                                                    @can('edit payment')
                                                                        <a href="#!" class="btn btn-primary btn-action mr-1" data-url="{{ route('payment.edit',$payment->id) }}" data-ajax-popup="true" data-title="{{__('Edit Payment')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete payment')
                                                                        <a href="#!" class="btn btn-danger btn-action trigger--fire-modal-1 trigger--fire-modal-2" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$payment->id}}').submit();">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['payment.destroy', $payment->id],'id'=>'delete-form-'.$payment->id]) !!}
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
