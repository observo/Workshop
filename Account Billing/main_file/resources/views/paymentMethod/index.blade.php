@extends('layouts.admin')

@section('page-title')
    {{__('Payment Method')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Payment Method')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Payment Method')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{__('Manage Payment Method')}}</h4>
                                @can('create constant payment method')
                                    <a href="#" data-url="{{ route('payment-method.create') }}" data-ajax-popup="true" data-title="{{__('Create New Payment Method')}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus"></i> {{__('Create')}}
                                    </a>
                                @endcan
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
                                                        <th>{{__('Title')}}</th>
                                                        @if(Gate::check('edit constant payment method') || Gate::check('delete constant payment method'))
                                                            <th class="text-right"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($paymentMethods as $paymentMethod)
                                                        <tr class="font-style">
                                                            <td>{{ $paymentMethod->name }}</td>
                                                            @if(Gate::check('edit constant payment method') || Gate::check('delete constant payment method'))
                                                                <td class="action text-right">
                                                                    @can('edit constant payment method')
                                                                        <a href="#!" data-url="{{ route('payment-method.edit',$paymentMethod->id) }}" data-ajax-popup="true" data-title="{{__('Edit Payment Method')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete constant payment method')
                                                                        <a href="#!" class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$paymentMethod->id}}').submit();">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['payment-method.destroy', $paymentMethod->id],'id'=>'delete-form-'.$paymentMethod->id]) !!}
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
