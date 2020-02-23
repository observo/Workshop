{{Form::open(array('url'=>'roles','method'=>'post'))}}

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('name',__('Name'))}}
            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Role Name')))}}
            @error('name')
            <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            @if(!empty($permissions))
                <h6>{{__('Assign Permission to Roles')}} </h6>
                <table class="table table-striped mb-0" id="dataTable-1">
                    <thead>
                    <tr>
                        <th>{{__('Module')}} </th>
                        <th>{{__('Permissions')}} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $modules=['account','user','role','invoice','bill','revenue','payment','invoice product','bill product','bank account','transfer','transaction','product & service','customer','vender','plan','constant tax','constant category','constant unit','constant payment method','company settings','report'];
                       if(Auth::user()->type == 'super admin'){
                           $modules[] = 'language';
                           $modules[] = 'permission';
                       }
                    @endphp
                    @foreach($modules as $module)
                        <tr>
                            <td>{{ ucfirst($module) }}</td>
                            <td>
                                <div class="row ">
                                    @if(in_array('manage '.$module,(array) $permissions))
                                        @if($key = array_search('manage '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Manage',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('create '.$module,(array) $permissions))
                                        @if($key = array_search('create '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Create',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('edit '.$module,(array) $permissions))
                                        @if($key = array_search('edit '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Edit',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('delete '.$module,(array) $permissions))
                                        @if($key = array_search('delete '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Delete',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('show '.$module,(array) $permissions))
                                        @if($key = array_search('show '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Show',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif

                                    @if(in_array('change password '.$module,(array) $permissions))
                                        @if($key = array_search('change password '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Change Password',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('buy '.$module,(array) $permissions))
                                        @if($key = array_search('buy '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Buy',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('send '.$module,(array) $permissions))
                                        @if($key = array_search('send '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Send',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif

                                    @if(in_array('create payment '.$module,(array) $permissions))
                                        @if($key = array_search('create payment '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Create Payment',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('delete payment '.$module,(array) $permissions))
                                        @if($key = array_search('delete payment '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Delete Payment',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('income '.$module,(array) $permissions))
                                        @if($key = array_search('income '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Income',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('expense '.$module,(array) $permissions))
                                        @if($key = array_search('expense '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Expense',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('income vs expense '.$module,(array) $permissions))
                                        @if($key = array_search('income vs expense '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Income VS Expense',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('loss & profit '.$module,(array) $permissions))
                                        @if($key = array_search('loss & profit '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Loss & Profit',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                    @if(in_array('tax '.$module,(array) $permissions))
                                        @if($key = array_search('tax '.$module,$permissions))
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                {{Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])}}
                                                {{Form::label('permission'.$key,'Tax',['class'=>'custom-control-label'])}}<br>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{Form::close()}}
