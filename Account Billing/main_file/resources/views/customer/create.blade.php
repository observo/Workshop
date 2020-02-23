{{Form::open(array('url'=>'customer','method'=>'post'))}}
<h4 class="sub-title">{{__('Basic Info')}}</h4>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('name',__('Name'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-address-card"></i>
                    </div>
                </div>
                {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('contact',__('Contact'))}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
                {{Form::text('contact',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('email',__('Email'))}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="far fa-envelope"></i>
                    </div>
                </div>
                {{Form::text('email',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('password',__('Password'))}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-key"></i>
                    </div>
                </div>
                {{Form::password('password',array('class'=>'form-control','required'=>'required','minlength'=>"6"))}}
            </div>
        </div>
    </div>
</div>
<h4 class="sub-title">{{__('BIlling Address')}}</h4>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('billing_name',__('Name'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-address-card"></i>
                    </div>
                </div>
                {{Form::text('billing_name',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('billing_country',__('Country'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="far fa-flag"></i>
                    </div>
                </div>
                {{Form::text('billing_country',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('billing_state',__('State'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-chess-pawn"></i>
                    </div>
                </div>
                {{Form::text('billing_state',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('billing_city',__('City'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-city"></i>
                    </div>
                </div>
                {{Form::text('billing_city',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('billing_phone',__('Phone'),array('class'=>'')) }}
            <label class="form-control-label" for="example2cols1Input"></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
                {{Form::text('billing_phone',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('billing_zip',__('Zip Code'),array('class'=>'')) }}
            <label class="form-control-label" for="example2cols1Input"></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-crosshairs"></i>
                    </div>
                </div>
                {{Form::text('billing_zip',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('billing_address',__('Address'),array('class'=>'')) }}
            <label class="form-control-label" for="example2cols1Input"></label>
            <div class="input-group">
                {{Form::textarea('billing_address',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>

</div>
<div class="col-md-12 text-right">
    <a href="#" class="btn btn-info"  id="billing_data">{{__('Shipping Same As Billing')}}</a>
</div>
<h4 class="sub-title">{{__('Shipping Address')}}</h4>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('shipping_name',__('Name'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-address-card"></i>
                    </div>
                </div>
                {{Form::text('shipping_name',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('shipping_country',__('Country'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="far fa-flag"></i>
                    </div>
                </div>
                {{Form::text('shipping_country',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('shipping_state',__('State'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-chess-pawn"></i>
                    </div>
                </div>
                {{Form::text('shipping_state',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('shipping_city',__('City'),array('class'=>'')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-city"></i>
                    </div>
                </div>
                {{Form::text('shipping_city',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('shipping_phone',__('Phone'),array('class'=>'')) }}
            <label class="form-control-label" for="example2cols1Input"></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
                {{Form::text('shipping_phone',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="form-group">
            {{Form::label('shipping_zip',__('Zip Code'),array('class'=>'')) }}
            <label class="form-control-label" for="example2cols1Input"></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-crosshairs"></i>
                    </div>
                </div>
                {{Form::text('shipping_zip',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('shipping_address',__('Address'),array('class'=>'')) }}
            <label class="form-control-label" for="example2cols1Input"></label>
            <div class="input-group">
                {{Form::textarea('shipping_address',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
    {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
</div>

{{Form::close()}}

