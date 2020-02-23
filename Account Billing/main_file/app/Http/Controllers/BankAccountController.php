<?php

namespace App\Http\Controllers;

use App\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('create bank account'))
        {
            $accounts = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('bankAccount.index', compact('accounts'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('create bank account'))
        {
            return view('bankAccount.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('create bank account'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'holder_name' => 'required',
                                   'bank_name' => 'required',
                                   'account_number' => 'required',
                                   'opening_balance' => 'required',
                                   'contact_number' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('bank-account.index')->with('error', $messages->first());
            }

            $account                  = new BankAccount();
            $account->holder_name     = $request->holder_name;
            $account->bank_name       = $request->bank_name;
            $account->account_number  = $request->account_number;
            $account->opening_balance = $request->opening_balance;
            $account->contact_number  = $request->contact_number;
            $account->bank_address    = $request->bank_address;
            $account->created_by      = \Auth::user()->creatorId();
            $account->save();

            return redirect()->route('bank-account.index')->with('success', __('Account successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit(BankAccount $bankAccount)
    {
        if(\Auth::user()->can('edit bank account'))
        {
            if($bankAccount->created_by == \Auth::user()->creatorId())
            {
                return view('bankAccount.edit', compact('bankAccount'));
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


    public function update(Request $request, BankAccount $bankAccount)
    {
        if(\Auth::user()->can('create bank account'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'holder_name' => 'required',
                                   'bank_name' => 'required',
                                   'account_number' => 'required',
                                   'opening_balance' => 'required',
                                   'contact_number' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('bank-account.index')->with('error', $messages->first());
            }

            $bankAccount->holder_name     = $request->holder_name;
            $bankAccount->bank_name       = $request->bank_name;
            $bankAccount->account_number  = $request->account_number;
            $bankAccount->opening_balance = $request->opening_balance;
            $bankAccount->contact_number  = $request->contact_number;
            $bankAccount->bank_address    = $request->bank_address;
            $bankAccount->created_by      = \Auth::user()->creatorId();
            $bankAccount->save();

            return redirect()->route('bank-account.index')->with('success', __('Account successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(BankAccount $bankAccount)
    {
        if(\Auth::user()->can('delete bank account'))
        {
            if($bankAccount->created_by == \Auth::user()->creatorId())
            {
                $bankAccount->delete();

                return redirect()->route('bank-account.index')->with('success', __('Account successfully deleted.'));
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
