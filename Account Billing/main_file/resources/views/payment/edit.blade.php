{{ Form::model($payment, array('route' => array('payment.update', $payment->id), 'method' => 'PUT')) }}
<div class="row">
    <div class="form-group  col-md-6">
        {{ Form::label('date', __('Date')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>
            {{ Form::text('date', null, array('class' => 'form-control datepicker','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('amount', __('Amount')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
            {{ Form::text('amount', null, array('class' => 'form-control','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        <div class="input-group">
            {{ Form::label('account_id', __('Account')) }}
            {{ Form::select('account_id',$accounts,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        <div class="input-group">
            {{ Form::label('vender_id', __('Vender')) }}
            {{ Form::select('vender_id', $venders,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-12">
        {{ Form::label('description', __('Description')) }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group  col-md-6">
        <div class="input-group">
            {{ Form::label('category_id', __('Category')) }}
            {{ Form::select('category_id', $categories,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        <div class="input-group">
            {{ Form::label('payment_method', __('Payment Method')) }}
            {{ Form::select('payment_method', $payments,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('reference', __('Reference')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="far fa-sticky-note"></i>
                </div>
            </div>
            {{ Form::text('reference', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}




