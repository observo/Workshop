{{ Form::open(array('url' => 'transfer')) }}
<div class="row">
    <div class="form-group  col-md-6">
        {{ Form::label('from_account', __('From Account')) }}
        {{ Form::select('from_account', $bankAccount,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('to_account', __('To Account')) }}
        {{ Form::select('to_account', $bankAccount,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('amount', __('Amount')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
            {{ Form::text('amount', '', array('class' => 'form-control','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('date', __('Date')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>
            {{ Form::text('date', '', array('class' => 'form-control datepicker','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('payment_method', __('Payment Method')) }}
        {{ Form::select('payment_method', $paymentMethod,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('reference', __('Reference')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-clipboard"></i>
                </div>
            </div>
            {{ Form::text('reference', '', array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group  col-md-12">
        {{ Form::label('description', __('Description')) }}
        {{ Form::textarea('description', '', array('class' => 'form-control')) }}
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}
