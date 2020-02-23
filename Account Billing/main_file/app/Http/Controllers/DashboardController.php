<?php

namespace App\Http\Controllers;

use App\BalanceSheet;
use App\Order;
use App\Payment;
use App\PaymentMethod;
use App\Plan;
use App\ProductServiceCategory;
use App\ProductServiceUnit;
use App\Projects;
use App\Revenue;
use App\Tax;

class
DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(\Auth::user()->type == 'super admin')
        {
            $user                       = \Auth::user();
            $user['total_user']         = $user->countCompany();
            $user['total_paid_user']    = $user->countPaidCompany();
            $user['total_orders']       = Order::total_orders();
            $user['total_orders_price'] = Order::total_orders_price();
            $user['total_plan']         = Plan::total_plan();
            $user['most_purchese_plan'] = (!empty(Plan::most_purchese_plan()) ? Plan::most_purchese_plan()->total : 0);
            $chartData                  = $this->getOrderChart(['duration' => 'week']);

            return view('dashboard.super_admin', compact('user', 'chartData'));
        }
        else
        {
            $data['latestIncome']  = Revenue::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();
            $data['latestExpense'] = Payment::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();


            $incomeCategory = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 1)->get();
            $inColor        = array();
            $inCategory     = array();
            $inAmount       = array();
            for($i = 0; $i < count($incomeCategory); $i++)
            {
                $inColor[]    = '#' . $incomeCategory[$i]->color;
                $inCategory[] = $incomeCategory[$i]->name;
                $inAmount[]   = $incomeCategory[$i]->incomeCategoryRevenueAmount();
            }


            $data['incomeCategoryColor'] = $inColor;
            $data['incomeCategory']      = $inCategory;
            $data['incomeCatAmount']     = $inAmount;


            $expenseCategory = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get();
            $exColor         = array();
            $exCategory      = array();
            $exAmount        = array();
            for($i = 0; $i < count($expenseCategory); $i++)
            {
                $exColor[]    = '#' . $expenseCategory[$i]->color;
                $exCategory[] = $expenseCategory[$i]->name;
                $exAmount[]   = $expenseCategory[$i]->expenseCategoryAmount();
            }

            $data['expenseCategoryColor'] = $exColor;
            $data['expenseCategory']      = $exCategory;
            $data['expenseCatAmount']     = $exAmount;

            $data['incExpBarChartData']  = \Auth::user()->getincExpBarChartData();
            $data['incExpLineChartData'] = \Auth::user()->getIncExpLineChartDate();

            $data['currentYear']  = date('Y');
            $data['currentMonth'] = date('M');

            $constant['taxes']         = Tax::where('created_by', \Auth::user()->creatorId())->count();
            $constant['category']      = ProductServiceCategory::where('created_by', \Auth::user()->creatorId())->count();
            $constant['units']         = ProductServiceUnit::where('created_by', \Auth::user()->creatorId())->count();
            $constant['paymentMethod'] = PaymentMethod::where('created_by', \Auth::user()->creatorId())->count();
            $data['constant']          = $constant;

            return view('dashboard.index', $data);
        }


    }

    public function getOrderChart($arrParam)
    {
        $arrDuration = [];
        if($arrParam['duration'])
        {
            if($arrParam['duration'] == 'week')
            {
                $previous_week = strtotime("-2 week +1 day");
                for($i = 0; $i < 14; $i++)
                {
                    $arrDuration[date('Y-m-d', $previous_week)] = date('d-M', $previous_week);
                    $previous_week                              = strtotime(date('Y-m-d', $previous_week) . " +1 day");
                }
            }
        }

        $arrTask          = [];
        $arrTask['label'] = [];
        $arrTask['data']  = [];
        foreach($arrDuration as $date => $label)
        {

            $data               = Order::select(\DB::raw('count(*) as total'))->whereDate('created_at', '=', $date)->first();
            $arrTask['label'][] = $label;
            $arrTask['data'][]  = $data->total;
        }

        return $arrTask;
    }
}

