{{ Form::open(array('url' => 'product-category')) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('name', __('Category Name')) }}
        {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-12">
        <div class="input-group">
            {{ Form::label('type', __('Category Type')) }}
            {{ Form::select('type',$types,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('color', __('Category Color')) }}
        {{ Form::text('color', '', array('class' => 'form-control jscolor','required'=>'required')) }}
        <p class="small">{{__('For chart representation')}}</p>
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}

