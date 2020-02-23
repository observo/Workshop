@extends('layouts.admin')
@section('page-title')
    {{__('Tax Rate')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Tax Rate')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Tax Rate')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{__('Manage Tax Rate')}}</h4>
                                @can('create constant tax')
                                    <div class="col-auto">
                                        <a href="#" data-url="{{ route('taxes.create') }}" data-ajax-popup="true" data-title="{{__('Create Tax Rate')}}" class="btn btn-icon icon-left btn-primary">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text"> {{__('Create')}}</span>
                                        </a>
                                    </div>
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

                                                        <th> {{__('Tax Name')}}</th>
                                                        <th> {{__('Rate %')}}</th>
                                                        <th class="text-right"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($taxes as $taxe)
                                                        <tr class="font-style">
                                                            <td>{{ $taxe->name }}</td>
                                                            <td>{{ $taxe->rate }}</td>
                                                            <td class="action text-right">
                                                                @can('edit constant tax')
                                                                    <a href="#!" class="btn btn-primary btn-action mr-1" data-url="{{ route('taxes.edit',$taxe->id) }}" data-ajax-popup="true" data-title="{{__('Edit Tax Rate')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete constant tax')
                                                                    <a href="#" class="btn btn-danger btn-action trigger--fire-modal-1 trigger--fire-modal-39" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$taxe->id}}').submit();">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['taxes.destroy', $taxe->id],'id'=>'delete-form-'.$taxe->id]) !!}
                                                                    {!! Form::close() !!}
                                                                @endcan
                                                            </td>
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
