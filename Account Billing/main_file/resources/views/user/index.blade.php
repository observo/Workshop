@extends('layouts.admin')
@php
    $profile=asset(Storage::url('avatar/'));
@endphp
@section('page-title')
    {{__('User')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('User')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('User')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <h4>{{__('Manage User')}}</h4>
                            @can('create user')
                                <a href="#" data-url="{{ route('users.create') }}" data-ajax-popup="true" data-title="{{__('Create New User')}}" class="btn btn-icon icon-left btn-primary">
                                    <i class="fa fa-plus"></i> {{__('Create')}}
                                </a>
                            @endcan
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="staff-wrap">
                            <div class="row">
                                @foreach($users as $user)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="staff staff-grid-view pb-0">
                                            <div class="more-action">
                                                @if($user->is_active==1)
                                                    <div class="dropdown">
                                                        @if($user->is_active!=1) <i class="fas fa-lock mr-1"></i>@endif
                                                        <a href="" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1.13672 0.804688C1.42318 0.518229 1.7526 0.375 2.125 0.375C2.4974 0.375 2.8125 0.518229 3.07031 0.804688C3.35677 1.0625 3.5 1.3776 3.5 1.75C3.5 2.1224 3.35677 2.45182 3.07031 2.73828C2.8125 2.99609 2.4974 3.125 2.125 3.125C1.7526 3.125 1.42318 2.99609 1.13672 2.73828C0.878906 2.45182 0.75 2.1224 0.75 1.75C0.75 1.3776 0.878906 1.0625 1.13672 0.804688ZM8.01172 0.804688C8.29818 0.518229 8.6276 0.375 9 0.375C9.3724 0.375 9.6875 0.518229 9.94531 0.804688C10.2318 1.0625 10.375 1.3776 10.375 1.75C10.375 2.1224 10.2318 2.45182 9.94531 2.73828C9.6875 2.99609 9.3724 3.125 9 3.125C8.6276 3.125 8.29818 2.99609 8.01172 2.73828C7.75391 2.45182 7.625 2.1224 7.625 1.75C7.625 1.3776 7.75391 1.0625 8.01172 0.804688ZM14.8867 0.804688C15.1732 0.518229 15.5026 0.375 15.875 0.375C16.2474 0.375 16.5625 0.518229 16.8203 0.804688C17.1068 1.0625 17.25 1.3776 17.25 1.75C17.25 2.1224 17.1068 2.45182 16.8203 2.73828C16.5625 2.99609 16.2474 3.125 15.875 3.125C15.5026 3.125 15.1732 2.99609 14.8867 2.73828C14.6289 2.45182 14.5 2.1224 14.5 1.75C14.5 1.3776 14.6289 1.0625 14.8867 0.804688Z"
                                                                    fill="#778CA2"></path>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            @can('edit user')
                                                                <a href="#" class="dropdown-item" data-url="{{ route('users.edit',$user->id) }}" data-ajax-popup="true" data-title="{{__('Update User')}}">{{__('Edit')}}</a>
                                                            @endcan
                                                            @can('delete user')
                                                                <a class="dropdown-item" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$user['id']}}').submit();">
                                                                    <span>@if($user->delete_status!=0){{__('Delete')}} @else {{__('Restore')}}@endif</span>
                                                                </a>
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user['id']],'id'=>'delete-form-'.$user['id']]) !!}
                                                                {!! Form::close() !!}
                                                            @endcan
                                                        </div>
                                                    </div>
                                                @else
                                                    <i class="fas fa-lock"></i>
                                                @endif
                                            </div>
                                            <div class="contact-img">
                                                <img src="{{(!empty($user->avatar))? asset(Storage::url("avatar/".$user->avatar)): asset(Storage::url("avatar/avatar.png"))}}" class="rounded-circle">
                                            </div>
                                            <div class="main-info mb-4">
                                                <h2 class="m-0 font-style ">{{$user->name}}</h2>
                                                <p class="font-style"> {{$user->type}}</p>
                                            </div>
                                            <div class="meta-info mb-3">
                                                <p> {{$user->email}}</p>
                                                @if($user->delete_status==0)
                                                    <p class="soft-del">{{__('Soft Deleted')}}</p>
                                                @endif
                                            </div>
                                            @if(\Auth::user()->type == 'super admin')
                                                <div class="btn-wrap">
                                                    <button class="btn" title="Total Users">
                                                        <i class="fas fa-user"></i>
                                                        <span class="pl-2">{{$user->totalCompanyUser($user->id)}}</span>
                                                    </button>
                                                    <button class="btn" title="Total Customers">
                                                        <i class="fas fa-users"></i>
                                                        <span class="pl-2">{{$user->totalCompanyCustomer($user->id)}}</span>
                                                    </button>
                                                    <button class="btn" title="Total Venders">
                                                        <i class="fas fa-users"></i>
                                                        <span class="pl-2">{{$user->totalCompanyVender($user->id)}}</span>
                                                    </button>
                                                </div>

                                            @endif
                                        </div>
                                    </div>
                                @endforeach
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
