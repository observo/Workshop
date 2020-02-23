<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\PaymentMethod;
use App\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{

    public function index(Request $request)
    {

        if(\Auth::user()->can('manage transfer'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend('All','');

            $query = Transfer::where('created_by', '=', \Auth::user()->creatorId());

            if(!empty($request->date))
            {
                $date_range = explode(' - ', $request->date);
                $query->whereBetween('date', $date_range);
            }

            if(!empty($request->from_account))
            {
                $query->where('from_account', '=', $request->from_account);
            }
            if(!empty($request->to_account))
            {
                $query->where('to_account', '=', $request->to_account);
            }
            $transfers = $query->get();

            return view('transfer.index', compact('transfers', 'account'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('create transfer'))
        {
            $bankAccount   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $paymentMethod = PaymentMethod::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('transfer.create', compact('bankAccount', 'paymentMethod'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create transfer'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'from_account' => 'required|numeric',
                                   'to_account' => 'required|numeric',
                                   'amount' => 'required|numeric',
                                   'date' => 'required',
                                   'payment_method' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $transfer                 = new Transfer();
            $transfer->from_account   = $request->from_account;
            $transfer->to_account     = $request->to_account;
            $transfer->amount         = $request->amount;
            $transfer->date           = $request->date;
            $transfer->payment_method = $request->payment_method;
            $transfer->reference      = $request->reference;
            $transfer->description    = $request->description;
            $transfer->created_by     = \Auth::user()->creatorId();
            $transfer->save();

            return redirect()->route('transfer.index')->with('success', __('Amount successfully transfer.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit(Transfer $transfer)
    {
        if(\Auth::user()->can('edit transfer'))
        {
            $bankAccount   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $paymentMethod = PaymentMethod::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('transfer.edit', compact('bankAccount', 'paymentMethod', 'transfer'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Transfer $transfer)
    {
        if(\Auth::user()->can('edit transfer'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'from_account' => 'required|numeric',
                                   'to_account' => 'required|numeric',
                                   'amount' => 'required|numeric',
                                   'date' => 'required',
                                   'payment_method' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $transfer->from_account   = $request->from_account;
            $transfer->to_account     = $request->to_account;
            $transfer->amount         = $request->amount;
            $transfer->date           = $request->date;
            $transfer->payment_method = $request->payment_method;
            $transfer->reference      = $request->reference;
            $transfer->description    = $request->description;
            $transfer->save();

            return redirect()->route('transfer.index')->with('success', __('Amount successfully transfer updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Transfer $transfer)
    {

        if(\Auth::user()->can('delete transfer'))
        {
            if($transfer->created_by == \Auth::user()->creatorId())
            {
                $transfer->delete();

                return redirect()->route('transfer.index')->with('success', __('Amount transfer successfully deleted.'));
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
