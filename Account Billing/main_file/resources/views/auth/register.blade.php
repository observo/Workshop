@extends('layouts.auth')
@php
    $logo=asset(Storage::url('logo/'));
@endphp
@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-4">
                    <div class="changeLanguage float-right mr-1 position-relative">
                        <select name="language" id="language" class="form-control w-25 position-absolute selectric" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            @foreach(Utility::languages() as $language)
                                <option @if($lang == $language) selected @endif value="{{ route('register',$language) }}">{{Str::upper($language)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" src="{{$logo.'/logo.png'}} " alt="">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>{{ __('Free Sign Up') }}</h4></div>

                        <div class="card-body">
                            {{Form::open(array('route'=>'register','method'=>'post','id'=>'loginForm'))}}
                            <div class="row">
                                <div class="form-group col-6">
                                    {{Form::label('name',__('Name'))}}
                                    {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Your Name')))}}
                                    @error('name')
                                    <span class="invalid-name text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    {{Form::label('email',__('Email'))}}
                                    {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))}}
                                    @error('email')
                                    <span class="invalid-email text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    {{Form::label('password',__('Password'))}}
                                    {{Form::password('password',array('class'=>'form-control','placeholder'=>__('Enter Your Password')))}}
                                    @error('password')
                                    <span class="invalid-password text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    {{Form::label('password_confirmation',__('Password Confirmation'))}}
                                    {{Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>__('Enter Your Password')))}}
                                    @error('password')
                                    <span class="invalid-password_confirmation text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                    <label class="custom-control-label" for="agree">{{__('I agree with the terms and conditions')}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::submit(__('Sign Up'),array('class'=>'btn btn-primary btn-lg btn-block','id'=>'saveBtn'))}}
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        {{__('Already Have Account?')}} <a href="{{ route('login') }}">{{ __('Log In') }}</a>
                    </div>
                    <div class="simple-footer">
                        {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright AccountGo') }} {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
