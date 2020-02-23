@php
    $logo=asset(Storage::url('logo/'));
@endphp
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}">
                <img class="img-fluid" src="{{$logo.'/logo.png'}} " alt="">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard')}}"> <img class="img-fluid" src="{{$logo.'/small_logo.png'}} " alt=""></a>
        </div>
        <ul class="sidebar-menu">

            @if(\Auth::guard('customer')->check())
                <li class="dropdown {{ (Request::route()->getName() == 'customer.dashboard') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('customer.dashboard')}}"> <i class="fas fa-fire"></i> <span>{{__('Dashboard')}}</span></a>
                </li>
            @elseif(\Auth::guard('vender')->check())
                <li class="dropdown {{ (Request::route()->getName() == 'vender.dashboard') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('vender.dashboard')}}"> <i class="fas fa-fire"></i> <span>{{__('Dashboard')}}</span></a>
                </li>
            @else
                <li class="dropdown {{ (Request::route()->getName() == 'dashboard') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('dashboard')}}"> <i class="fas fa-fire"></i> <span>{{__('Dashboard')}}</span></a>
                </li>
            @endif

            @can('manage customer invoice')
                <li class="dropdown {{ (Request::route()->getName() == 'customer.invoice' || Request::route()->getName() == 'customer.invoice.show') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('customer.invoice')}}"> <i class="fas fa-file"></i> <span>{{__('Invoice')}}</span></a>
                </li>
            @endcan

            @can('manage customer payment')
                <li class="dropdown {{ (Request::route()->getName() == 'customer.payment') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('customer.payment')}}"> <i class="far fa-money-bill-alt"></i> <span>{{__('Payment')}}</span></a>
                </li>
            @endcan
            @can('manage customer transaction')
                <li class="dropdown {{ (Request::route()->getName() == 'customer.transaction') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('customer.transaction')}}"> <i class="fas fa-history"></i> <span>{{__('Transaction')}}</span></a>
                </li>
            @endcan

            @can('manage vender bill')
                <li class="dropdown {{ (Request::route()->getName() == 'vender.bill' || Request::route()->getName() == 'vender.bill.show') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('vender.bill')}}"> <i class="fas fa-file"></i> <span>{{__('Bill')}}</span></a>
                </li>
            @endcan

            @can('manage vender payment')
                <li class="dropdown {{ (Request::route()->getName() == 'vender.payment') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('vender.payment')}}"> <i class="far fa-money-bill-alt"></i> <span>{{__('Payment')}}</span></a>
                </li>
            @endcan
            @can('manage vender transaction')
                <li class="dropdown {{ (Request::route()->getName() == 'vender.transaction') ? ' active' : '' }} ">
                    <a class="nav-link" href="{{route('vender.transaction')}}"> <i class="fas fa-history"></i> <span>{{__('Transaction')}}</span></a>
                </li>
            @endcan


            @if(\Auth::user()->type=='super admin')
                @can('manage user')
                    <li class="dropdown {{ (Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}"> <i class="fas fa-columns"></i> <span>{{__('User') }}</span></a>
                    </li>
                @endcan
            @else
                @if( Gate::check('manage user') || Gate::check('manage role'))
                    <li class="dropdown {{ (Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions' )?' active':''}}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>{{__('Staff')}}</span></a>
                        <ul class="dropdown-menu {{ (Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions')?'display:block':''}}">
                            @can('manage user')
                                <li class="{{ (Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('users.index') }}">{{  __('User') }}</a>
                                </li>
                            @endcan
                            @can('manage role')
                                <li class="{{ (Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{route('roles.index')}}">{{__('Role')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
            @endif


            @if(Gate::check('manage product & service'))
                <li class="{{ (Request::segment(1) == 'productservice')?'active':''}}">
                    <a class="nav-link" href="{{ route('productservice.index') }}">
                        <i class="fas fa-shopping-cart"></i> <span>{{__('Product & Service')}}</span></a>
                </li>
            @endif
            @if(Gate::check('manage customer'))
                <li class="{{ (Request::segment(1) == 'customer')?'active':''}}">
                    <a class="nav-link" href="{{ route('customer.index') }}">
                        <i class="far fa-user"></i> <span>{{__('Customer')}}</span></a>
                </li>
            @endif
            @if(Gate::check('manage vender'))
                <li class="{{ (Request::segment(1) == 'vender')?'active':''}}">
                    <a class="nav-link" href="{{ route('vender.index') }}">
                        <i class="fas fa-sticky-note"></i> <span>{{__('Vender')}}</span></a>
                </li>
            @endif

            @if( Gate::check('manage bank account') ||  Gate::check('manage transfer') ||  Gate::check('manage transaction')  ||  Gate::check('manage transaction'))
                <li class="dropdown {{ (Request::segment(1) == 'bank-account' || Request::segment(1) == 'transfer' || Request::segment(1) == 'transaction')?' active':''}}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-university"></i> <span>{{__('Banking')}}</span></a>
                    <ul class="dropdown-menu {{ (Request::segment(1) == 'bank-account' || Request::segment(1) == 'transfer')?'display:block':''}}">
                        @can('manage bank account')
                            <li class="{{ (Request::route()->getName() == 'bank-account.index' || Request::route()->getName() == 'bank-account.create' || Request::route()->getName() == 'bank-account.edit') ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('bank-account.index') }}">{{  __('Account') }}</a>
                            </li>
                        @endcan
                        @can('manage transfer')
                            <li class="{{ (Request::route()->getName() == 'transfer.index' || Request::route()->getName() == 'transfer.create' || Request::route()->getName() == 'transfer.edit') ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('transfer.index') }}">{{  __('Transfer') }}</a>
                            </li>
                        @endcan
                        @can('manage transaction')
                            <li class="{{ (Request::route()->getName() == 'transaction.index' || Request::route()->getName() == 'transfer.create' || Request::route()->getName() == 'transaction.edit') ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('transaction.index') }}">{{  __('Transaction') }}</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endif
            @if( Gate::check('manage invoice') ||  Gate::check('manage revenue'))
                <li class="dropdown {{ (Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue')?' active':''}}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-money-bill-alt"></i> <span>{{__('Income')}}</span></a>
                    <ul class="dropdown-menu {{ (Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue')?'display:block':''}}">
                        @can('manage invoice')
                            <li class="{{ (Request::route()->getName() == 'invoice.index' || Request::route()->getName() == 'invoice.create' || Request::route()->getName() == 'invoice.edit' || Request::route()->getName() == 'invoice.show') ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('invoice.index') }}">{{  __('Invoice') }}</a>
                            </li>
                        @endcan
                        @can('manage revenue')
                            <li class="{{ (Request::route()->getName() == 'revenue.index' || Request::route()->getName() == 'revenue.create' || Request::route()->getName() == 'revenue.edit') ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('revenue.index') }}">{{  __('Revenue') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if( Gate::check('manage bill')  ||  Gate::check('manage payment'))
                <li class="dropdown {{ (Request::segment(1) == 'bill' || Request::segment(1) == 'payment')?' active':''}}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-bill-wave-alt"></i> <span>{{__('Expense')}}</span></a>
                    <ul class="dropdown-menu {{ (Request::segment(1) == 'invoice')?'display:block':''}}">
                        @can('manage bill')
                            <li class="{{ (Request::route()->getName() == 'bill.index' || Request::route()->getName() == 'bill.create' || Request::route()->getName() == 'bill.edit' || Request::route()->getName() == 'bill.show') ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('bill.index') }}">{{  __('Bill') }}</a>
                            </li>
                        @endcan
                        @can('manage payment')
                            <li class="{{ (Request::route()->getName() == 'payment.index' || Request::route()->getName() == 'payment.create' || Request::route()->getName() == 'payment.edit') ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('payment.index') }}">{{  __('Payment') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if(Gate::check('manage plan'))
                <li class="{{ (Request::segment(1) == 'plans')?'active':''}}">
                    <a class="nav-link" href="{{ route('plans.index') }}"><i class="fas fa-trophy"></i><span>{{__('Plan')}}</span></a>
                </li>
            @endif

            @if(Gate::check('manage order'))
                <li class="{{ (Request::segment(1) == 'orders')?'active':''}}">
                    <a class="nav-link" href="{{ route('order.index') }}"><i class="fas fa-cart-plus"></i><span>{{__('Order')}}</span></a>
                </li>
            @endif
            @if( Gate::check('income report'))
                <li class="dropdown {{ (Request::segment(1) == 'report')?' active':''}}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-area"></i> <span>{{__('Report')}}</span></a>
                    <ul class="dropdown-menu">
                        @can('income report')
                            <li class="{{ (Request::route()->getName() == 'report.income.summary' ) ? ' active' : '' }}">
                                <a class="nav-link" href="{{route('report.income.summary')}}">{{  __('Income Summary') }}</a>
                            </li>
                        @endcan
                        @can('expense report')
                            <li class="{{ (Request::route()->getName() == 'report.expense.summary' ) ? ' active' : '' }}">
                                <a class="nav-link" href="{{route('report.expense.summary')}}">{{  __('Expense Summary') }}</a>
                            </li>
                        @endcan
                        @can('income vs expense report')
                            <li class="{{ (Request::route()->getName() == 'report.income.vs.expense.summary' ) ? ' active' : '' }}">
                                <a class="nav-link" href="{{route('report.income.vs.expense.summary')}}">{{  __('Income VS Expense') }}</a>
                            </li>
                        @endcan
                        @can('tax report')
                            <li class="{{ (Request::route()->getName() == 'report.tax.summary' ) ? ' active' : '' }}">
                                <a class="nav-link" href="{{route('report.tax.summary')}}">{{  __('Tax Summary') }}</a>
                            </li>
                        @endcan
                        @can('loss & profit report')
                            <li class="{{ (Request::route()->getName() == 'report.profit.loss.summary' ) ? ' active' : '' }}">
                                <a class="nav-link" href="{{route('report.profit.loss.summary')}}">{{  __('Profit & Loss') }}</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endif


            @if(Gate::check('manage constant tax') || Gate::check('manage constant category') ||Gate::check('manage constant unit') ||Gate::check('manage constant payment method') )
                <li class="dropdown {{ (Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method')? 'active':''}}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>{{__('Constant')}}</span></a>
                    <ul class="dropdown-menu {{ (Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit'  || Request::segment(1) == 'payment-method')? 'display:block':''}}">
                        @can('manage constant tax')
                            <li class="{{ (Request::route()->getName() == 'taxes.index' ) ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('taxes.index')}}"> {{__('Taxes')}}</a>
                            </li>
                        @endcan
                        @can('manage constant category')
                            <li class="{{ (Request::route()->getName() == 'product-category.index' ) ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('product-category.index')}}"> {{__('Category')}}</a>
                            </li>
                        @endcan
                        @can('manage constant unit')
                            <li class="{{ (Request::route()->getName() == 'product-unit.index' ) ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('product-unit.index')}}"> {{__('Unit')}}</a>
                            </li>
                        @endcan
                        @can('manage constant payment method')
                            <li class="{{ (Request::route()->getName() == 'payment-method.index' ) ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('payment-method.index')}}"> {{__('Payment Method')}}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if(Gate::check('manage system settings'))
                <li class="{{ (Request::route()->getName() == 'systems.index') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('systems.index') }}"><i class="fas fa-sliders-h"></i> <span>{{  __('System Setting') }} </span></a>
                </li>
            @endif
            @if(Gate::check('manage company settings'))
                <li class="{{ (Request::route()->getName() == 'systems.index') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('company.setting') }}"><i class="fas fa-sliders-h"></i> <span>{{  __('Company Setting') }} </span></a>
                </li>
            @endif


        </ul>
    </aside>
</div>
