@extends('layouts.admin')
@section('page-title')
    {{__('Bank Balance Transfer')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Bank Balance Transfer')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Balance Detail')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{__('Manage Account Balance')}}</h4>
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-icon icon-left btn-primary"><i class="fas fa-filter"></i>{{__('Filter')}}</a>
                                        <div class="dropdown-menu dropdown-list dropdown-menu-right Filter-dropdown w-64">
                                            {{ Form::open(array('route' => array('transfer.index'),'method' => 'GET')) }}
                                            <div class="form-group">
                                                {{ Form::label('date', __('Date')) }}
                                                {{ Form::text('date', isset($_GET['date'])?$_GET['date']:'', array('class' => 'form-control datepicker-range')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('from_account', __('From Account')) }}
                                                {{ Form::select('from_account',$account,isset($_GET['from_account'])?$_GET['from_account']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('to_account', __('To Account')) }}
                                                {{ Form::select('to_account', $account,isset($_GET['to_account'])?$_GET['to_account']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                                <a href="{{route('transfer.index')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                    @can('create transfer')
                                        <a href="#" data-url="{{ route('transfer.create') }}" data-ajax-popup="true" data-title="{{__('Transfer Account Balance')}}" class="btn btn-icon icon-left btn-primary">
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
                                                        <th> {{__('From Account')}}</th>
                                                        <th> {{__('To Account')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Payment Method')}}</th>
                                                        <th> {{__('Reference')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        @if(Gate::check('edit transfer') || Gate::check('delete transfer'))
                                                            <th class="text-right"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($transfers as $transfer)
                                                        <tr class="font-style">
                                                            <td>{{ \Auth::user()->dateFormat( $transfer->date) }}</td>
                                                            <td>{{$transfer->fromBankAccount()->bank_name.' '.$transfer->fromBankAccount()->holder_name}}</td>
                                                            <td>{{ $transfer->toBankAccount()->bank_name.' '. $transfer->toBankAccount()->holder_name}}</td>
                                                            <td>{{  \Auth::user()->priceFormat( $transfer->amount)}}</td>
                                                            <td>{{  $transfer->paymentMethod()->name}}</td>
                                                            <td>{{  $transfer->reference}}</td>
                                                            <td>{{  $transfer->description}}</td>

                                                            @if(Gate::check('edit transfer') || Gate::check('delete transfer'))
                                                                <td class="action text-right">
                                                                    @can('edit transfer')
                                                                        <a href="#!" class="btn btn-primary btn-action mr-1" data-url="{{ route('transfer.edit',$transfer->id) }}" data-ajax-popup="true" data-title="{{__('Edit Amount Transfer')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete transfer')
                                                                        <a href="#!" class="btn btn-danger btn-action trigger--fire-modal-1 trigger--fire-modal-2" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$transfer->id}}').submit();">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['transfer.destroy', $transfer->id],'id'=>'delete-form-'.$transfer->id]) !!}
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

