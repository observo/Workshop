@extends('layouts.admin')

@section('page-title')
    {{__('Role')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Role')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Role')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <h4>{{__('Role')}}</h4>
                            @can('create user')
                                <a href="#" data-url="{{ route('roles.create') }}" data-size="xl" data-ajax-popup="true" data-title="{{__('Create New User')}}" class="btn btn-icon icon-left btn-primary">
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
                                            <table class="table table-striped table-bordered dataTable" id="dataTable">
                                                <thead>
                                                <tr>
                                                    <th width="150">{{__('Role')}} </th>
                                                    <th>{{__('Permissions')}} </th>
                                                    <th width="150">{{__('Action')}} </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($roles as $role)
                                                    <tr class="font-style">
                                                        <td width="150">{{ $role->name }}</td>
                                                        <td>
                                                            <div class="badges">
                                                                @for($j=0;$j<count($role->permissions()->pluck('name'));$j++)
                                                                    <span class="badge badge-primary">{{$role->permissions()->pluck('name')[$j]}}</span>
                                                                @endfor
                                                            </div>
                                                        </td>
                                                        <td class="action">

                                                            @can('edit role')
                                                                <a href="#" class="btn btn-primary btn-action mr-1" data-url="{{ route('roles.edit',$role->id) }}" data-size="xl" data-ajax-popup="true" data-toggle="tooltip" data-original-title="{{__('Edit')}}" data-title="{{__('Update Role')}}">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            @endcan
                                                            @can('delete role')
                                                                <a href="#" class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$role->id}}').submit();"><i class="fas fa-trash"></i></a>

                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id],'id'=>'delete-form-'.$role->id]) !!}
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
        <div class="section-body">
        </div>
    </section>
@endsection
