<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('manage constant payment method'))
        {
            $paymentMethods = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('paymentMethod.index', compact('paymentMethods'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('create constant payment method'))
        {
            return view('paymentMethod.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create constant payment method'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:20',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('payment-method.index')->with('error', $messages->first());
            }
            $paymentMethod             = new PaymentMethod();
            $paymentMethod->name       = $request->name;
            $paymentMethod->created_by = \Auth::user()->creatorId();
            $paymentMethod->save();

            return redirect()->route('payment-method.index')->with('success', __('Payment method successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit(PaymentMethod $paymentMethod)
    {
        if(\Auth::user()->can('edit constant payment method'))
        {
            if($paymentMethod->created_by == \Auth::user()->creatorId())
            {
                return view('paymentMethod.edit', compact('paymentMethod'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        if(\Auth::user()->can('edit constant payment method'))
        {
            if($paymentMethod->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:20',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->route('payment-method.index')->with('error', $messages->first());
                }
                $paymentMethod->name = $request->name;
                $paymentMethod->save();

                return redirect()->route('payment-method.index')->with('success', __('Payment method successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        if(\Auth::user()->can('delete constant payment method'))
        {
            if($paymentMethod->created_by == \Auth::user()->creatorId())
            {
                $paymentMethod->delete();

                return redirect()->route('payment-method.index')->with('success', __('Payment method successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
