@extends('layouts.admin')
@section('page-title')
    {{__('Bill Edit')}}
@endsection
@push('script-page')
    <script src="{{asset('assets/js/jquery.repeater.min.js')}}"></script>
    <script>
        var selector = "body";
        if ($(selector + " .repeater").length) {
            var $dragAndDrop = $("body .repeater tbody").sortable({
                handle: '.sort-handler'
            });
            var $repeater = $(selector + ' .repeater').repeater({
                initEmpty: true,
                defaultValues: {
                    'status': 1
                },
                show: function () {
                    $(this).slideDown();
                    var file_uploads = $(this).find('input.multi');
                    if (file_uploads.length) {
                        $(this).find('input.multi').MultiFile({
                            max: 3,
                            accept: 'png|jpg|jpeg',
                            max_size: 2048
                        });
                    }
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        var el = $(this).parent().parent().parent().parent();
                        var id = $(el.find('.id')).val();
                        $.ajax({
                            url: '{{route('bill.product.destroy')}}',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': jQuery('#token').val()
                            },
                            data: {
                                'id': id
                            },
                            cache: false,
                            success: function (data) {
                            },
                        });

                        $(this).slideUp(deleteElement);
                        $(this).remove();
                        var inputs = $(".amount");
                        var subTotal = 0;
                        for (var i = 0; i < inputs.length; i++) {
                            subTotal = parseFloat(subTotal) + parseFloat($(inputs[i]).html());
                        }
                        $('.subTotal').html(subTotal.toFixed(2));
                        $('.totalAmount').html(subTotal.toFixed(2));
                    }
                },
                ready: function (setIndexes) {
                    $dragAndDrop.on('drop', setIndexes);
                },
                isFirstItemUndeletable: true
            });
            var value = $(selector + " .repeater").attr('data-value');
            if (typeof value != 'undefined' && value.length != 0) {
                value = JSON.parse(value);
                $repeater.setList(value);
                for (var i = 0; i < value.length; i++) {
                    var tr = $('#sortable-table .id[value="' + value[i].id + '"]').parent();
                    tr.find('.item').val(value[i].product_id);
                    changeItem(tr.find('.item'));
                }
            }

        }

        function changeItem(element) {
            var iteams_id = element.val();
            var url = element.data('url');
            var el = element;
            $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': jQuery('#token').val()
                },
                data: {
                    'product_id': iteams_id
                },
                cache: false,
                success: function (data) {
                    var item = JSON.parse(data);
                    $(el.parent().parent().find('.quantity')).val(1);
                    $(el.parent().parent().find('.price')).val(item.product.sale_price);
                    $(el.parent().parent().find('.tax')).val(item.taxRate);
                    $(el.parent().parent().find('.unit')).html(item.unit);
                    $(el.parent().parent().find('.discount')).val(0);
                    $(el.parent().parent().find('.amount')).html(item.totalAmount);

                    var inputs = $(".amount");
                    var subTotal = 0;
                    for (var i = 0; i < inputs.length; i++) {
                        subTotal = parseFloat(subTotal) + parseFloat($(inputs[i]).html());
                    }
                    $('.subTotal').html(subTotal.toFixed(2));
                    $('.totalAmount').html(subTotal.toFixed(2));
                },
            });
        }

        $(document).on('change', '.item', function () {
            changeItem($(this));
        });

        $(document).on('keyup', '.quantity', function () {
            var el = $(this).parent().parent().parent().parent();
            var quantity = $(this).val();
            var price = $(el.find('.price')).val();
            var tax = $(el.find('.tax')).val();
            var discount = $(el.find('.discount')).val();
            var totalPrice = (quantity * price);
            var taxPrice = (tax / 100) * (totalPrice);
            var amount = (totalPrice + taxPrice) - discount;
            $(el.find('.amount')).html(amount);

            var inputs = $(".amount");
            var subTotal = 0;
            for (var i = 0; i < inputs.length; i++) {
                subTotal = parseFloat(subTotal) + parseFloat($(inputs[i]).html());
            }
            $('.subTotal').html(subTotal.toFixed(2));
            $('.totalAmount').html(subTotal.toFixed(2));

        })

        $(document).on('keyup', '.price', function () {
            var el = $(this).parent().parent().parent().parent();
            var price = $(this).val();
            var quantity = $(el.find('.quantity')).val();
            var tax = $(el.find('.tax')).val();
            var discount = $(el.find('.discount')).val();
            var totalPrice = (quantity * price);
            var taxPrice = (tax / 100) * (totalPrice);
            var amount = (totalPrice + taxPrice) - discount;
            $(el.find('.amount')).html(amount);

            var inputs = $(".amount");
            var subTotal = 0;
            for (var i = 0; i < inputs.length; i++) {
                subTotal = parseFloat(subTotal) + parseFloat($(inputs[i]).html());
            }
            $('.subTotal').html(subTotal.toFixed(2));
            $('.totalAmount').html(subTotal.toFixed(2));

        })

        $(document).on('keyup', '.tax', function () {
            var el = $(this).parent().parent().parent().parent();
            var tax = $(this).val();
            var price = $(el.find('.price')).val();
            var quantity = $(el.find('.quantity')).val();
            var discount = $(el.find('.discount')).val();

            var totalPrice = (quantity * price);
            var taxPrice = (tax / 100) * (totalPrice);
            var amount = (totalPrice + taxPrice) - discount;
            $(el.find('.amount')).html(amount);

            var inputs = $(".amount");
            var subTotal = 0;
            for (var i = 0; i < inputs.length; i++) {
                subTotal = parseFloat(subTotal) + parseFloat($(inputs[i]).html());
            }
            $('.subTotal').html(subTotal.toFixed(2));
            $('.totalAmount').html(subTotal.toFixed(2));
        })

        $(document).on('keyup', '.discount', function () {
            var el = $(this).parent().parent().parent().parent();
            var discount = $(this).val();
            var price = $(el.find('.price')).val();
            var tax = $(el.find('.tax')).val();
            var quantity = $(el.find('.quantity')).val();
            var totalPrice = (quantity * price);
            var taxPrice = (tax / 100) * (totalPrice);
            var amount = (totalPrice + taxPrice) - discount;
            $(el.find('.amount')).html(amount);

            var inputs = $(".amount");
            var subTotal = 0;
            for (var i = 0; i < inputs.length; i++) {
                subTotal = parseFloat(subTotal) + parseFloat($(inputs[i]).html());
            }
            $('.subTotal').html(subTotal.toFixed(2));
            $('.totalAmount').html(subTotal.toFixed(2));
        })

    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Bill Edit')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item"><a href="{{route('bill.index')}}">{{__('Bill')}}</a></div>
                <div class="breadcrumb-item active">{{__('Edit')}}</div>
            </div>
        </div>
        <div class="section-body">
            {{ Form::model($bill, array('route' => array('bill.update', $bill->id), 'method' => 'PUT')) }}
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="customer-box">
                                        <div class="input-group">
                                            {{ Form::label('vender_id', __('Vender')) }}
                                            {{ Form::select('vender_id', $venders,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('bill_date', __('Bill Date')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('bill_date', null, array('class' => 'form-control datepicker','required'=>'required')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('due_date', __('Due Date')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('due_date', null, array('class' => 'form-control datepicker','required'=>'required')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('bill_number', __('Bill Number')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" value="{{$bill_number}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('order_number', __('Order Number')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::number('order_number', null, array('class' => 'form-control')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                {{ Form::label('category_id', __('Category')) }}
                                                {{ Form::select('category_id', $category,null, array('class' => 'form-control customer-sel font-style selectric','required'=>'required')) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card repeater" data-value='{!! json_encode($bill->items) !!}'>
                    <div class="card-header">
                        <h4>{{__('Product & Services')}}</h4>
                        <div class="card-header-action">
                            <a href="#" data-repeater-create="" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#add-bank">
                                <i class="fas fa-plus"></i>{{__('Add Item')}}
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped" data-repeater-list="items" id="sortable-table">
                                <thead>
                                <tr>
                                    <th>{{__('Items')}}</th>
                                    <th>{{__('Quantity')}}</th>
                                    <th>{{__('Price')}} </th>
                                    <th>{{__('Tax')}}</th>
                                    <th>{{__('Discount')}}</th>
                                    <th class="text-right">{{__('Amount')}} </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="ui-sortable">
                                <tr data-repeater-item>
                                    {{ Form::hidden('id',null, array('class' => 'form-control id')) }}
                                    <td width="25%">
                                        {{ Form::select('item', $product_services,null, array('class' => 'form-control font-style item','data-url'=>route('bill.product'))) }}
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group colorpickerinput">
                                                {{ Form::text('quantity',null, array('class' => 'form-control quantity','required'=>'required','placeholder'=>__('Qty'),'required'=>'required')) }}
                                                <div class="input-group-append">
                                                    <div class="input-group-text unit">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group colorpickerinput">
                                                {{ Form::text('price',null, array('class' => 'form-control price','required'=>'required','placeholder'=>__('Price'),'required'=>'required')) }}
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        {{\Auth::user()->currencySymbol()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group colorpickerinput">
                                                {{ Form::text('tax',null, array('class' => 'form-control tax','required'=>'required','placeholder'=>__('Tax'),'required'=>'required')) }}
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-percentage"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group colorpickerinput">
                                                {{ Form::text('discount',null, array('class' => 'form-control discount','required'=>'required','placeholder'=>__('Discount'))) }}
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        {{\Auth::user()->currencySymbol()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right amount">
                                        0.00
                                    </td>
                                    @can('delete bill product')
                                        <td>
                                            <a href="#" class="fas fa-trash" data-repeater-delete></a>
                                        </td>
                                    @endcan
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td><strong>{{__('Sub Total')}} ({{\Auth::user()->currencySymbol()}})</strong></td>
                                    <td class="text-right subTotal">0.00</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><strong>{{__('Total Amount')}} ({{\Auth::user()->currencySymbol()}})</strong></td>
                                    <td class="text-right totalAmount">0.00</td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <a href="{{route('bill.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
                {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
            </div>
            {{ Form::close() }}
        </div>
    </section>
@endsection

