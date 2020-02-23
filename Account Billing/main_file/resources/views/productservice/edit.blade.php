{{ Form::model($productService, array('route' => array('productservice.update', $productService->id), 'method' => 'PUT')) }}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('name', __('Name')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-address-card"></i>
                    </div>
                </div>
                {{ Form::text('name', null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('sku', __('SKU')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-key"></i>
                    </div>
                </div>
                {{ Form::text('sku', null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
    </div>
    <div class="form-group  col-md-12">
        {{ Form::label('description', __('Description')) }}
        {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>'2']) !!}
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('sale_price', __('Sale Price')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="far fa-money-bill-alt"></i>
                    </div>
                </div>
                {{ Form::text('sale_price', null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('purchase_price', __('Purchase Price')) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="far fa-money-bill-alt"></i>
                    </div>
                </div>
                {{ Form::text('purchase_price', null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
    </div>

    <div class="form-group  col-md-6">
        {{ Form::label('tax_id', __('Tax')) }}
        {{ Form::select('tax_id', $tax,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('category_id', __('Category')) }}
        {{ Form::select('category_id', $category,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('unit_id', __('Unit')) }}
        {{ Form::select('unit_id', $unit,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="d-block">{{__('Type')}}</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadio5" name="type" value="product" @if($productService->type=='product') checked @endif onclick="hide_show(this)">
                        <label class="custom-control-label" for="customRadio5">{{__('Product')}}</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadio6" name="type" value="service" @if($productService->type=='service') checked @endif   onclick="hide_show(this)">
                        <label class="custom-control-label" for="customRadio6">{{__('Service')}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}



