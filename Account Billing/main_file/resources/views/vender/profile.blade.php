@extends('layouts.admin')
@php
    $profile=asset(Storage::url('avatar/'));
@endphp
@section('page-title')
    {{__('Profile')}}
@endsection
@push('css-page')
    <link href="{{ asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@push('script-page')
    <script src="{{ asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Profile')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('vender.dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Profile')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-sidebar">
                            <div class="portlet light profile-sidebar-portlet ">
                                <div class="profile-userpic">
                                    <img alt="image" src="{{(!empty($userDetail->avatar))? $profile.'/'.$userDetail->avatar : $profile.'/avatar.png'}}" class="img-responsive user-profile" class="img-responsive user-profile">
                                </div>
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name font-style"> {{$userDetail->name}}</div>
                                    <div class="profile-usertitle-job"> {{$userDetail->email}}</div>
                                    <div class="profile-usertitle-job font-style"> {{'Vender'}}</div>
                                </div>
                                <div class="profile-usermenu">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4>{{__('Profile Account')}}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="setting-tab">
                                    <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#personal_info" role="tab" aria-controls="" aria-selected="true">{{__('Personal Info')}}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="billing-tab3" data-toggle="tab" href="#billing" role="tab" aria-controls="" aria-selected="false">{{__('Billing Info')}}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="shipping-tab3" data-toggle="tab" href="#shipping" role="tab" aria-controls="" aria-selected="false">{{__('Shipping Info')}}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#change_password" role="tab" aria-controls="" aria-selected="false">{{__('Change Password')}}</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane fade show active" id="personal_info" role="tabpanel" aria-labelledby="home-tab3">
                                            {{Form::model($userDetail,array('route' => array('vender.update.profile'), 'method' => 'put', 'enctype' => "multipart/form-data"))}}
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {{Form::label('name',__('Name'),array('class'=>'form-control-label'))}}
                                                        {{Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>_('Enter User Name')))}}
                                                        @error('name')
                                                        <span class="invalid-name" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    {{Form::label('email',__('Email'),array('class'=>'form-control-label'))}}
                                                    {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email')))}}
                                                    @error('email')
                                                    <span class="invalid-email" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    {{Form::label('contact',__('Contact'),array('class'=>'form-control-label'))}}
                                                    {{Form::text('contact',null,array('class'=>'form-control','placeholder'=>__('Enter User Contact')))}}
                                                    @error('contact')
                                                    <span class="invalid-contact" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail thumbnail-h2">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""></div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> {{__('Select Profile')}} </span>
                                                                <span class="fileinput-exists"> {{__('Change')}} </span>
                                                                <input type="hidden">
                                                                <input type="file" name="profile" id="logo">
                                                            </span>
                                                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> {{__('Remove')}} </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-right">
                                                    <a href="{{ route('vender.dashboard') }}" class="btn btn-secondary">{{__('Cancel')}}</a>
                                                    {{Form::submit('Save Change',array('class'=>'btn btn-primary'))}}
                                                </div>
                                            </div>
                                            {{Form::close()}}
                                        </div>
                                        <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="profile-tab3">
                                            <div class="company-setting-wrap">
                                                {{Form::model($userDetail,array('route' => array('vender.update.billing.info'), 'method' => 'put'))}}
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('billing_name',__('Billing Name'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('billing_name',null,array('class'=>'form-control','placeholder'=>_('Enter Billing Name')))}}
                                                            @error('billing_name')
                                                            <span class="invalid-billing_name" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('billing_phone',__('Billing Phone'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('billing_phone',null,array('class'=>'form-control','placeholder'=>_('Enter Billing Phone')))}}
                                                            @error('billing_phone')
                                                            <span class="invalid-billing_phone" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('billing_zip',__('Billing Zip'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('billing_zip',null,array('class'=>'form-control','placeholder'=>_('Enter Billing Zip')))}}
                                                            @error('billing_zip')
                                                            <span class="invalid-billing_zip" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('billing_country',__('Billing Country'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('billing_country',null,array('class'=>'form-control','placeholder'=>_('Enter Billing Country')))}}
                                                            @error('billing_country')
                                                            <span class="invalid-billing_country" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('billing_state',__('Billing State'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('billing_state',null,array('class'=>'form-control','placeholder'=>_('Enter Billing State')))}}
                                                            @error('billing_state')
                                                            <span class="invalid-billing_state" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('billing_city',__('Billing City'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('billing_city',null,array('class'=>'form-control','placeholder'=>_('Enter Billing City')))}}
                                                            @error('billing_city')
                                                            <span class="invalid-billing_city" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('billing_address',__('Billing Address'),array('class'=>'form-control-label'))}}
                                                            {{Form::textarea('billing_address',null,array('class'=>'form-control','placeholder'=>_('Enter Billing Address')))}}
                                                            @error('billing_address')
                                                            <span class="invalid-billing_address" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 text-right">
                                                        <a href="{{ route('vender.dashboard') }}" class="btn btn-secondary">{{__('Cancel')}}</a>
                                                        {{Form::submit('Save Change',array('class'=>'btn btn-primary'))}}
                                                    </div>
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="profile-tab3">
                                            <div class="company-setting-wrap">
                                                {{Form::model($userDetail,array('route' => array('vender.update.shipping.info'), 'method' => 'put'))}}
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('shipping_name',__('Shipping Name'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('shipping_name',null,array('class'=>'form-control','placeholder'=>_('Enter Shipping Name')))}}
                                                            @error('shipping_name')
                                                            <span class="invalid-shipping_name" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('shipping_phone',__('Shipping Phone'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('shipping_phone',null,array('class'=>'form-control','placeholder'=>_('Enter Shipping Phone')))}}
                                                            @error('shipping_phone')
                                                            <span class="invalid-shipping_phone" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('shipping_zip',__('Shipping Zip'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('shipping_zip',null,array('class'=>'form-control','placeholder'=>_('Enter Shipping Zip')))}}
                                                            @error('shipping_zip')
                                                            <span class="invalid-shipping_zip" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('shipping_country',__('Shipping Country'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('shipping_country',null,array('class'=>'form-control','placeholder'=>_('Enter Shipping Country')))}}
                                                            @error('shipping_country')
                                                            <span class="invalid-shipping_country" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('shipping_state',__('Shipping State'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('shipping_state',null,array('class'=>'form-control','placeholder'=>_('Enter Shipping State')))}}
                                                            @error('shipping_state')
                                                            <span class="invalid-shipping_state" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {{Form::label('shipping_city',__('Shipping City'),array('class'=>'form-control-label'))}}
                                                            {{Form::text('shipping_city',null,array('class'=>'form-control','placeholder'=>_('Enter Shipping City')))}}
                                                            @error('shipping_city')
                                                            <span class="invalid-shipping_city" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('shipping_address',__('Shipping Address'),array('class'=>'form-control-label'))}}
                                                            {{Form::textarea('shipping_address',null,array('class'=>'form-control','placeholder'=>_('Enter Shipping Address')))}}
                                                            @error('shipping_address')
                                                            <span class="invalid-billing_address" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 text-right">
                                                        <a href="{{ route('vender.dashboard') }}" class="btn btn-secondary">{{__('Cancel')}}</a>
                                                        {{Form::submit('Save Change',array('class'=>'btn btn-primary'))}}
                                                    </div>
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="profile-tab3">
                                            <div class="company-setting-wrap">
                                                {{Form::model($userDetail,array('route' => array('vender.update.password',$userDetail->id), 'method' => 'put'))}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {{Form::label('current_password',__('Current Password'),array('class'=>'form-control-label'))}}
                                                            {{Form::password('current_password',null,array('class'=>'form-control','placeholder'=>_('Enter Current Password')))}}
                                                            @error('current_password')
                                                            <span class="invalid-current_password" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{Form::label('new_password',__('New Password'),array('class'=>'form-control-label'))}}
                                                        {{Form::password('new_password',null,array('class'=>'form-control','placeholder'=>_('Enter New Password')))}}
                                                        @error('new_password')
                                                        <span class="invalid-new_password" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{Form::label('confirm_password',__('Re-type New Password'),array('class'=>'form-control-label'))}}
                                                        {{Form::password('confirm_password',null,array('class'=>'form-control','placeholder'=>_('Enter Re-type New Password')))}}
                                                        @error('confirm_password')
                                                        <span class="invalid-confirm_password" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-12 text-right">
                                                        <a href="{{ route('vender.dashboard') }}" class="btn btn-secondary">{{__('Cancel')}}</a>
                                                        {{Form::submit('Save Change',array('class'=>'btn btn-primary'))}}
                                                    </div>
                                                </div>
                                                {{Form::close()}}
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
