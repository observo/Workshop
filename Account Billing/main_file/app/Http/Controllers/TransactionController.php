<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        if(\Auth::user()->can('manage transaction'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend('All', '');

            $query = Transaction::where('created_by', '=', \Auth::user()->creatorId());

            if(!empty($request->date))
            {
                $date_range = explode(' - ', $request->date);
                $query->whereBetween('date', $date_range);
            }

            if(!empty($request->account))
            {
                $query->where('account', '=', $request->account);
            }

            $transactions = $query->get();

            return view('transaction.index', compact('transactions', 'account'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


}
