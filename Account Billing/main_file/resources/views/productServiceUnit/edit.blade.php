{{ Form::model($unit, array('route' => array('product-unit.update', $unit->id), 'method' => 'PUT')) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('name', __('Unit Name')) }}
        {{ Form::text('name', null, array('class' => 'form-control font-style','required'=>'required')) }}
        @error('name')
        <span class="invalid-name" role="alert">
        <strong class="text-danger">{{ $message }}</strong>
    </span>
        @enderror
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}
