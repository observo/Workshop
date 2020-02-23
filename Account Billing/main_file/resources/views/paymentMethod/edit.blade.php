{{ Form::model($paymentMethod, array('route' => array('payment-method.update', $paymentMethod->id), 'method' => 'PUT')) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('name', __('Payment Method')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-credit-card"></i>
                </div>
            </div>
            {{ Form::text('name', null, array('class' => 'form-control','required'=>'required')) }}
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}



