@extends('layouts.admin')
@section('page-title')
    {{__('Invoice Create')}}
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
            }

        }

        $(document).on('change', '#customer', function () {
            $('#customer_detail').css('display', 'block');
            $('#customer-box').css('display', 'none');
            var customer_id = $(this).val();
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': jQuery('#token').val()
                },
                data: {
                    'customer_id': customer_id
                },
                cache: false,
                success: function (data) {
                    // console.log(data);
                    $('#customer_detail').html(data);
                },

            });
        });

        $(document).on('click', '#remove', function () {
            $('#customer_detail').css('display', 'none');
            $('#customer-box').css('display', 'block');
        })

        $(document).on('change', '.item', function () {
            var iteams_id = $(this).val();
            var url = $(this).data('url');
            var el = $(this);
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
            <h1>{{__('Invoice Create')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item"><a href="{{route('invoice.index')}}">{{__('Invoice')}}</a></div>
                <div class="breadcrumb-item active">{{__('create')}}</div>
            </div>
        </div>
        <div class="section-body">
            {{ Form::open(array('url' => 'invoice')) }}
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="customer-box">
                                        <div class="input-group">
                                            {{ Form::label('customer_id', __('Customer')) }}
                                            {{ Form::select('customer_id', $customers,null, array('class' => 'form-control customer-sel font-style selectric','id'=>'customer','data-url'=>route('invoice.customer'),'required'=>'required')) }}
                                        </div>
                                    </div>
                                    <div id="customer_detail" class="d-none">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('issue_date', __('Issue Date')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('issue_date', '', array('class' => 'form-control datepicker','required'=>'required')) }}
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
                                                    {{ Form::text('due_date', '', array('class' => 'form-control datepicker','required'=>'required')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('invoice_number', __('Invoice Number')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-file"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" value="{{$invoice_number}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('ref_number', __('Ref Number')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-joint"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('ref_number', '', array('class' => 'form-control')) }}
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card repeater">
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
                                        <td width="25%">
                                            {{ Form::select('item', $product_services,'', array('class' => 'form-control font-style item','data-url'=>route('invoice.product'),'required'=>'required')) }}
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group colorpickerinput">
                                                    {{ Form::text('quantity','', array('class' => 'form-control quantity','required'=>'required','placeholder'=>__('Qty'),'required'=>'required')) }}
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
                                                    {{ Form::text('price','', array('class' => 'form-control price','required'=>'required','placeholder'=>__('Price'),'required'=>'required')) }}
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
                                                    {{ Form::text('tax','', array('class' => 'form-control tax','required'=>'required','placeholder'=>__('Tax'),'required'=>'required')) }}
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
                                                    {{ Form::text('discount','', array('class' => 'form-control discount','required'=>'required','placeholder'=>__('Discount'))) }}
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
                                        <td>
                                            <a href="#" class="fas fa-trash" data-repeater-delete></a>
                                        </td>
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
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{route('invoice.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
                    {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </section>
@endsection

