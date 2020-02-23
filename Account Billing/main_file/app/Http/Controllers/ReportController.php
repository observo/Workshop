<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Bill;
use App\BillProduct;
use App\Customer;
use App\Invoice;
use App\InvoiceProduct;
use App\Payment;
use App\ProductServiceCategory;
use App\Revenue;
use App\Tax;
use App\Vender;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function incomeSummary(Request $request)
    {

        if(\Auth::user()->can('income report'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend('All', '');
            $customer = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customer->prepend('All', '');
            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 1)->get()->pluck('name', 'id');
            $category->prepend('All', '');

            $data['monthList'] = $month = $this->yearMonth();
            $data['yearList']  = $this->yearList();

            if(isset($request->year))
            {
                $year = $request->year;
            }
            else
            {
                $year = date('Y');
            }
            $data['currentYear'] = $year;
            // ------------------------------REVENUE INCOME-----------------------------------
            $incomes = Revenue::selectRaw('sum(revenues.amount) as amount,MONTH(date) as month,YEAR(date) as year,category_id')->leftjoin('product_service_categories', 'revenues.category_id', '=', 'product_service_categories.id')->where('product_service_categories.type', '=', 1);
            $incomes->where('revenues.created_by', '=', \Auth::user()->creatorId());
            $incomes->whereRAW('YEAR(date) =?', [$year]);
            if(!empty($request->account))
            {
                $incomes->where('account_id', '=', $request->account);
            }
            if(!empty($request->category))
            {
                $incomes->where('category_id', '=', $request->category);
            }

            if(!empty($request->customer))
            {
                $incomes->where('customer_id', '=', $request->customer);
            }
            $incomes->groupBy('month', 'year', 'category_id');
            $incomes = $incomes->get();

            $tmpArray = [];
            foreach($incomes as $income)
            {
                $tmpArray[$income->category_id][$income->month] = $income->amount;
            }
            $array = [];
            foreach($tmpArray as $cat_id => $record)
            {
                $tmp             = [];
                $tmp['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $tmp['data']     = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $tmp['data'][$i] = array_key_exists($i, $record) ? $record[$i] : 0;
                }
                $array[] = $tmp;
            }


            $incomesData = Revenue::selectRaw('sum(revenues.amount) as amount,MONTH(date) as month,YEAR(date) as year');
            $incomesData->where('revenues.created_by', '=', \Auth::user()->creatorId());
            $incomesData->whereRAW('YEAR(date) =?', [$year]);
            if(!empty($request->account))
            {
                $incomesData->where('account_id', '=', $request->account);
            }
            if(!empty($request->category))
            {
                $incomesData->where('category_id', '=', $request->category);
            }
            if(!empty($request->customer))
            {
                $incomesData->where('customer_id', '=', $request->customer);
            }
            $incomesData->groupBy('month', 'year');
            $incomesData = $incomesData->get();
            $incomeArr   = [];
            foreach($incomesData as $k => $incomeData)
            {
                $incomeArr[$incomeData->month] = $incomeData->amount;
            }
            for($i = 1; $i <= 12; $i++)
            {
                $incomeTotal[] = array_key_exists($i, $incomeArr) ? $incomeArr[$i] : 0;
            }

            //---------------------------INVOICE INCOME-----------------------------------------------

            $invoices = Invoice:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,invoice_id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
            $invoices->whereRAW('YEAR(send_date) =?', [$year]);
            if(!empty($request->customer))
            {
                $invoices->where('customer_id', '=', $request->customer);
            }
            $invoices        = $invoices->get();
            $invoiceTmpArray = [];
            foreach($invoices as $invoice)
            {
                $invoiceTmpArray[$invoice->category_id][$invoice->month][] = $invoice->getTotal();
            }

            $invoiceArray = [];
            foreach($invoiceTmpArray as $cat_id => $record)
            {

                $invoice             = [];
                $invoice['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $invoice['data']     = [];
                for($i = 1; $i <= 12; $i++)
                {

                    $invoice['data'][$i] = array_key_exists($i, $record) ? array_sum($record[$i]) : 0;
                }
                $invoiceArray[] = $invoice;
            }

            $invoiceTotalArray = [];
            foreach($invoices as $invoice)
            {
                $invoiceTotalArray[$invoice->month][] = $invoice->getTotal();
            }
            for($i = 1; $i <= 12; $i++)
            {
                $invoiceTotal[] = array_key_exists($i, $invoiceTotalArray) ? array_sum($invoiceTotalArray[$i]) : 0;
            }

            $chartIncomeArr = array_map(
                function (){
                    return array_sum(func_get_args());
                }, $incomeTotal, $invoiceTotal
            );

            $data['chartIncomeArr'] = $chartIncomeArr;
            $data['incomeArr']      = $array;
            $data['invoiceArray']   = $invoiceArray;
            $data['account']        = $account;
            $data['customer']       = $customer;
            $data['category']       = $category;

            return view('report.income_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }


    }

    public function expenseSummary(Request $request)
    {
        if(\Auth::user()->can('expense report'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend('All', '');
            $vender = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $vender->prepend('All', '');
            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get()->pluck('name', 'id');
            $category->prepend('All', '');

            $data['monthList'] = $month = $this->yearMonth();
            $data['yearList']  = $this->yearList();
            if(isset($request->year))
            {
                $year = $request->year;
            }
            else
            {
                $year = date('Y');
            }
            $data['currentYear'] = $year;
            //   -----------------------------------------PAYMENT EXPENSE ------------------------------------------------------------
            $expenses = Payment::selectRaw('sum(payments.amount) as amount,MONTH(date) as month,YEAR(date) as year,category_id')->leftjoin('product_service_categories', 'payments.category_id', '=', 'product_service_categories.id')->where('product_service_categories.type', '=', 2);
            $expenses->where('payments.created_by', '=', \Auth::user()->creatorId());
            $expenses->whereRAW('YEAR(date) =?', [$year]);
            if(!empty($request->account))
            {
                $expenses->where('account_id', '=', $request->account);
            }
            if(!empty($request->category))
            {
                $expenses->where('category_id', '=', $request->category);
            }
            if(!empty($request->vender))
            {
                $expenses->where('vender_id', '=', $request->vender);
            }
            $expenses->groupBy('month', 'year', 'category_id');
            $expenses = $expenses->get();
            $tmpArray = [];
            foreach($expenses as $expense)
            {
                $tmpArray[$expense->category_id][$expense->month] = $expense->amount;
            }
            $array = [];
            foreach($tmpArray as $cat_id => $record)
            {
                $tmp             = [];
                $tmp['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $tmp['data']     = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $tmp['data'][$i] = array_key_exists($i, $record) ? $record[$i] : 0;
                }
                $array[] = $tmp;
            }
            $expensesData = Payment::selectRaw('sum(payments.amount) as amount,MONTH(date) as month,YEAR(date) as year');
            $expensesData->where('payments.created_by', '=', \Auth::user()->creatorId());
            $expensesData->whereRAW('YEAR(date) =?', [$year]);
            if(!empty($request->account))
            {
                $expensesData->where('account_id', '=', $request->account);
            }
            if(!empty($request->category))
            {
                $expensesData->where('category_id', '=', $request->category);
            }
            if(!empty($request->vender))
            {
                $expense->where('vender_id', '=', $request->vender);
            }
            $expensesData->groupBy('month', 'year');
            $expensesData = $expensesData->get();

            $expenseArr = [];
            foreach($expensesData as $k => $expenseData)
            {
                $expenseArr[$expenseData->month] = $expenseData->amount;
            }
            for($i = 1; $i <= 12; $i++)
            {
                $expenseTotal[] = array_key_exists($i, $expenseArr) ? $expenseArr[$i] : 0;
            }

            //     ------------------------------------BILL EXPENSE----------------------------------------------------

            $bills = Bill:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,bill_id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
            $bills->whereRAW('YEAR(send_date) =?', [$year]);
            if(!empty($request->customer))
            {
                $bills->where('vender_id', '=', $request->vender);
            }
            $bills        = $bills->get();
            $billTmpArray = [];
            foreach($bills as $bill)
            {
                $billTmpArray[$bill->category_id][$bill->month][] = $bill->getTotal();
            }

            $billArray = [];
            foreach($billTmpArray as $cat_id => $record)
            {

                $bill             = [];
                $bill['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $bill['data']     = [];
                for($i = 1; $i <= 12; $i++)
                {

                    $bill['data'][$i] = array_key_exists($i, $record) ? array_sum($record[$i]) : 0;
                }
                $billArray[] = $bill;
            }

            $billTotalArray = [];
            foreach($bills as $bill)
            {
                $billTotalArray[$bill->month][] = $bill->getTotal();
            }
            for($i = 1; $i <= 12; $i++)
            {
                $billTotal[] = array_key_exists($i, $billTotalArray) ? array_sum($billTotalArray[$i]) : 0;
            }

            $chartExpenseArr = array_map(
                function (){
                    return array_sum(func_get_args());
                }, $expenseTotal, $billTotal
            );


            $data['chartExpenseArr'] = $chartExpenseArr;
            $data['expenseArr']      = $array;
            $data['billArray']       = $billArray;
            $data['account']         = $account;
            $data['vender']          = $vender;
            $data['category']        = $category;

            return view('report.expense_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }


    }

    public function incomeVsExpenseSummary(Request $request)
    {
        if(\Auth::user()->can('income vs expense report'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend('All', '');
            $vender = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $vender->prepend('All', '');
            $customer = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customer->prepend('All', '');
            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $category->prepend('All', '');

            $data['monthList'] = $month = $this->yearMonth();
            $data['yearList']  = $this->yearList();
            if(isset($request->year))
            {
                $year = $request->year;
            }
            else
            {
                $year = date('Y');
            }
            $data['currentYear'] = $year;

            // ------------------------------TOTAL PAYMENT EXPENSE-----------------------------------------------------------
            $expensesData = Payment::selectRaw('sum(payments.amount) as amount,MONTH(date) as month,YEAR(date) as year');
            $expensesData->where('payments.created_by', '=', \Auth::user()->creatorId());
            $expensesData->whereRAW('YEAR(date) =?', [$year]);
            if(!empty($request->account))
            {
                $expensesData->where('account_id', '=', $request->account);
            }
            if(!empty($request->category))
            {
                $expensesData->where('category_id', '=', $request->category);
            }
            if(!empty($request->vender))
            {
                $expensesData->where('vender_id', '=', $request->vender);
            }
            $expensesData->groupBy('month', 'year');
            $expensesData = $expensesData->get();

            $expenseArr = [];
            foreach($expensesData as $k => $expenseData)
            {
                $expenseArr[$expenseData->month] = $expenseData->amount;
            }

            // ------------------------------TOTAL BILL EXPENSE-----------------------------------------------------------

            $bills = Bill:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,bill_id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
            $bills->whereRAW('YEAR(send_date) =?', [$year]);
            if(!empty($request->customer))
            {
                $bills->where('vender_id', '=', $request->vender);
            }
            $bills        = $bills->get();
            $billTmpArray = [];
            foreach($bills as $bill)
            {
                $billTmpArray[$bill->category_id][$bill->month][] = $bill->getTotal();
            }
            $billArray = [];
            foreach($billTmpArray as $cat_id => $record)
            {
                $bill             = [];
                $bill['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $bill['data']     = [];
                for($i = 1; $i <= 12; $i++)
                {

                    $bill['data'][$i] = array_key_exists($i, $record) ? array_sum($record[$i]) : 0;
                }
                $billArray[] = $bill;
            }

            $billTotalArray = [];
            foreach($bills as $bill)
            {
                $billTotalArray[$bill->month][] = $bill->getTotal();
            }


            // ------------------------------TOTAL REVENUE INCOME-----------------------------------------------------------

            $incomesData = Revenue::selectRaw('sum(revenues.amount) as amount,MONTH(date) as month,YEAR(date) as year');
            $incomesData->where('revenues.created_by', '=', \Auth::user()->creatorId());
            $incomesData->whereRAW('YEAR(date) =?', [$year]);
            if(!empty($request->account))
            {
                $incomesData->where('account_id', '=', $request->account);
            }
            if(!empty($request->category))
            {
                $incomesData->where('category_id', '=', $request->category);
            }
            if(!empty($request->customer))
            {
                $incomesData->where('customer_id', '=', $request->customer);
            }
            $incomesData->groupBy('month', 'year');
            $incomesData = $incomesData->get();
            $incomeArr   = [];
            foreach($incomesData as $k => $incomeData)
            {
                $incomeArr[$incomeData->month] = $incomeData->amount;
            }

            // ------------------------------TOTAL INVOICE INCOME-----------------------------------------------------------
            $invoices = Invoice:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,invoice_id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
            $invoices->whereRAW('YEAR(send_date) =?', [$year]);
            if(!empty($request->customer))
            {
                $invoices->where('customer_id', '=', $request->customer);
            }
            $invoices        = $invoices->get();
            $invoiceTmpArray = [];
            foreach($invoices as $invoice)
            {
                $invoiceTmpArray[$invoice->category_id][$invoice->month][] = $invoice->getTotal();
            }

            $invoiceArray = [];
            foreach($invoiceTmpArray as $cat_id => $record)
            {

                $invoice             = [];
                $invoice['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $invoice['data']     = [];
                for($i = 1; $i <= 12; $i++)
                {

                    $invoice['data'][$i] = array_key_exists($i, $record) ? array_sum($record[$i]) : 0;
                }
                $invoiceArray[] = $invoice;
            }

            $invoiceTotalArray = [];
            foreach($invoices as $invoice)
            {
                $invoiceTotalArray[$invoice->month][] = $invoice->getTotal();
            }
            //        ----------------------------------------------------------------------------------------------------

            for($i = 1; $i <= 12; $i++)
            {
                $paymentExpenseTotal[] = array_key_exists($i, $expenseArr) ? $expenseArr[$i] : 0;
                $billExpenseTotal[]    = array_key_exists($i, $billTotalArray) ? array_sum($billTotalArray[$i]) : 0;

                $RevenueIncomeTotal[] = array_key_exists($i, $incomeArr) ? $incomeArr[$i] : 0;
                $invoiceIncomeTotal[] = array_key_exists($i, $invoiceTotalArray) ? array_sum($invoiceTotalArray[$i]) : 0;

            }

            $totalIncome = array_map(
                function (){
                    return array_sum(func_get_args());
                }, $RevenueIncomeTotal, $invoiceIncomeTotal
            );

            $totalExpense = array_map(
                function (){
                    return array_sum(func_get_args());
                }, $paymentExpenseTotal, $billExpenseTotal
            );

            $profit = [];
            $keys   = array_keys($totalIncome + $totalExpense);
            foreach($keys as $v)
            {
                $profit[$v] = (empty($totalIncome[$v]) ? 0 : $totalIncome[$v]) - (empty($totalExpense[$v]) ? 0 : $totalExpense[$v]);
            }


            $data['paymentExpenseTotal'] = $paymentExpenseTotal;
            $data['billExpenseTotal']    = $billExpenseTotal;
            $data['revenueIncomeTotal']  = $RevenueIncomeTotal;
            $data['invoiceIncomeTotal']  = $invoiceIncomeTotal;
            $data['profit']              = $profit;
            $data['account']             = $account;
            $data['vender']              = $vender;
            $data['customer']            = $customer;
            $data['category']            = $category;

            return view('report.income_vs_expense_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function taxSummary(Request $request)
    {

        if(\Auth::user()->can('tax report'))
        {
            $data['monthList'] = $month = $this->yearMonth();
            $data['yearList']  = $this->yearList();

            if(isset($request->year))
            {
                $year = $request->year;
            }
            else
            {
                $year = date('Y');
            }

            $data['currentYear'] = $year;

            $taxList        = Tax::select('id', 'name')->where('created_by', '=', \Auth::user()->creatorId())->get();
            $invoiceProduct = InvoiceProduct::selectRaw('product_services.tax_id as tax_id,sum(invoice_products.price) as amount,sum(invoice_products.tax) as tax,MONTH(invoice_products.created_at) as month,YEAR(invoice_products.created_at) as year')->leftjoin('product_services', 'invoice_products.product_id', '=', 'product_services.id')->whereRaw('YEAR(invoice_products.created_at) =?', [$year])->where('product_services.created_by', '=', \Auth::user()->creatorId())->groupBy('month', 'year', 'tax_id')->get();

            $incomeArray = [];
            foreach($invoiceProduct as $incomeTax)
            {
                $tax                                                = $incomeTax->tax;
                $amount                                             = $incomeTax->amount;
                $taxAmount                                          = $amount * $tax / 100;
                $incomeArray[$incomeTax->tax_id][$incomeTax->month] = $taxAmount;
            }

            $income = [];
            foreach($incomeArray as $tax_id => $record)
            {
                $tmp         = [];
                $tmp['tax']  = Tax::where('id', '=', $tax_id)->first()->name;
                $tmp['data'] = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $tmp['data'][$i] = array_key_exists($i, $record) ? $record[$i] : 0;
                }
                $income[] = $tmp;
            }


            $billProduct  = BillProduct::selectRaw('product_services.tax_id as tax_id,sum(bill_products.price) as amount,sum(bill_products.tax) as tax,MONTH(bill_products.created_at) as month,YEAR(bill_products.created_at) as year')->leftjoin('product_services', 'bill_products.product_id', '=', 'product_services.id')->whereRaw('YEAR(bill_products.created_at) =?', [$year])->where('product_services.created_by', '=', \Auth::user()->creatorId())->groupBy('month', 'year', 'tax_id')->get();
            $expenseArray = [];
            foreach($billProduct as $expenseTax)
            {
                $tax       = $expenseTax->tax;
                $amount    = $expenseTax->amount;
                $taxAmount = $amount * $tax / 100;

                $expenseArray[$expenseTax->tax_id][$expenseTax->month] = $taxAmount;
            }
            $expense = [];
            foreach($expenseArray as $tax_id => $record)
            {
                $tmp         = [];
                $tmp['tax']  = Tax::where('id', '=', $tax_id)->first()->name;
                $tmp['data'] = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $tmp['data'][$i] = array_key_exists($i, $record) ? $record[$i] : 0;
                }
                $expense[] = $tmp;
            }

            $data['expenses'] = $expense;
            $data['incomes']  = $income;

            return view('report.tax_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function profitLossSummary(Request $request)
    {
        if(\Auth::user()->can('loss & profit report'))
        {
            $data['month']     = [
                'Jan-Mar',
                'Apr-Jun',
                'Jul-Sep',
                'Oct-Dec',
                'Total',
            ];
            $data['monthList'] = $month = $this->yearMonth();
            $data['yearList']  = $this->yearList();

            if(isset($request->year))
            {
                $year = $request->year;
            }
            else
            {
                $year = date('Y');
            }
            $data['currentYear'] = $year;

            // -------------------------------REVENUE INCOME-------------------------------------------------

            $incomes = Revenue::selectRaw('sum(revenues.amount) as amount,MONTH(date) as month,YEAR(date) as year,category_id');
            $incomes->where('created_by', '=', \Auth::user()->creatorId());
            $incomes->whereRAW('YEAR(date) =?', [$year]);
            $incomes->groupBy('month', 'year', 'category_id');
            $incomes        = $incomes->get();
            $tmpIncomeArray = [];
            foreach($incomes as $income)
            {
                $tmpIncomeArray[$income->category_id][$income->month] = $income->amount;
            }

            $incomeCatAmount_1  = $incomeCatAmount_2 = $incomeCatAmount_3 = $incomeCatAmount_4 = 0;
            $revenueIncomeArray = array();
            foreach($tmpIncomeArray as $cat_id => $record)
            {

                $tmp             = [];
                $tmp['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $sumData         = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $sumData[] = array_key_exists($i, $record) ? $record[$i] : 0;
                }

                $month_1 = array_slice($sumData, 0, 3);
                $month_2 = array_slice($sumData, 3, 3);
                $month_3 = array_slice($sumData, 6, 3);
                $month_4 = array_slice($sumData, 9, 3);


                $incomeData['Jan-Mar'] = $sum_1 = array_sum($month_1);
                $incomeData['Apr-Jun'] = $sum_2 = array_sum($month_2);
                $incomeData['Jul-Sep'] = $sum_3 = array_sum($month_3);
                $incomeData['Oct-Dec'] = $sum_4 = array_sum($month_4);
                $incomeData['Total']   = array_sum(
                    array(
                        $sum_1,
                        $sum_2,
                        $sum_3,
                        $sum_4,
                    )
                );

                $incomeCatAmount_1 += $sum_1;
                $incomeCatAmount_2 += $sum_2;
                $incomeCatAmount_3 += $sum_3;
                $incomeCatAmount_4 += $sum_4;

                $data['month'] = array_keys($incomeData);
                $tmp['amount'] = array_values($incomeData);

                $revenueIncomeArray[] = $tmp;

            }

            $data['incomeCatAmount'] = $incomeCatAmount = [
                $incomeCatAmount_1,
                $incomeCatAmount_2,
                $incomeCatAmount_3,
                $incomeCatAmount_4,
                array_sum(
                    array(
                        $incomeCatAmount_1,
                        $incomeCatAmount_2,
                        $incomeCatAmount_3,
                        $incomeCatAmount_4,
                    )
                ),
            ];

            $data['revenueIncomeArray'] = $revenueIncomeArray;

            //-----------------------INVOICE INCOME---------------------------------------------

            $invoices = Invoice:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,invoice_id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
            $invoices->whereRAW('YEAR(send_date) =?', [$year]);
            if(!empty($request->customer))
            {
                $invoices->where('customer_id', '=', $request->customer);
            }
            $invoices        = $invoices->get();
            $invoiceTmpArray = [];
            foreach($invoices as $invoice)
            {
                $invoiceTmpArray[$invoice->category_id][$invoice->month][] = $invoice->getTotal();
            }

            $invoiceCatAmount_1 = $invoiceCatAmount_2 = $invoiceCatAmount_3 = $invoiceCatAmount_4 = 0;
            $invoiceIncomeArray = array();
            foreach($invoiceTmpArray as $cat_id => $record)
            {

                $invoiceTmp             = [];
                $invoiceTmp['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $invoiceSumData         = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $invoiceSumData[] = array_key_exists($i, $record) ? array_sum($record[$i]) : 0;

                }

                $month_1                      = array_slice($invoiceSumData, 0, 3);
                $month_2                      = array_slice($invoiceSumData, 3, 3);
                $month_3                      = array_slice($invoiceSumData, 6, 3);
                $month_4                      = array_slice($invoiceSumData, 9, 3);
                $invoiceIncomeData['Jan-Mar'] = $sum_1 = array_sum($month_1);
                $invoiceIncomeData['Apr-Jun'] = $sum_2 = array_sum($month_2);
                $invoiceIncomeData['Jul-Sep'] = $sum_3 = array_sum($month_3);
                $invoiceIncomeData['Oct-Dec'] = $sum_4 = array_sum($month_4);
                $invoiceIncomeData['Total']   = array_sum(
                    array(
                        $sum_1,
                        $sum_2,
                        $sum_3,
                        $sum_4,
                    )
                );
                $invoiceCatAmount_1           += $sum_1;
                $invoiceCatAmount_2           += $sum_2;
                $invoiceCatAmount_3           += $sum_3;
                $invoiceCatAmount_4           += $sum_4;

                $invoiceTmp['amount'] = array_values($invoiceIncomeData);

                $invoiceIncomeArray[] = $invoiceTmp;

            }

            $data['invoiceIncomeCatAmount'] = $invoiceIncomeCatAmount = [
                $invoiceCatAmount_1,
                $invoiceCatAmount_2,
                $invoiceCatAmount_3,
                $invoiceCatAmount_4,
                array_sum(
                    array(
                        $invoiceCatAmount_1,
                        $invoiceCatAmount_2,
                        $invoiceCatAmount_3,
                        $invoiceCatAmount_4,
                    )
                ),
            ];


            $data['invoiceIncomeArray'] = $invoiceIncomeArray;

            $data['totalIncome'] = $totalIncome = array_map(
                function (){
                    return array_sum(func_get_args());
                }, $invoiceIncomeCatAmount, $incomeCatAmount
            );

            //---------------------------------PAYMENT EXPENSE-----------------------------------

            $expenses = Payment::selectRaw('sum(payments.amount) as amount,MONTH(date) as month,YEAR(date) as year,category_id');
            $expenses->where('created_by', '=', \Auth::user()->creatorId());
            $expenses->whereRAW('YEAR(date) =?', [$year]);
            $expenses->groupBy('month', 'year', 'category_id');
            $expenses = $expenses->get();

            $tmpExpenseArray = [];
            foreach($expenses as $expense)
            {
                $tmpExpenseArray[$expense->category_id][$expense->month] = $expense->amount;
            }

            $expenseArray       = [];
            $expenseCatAmount_1 = $expenseCatAmount_2 = $expenseCatAmount_3 = $expenseCatAmount_4 = 0;
            foreach($tmpExpenseArray as $cat_id => $record)
            {
                $tmp             = [];
                $tmp['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $expenseSumData  = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $expenseSumData[] = array_key_exists($i, $record) ? $record[$i] : 0;

                }

                $month_1 = array_slice($expenseSumData, 0, 3);
                $month_2 = array_slice($expenseSumData, 3, 3);
                $month_3 = array_slice($expenseSumData, 6, 3);
                $month_4 = array_slice($expenseSumData, 9, 3);

                $expenseData['Jan-Mar'] = $sum_1 = array_sum($month_1);
                $expenseData['Apr-Jun'] = $sum_2 = array_sum($month_2);
                $expenseData['Jul-Sep'] = $sum_3 = array_sum($month_3);
                $expenseData['Oct-Dec'] = $sum_4 = array_sum($month_4);
                $expenseData['Total']   = array_sum(
                    array(
                        $sum_1,
                        $sum_2,
                        $sum_3,
                        $sum_4,
                    )
                );

                $expenseCatAmount_1 += $sum_1;
                $expenseCatAmount_2 += $sum_2;
                $expenseCatAmount_3 += $sum_3;
                $expenseCatAmount_4 += $sum_4;

                $data['month'] = array_keys($expenseData);
                $tmp['amount'] = array_values($expenseData);

                $expenseArray[] = $tmp;

            }

            $data['expenseCatAmount'] = $expenseCatAmount = [
                $expenseCatAmount_1,
                $expenseCatAmount_2,
                $expenseCatAmount_3,
                $expenseCatAmount_4,
                array_sum(
                    array(
                        $expenseCatAmount_1,
                        $expenseCatAmount_2,
                        $expenseCatAmount_3,
                        $expenseCatAmount_4,
                    )
                ),
            ];
            $data['expenseArray']     = $expenseArray;

            //    ----------------------------EXPENSE BILL-----------------------------------------------------------------------

            $bills = Bill:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,bill_id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
            $bills->whereRAW('YEAR(send_date) =?', [$year]);
            if(!empty($request->customer))
            {
                $bills->where('vender_id', '=', $request->vender);
            }
            $bills        = $bills->get();
            $billTmpArray = [];
            foreach($bills as $bill)
            {
                $billTmpArray[$bill->category_id][$bill->month][] = $bill->getTotal();
            }

            $billExpenseArray       = [];
            $billExpenseCatAmount_1 = $billExpenseCatAmount_2 = $billExpenseCatAmount_3 = $billExpenseCatAmount_4 = 0;
            foreach($billTmpArray as $cat_id => $record)
            {
                $billTmp             = [];
                $billTmp['category'] = ProductServiceCategory::where('id', '=', $cat_id)->first()->name;
                $billExpensSumData   = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $billExpensSumData[] = array_key_exists($i, $record) ? array_sum($record[$i]) : 0;
                }

                $month_1 = array_slice($billExpensSumData, 0, 3);
                $month_2 = array_slice($billExpensSumData, 3, 3);
                $month_3 = array_slice($billExpensSumData, 6, 3);
                $month_4 = array_slice($billExpensSumData, 9, 3);

                $billExpenseData['Jan-Mar'] = $sum_1 = array_sum($month_1);
                $billExpenseData['Apr-Jun'] = $sum_2 = array_sum($month_2);
                $billExpenseData['Jul-Sep'] = $sum_3 = array_sum($month_3);
                $billExpenseData['Oct-Dec'] = $sum_4 = array_sum($month_4);
                $billExpenseData['Total']   = array_sum(
                    array(
                        $sum_1,
                        $sum_2,
                        $sum_3,
                        $sum_4,
                    )
                );

                $billExpenseCatAmount_1 += $sum_1;
                $billExpenseCatAmount_2 += $sum_2;
                $billExpenseCatAmount_3 += $sum_3;
                $billExpenseCatAmount_4 += $sum_4;

                $data['month']     = array_keys($billExpenseData);
                $billTmp['amount'] = array_values($billExpenseData);

                $billExpenseArray[] = $billTmp;

            }

            $data['billExpenseCatAmount'] = $billExpenseCatAmount = [
                $billExpenseCatAmount_1,
                $billExpenseCatAmount_2,
                $billExpenseCatAmount_3,
                $billExpenseCatAmount_4,
                array_sum(
                    array(
                        $billExpenseCatAmount_1,
                        $billExpenseCatAmount_2,
                        $billExpenseCatAmount_3,
                        $billExpenseCatAmount_4,
                    )
                ),
            ];

            $data['billExpenseArray'] = $billExpenseArray;


            $data['totalExpense'] = $totalExpense = array_map(
                function (){
                    return array_sum(func_get_args());
                }, $billExpenseCatAmount, $expenseCatAmount
            );


            foreach($totalIncome as $k => $income)
            {
                $netProfit[] = $income - $totalExpense[$k];
            }
            $data['netProfitArray'] = $netProfit;

            return view('report.profit_loss_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }


    }

    public function yearMonth()
    {
        for($m = 1; $m <= 12; $m++)
        {
            $month[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
        }

        return $month;
    }

    public function yearList()
    {
        $starting_year = date('Y', strtotime('-5 year'));
        $ending_year   = date('Y');

        foreach(range($ending_year, $starting_year) as $year)
        {
            $years[$year] = $year;
        }

        return $years;
    }
}
