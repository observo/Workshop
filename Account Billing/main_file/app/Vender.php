<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class Vender extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $guard_name = 'web';
    protected $fillable   = [
        'vender_id',
        'name',
        'email',
        'password',
        'contact',
        'avatar',
        'is_active',
        'created_by',
        'email_verified_at',
        'billing_name',
        'billing_country',
        'billing_state',
        'billing_city',
        'billing_phone',
        'billing_zip',
        'billing_address',
        'shipping_name',
        'shipping_country',
        'shipping_state',
        'shipping_city',
        'shipping_phone',
        'shipping_zip',
        'shipping_address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public $settings;


    public function authId()
    {
        return $this->id;
    }

    public function creatorId()
    {
        if($this->type == 'company' || $this->type == 'super admin')
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        }
    }


    public function currentLanguage()
    {
        return $this->lang;
    }


    public function priceFormat($price)
    {
        $settings = Utility::settings();

        return (($settings['site_currency_symbol_position'] == "pre") ? $settings['site_currency_symbol'] : '') . number_format($price, 2) . (($settings['site_currency_symbol_position'] == "post") ? $settings['site_currency_symbol'] : '');
    }

    public function currencySymbol()
    {
        $settings = Utility::settings();

        return $settings['site_currency_symbol'];
    }

    public function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    }

    public function timeFormat($time)
    {
        $settings = Utility::settings();

        return date($settings['site_time_format'], strtotime($time));
    }

    public function invoiceNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["invoice_prefix"] . sprintf("%05d", $number);
    }

    public function billNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["bill_prefix"] . sprintf("%05d", $number);
    }

    public function billChartData()
    {
        for($m = 1; $m <= 12; $m++)
        {
            $month[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
        }
        $data['month']       = $month;
        $data['currentYear'] = date('M-Y');

        $totalBill = Bill::where('vender_id', \Auth::user()->id)->count();
        $unpaidArr = array();

        $unpaid['label']           = 'Unpaid';
        $unpaid['fill']            = '!0';
        $unpaid['backgroundColor'] = '#fc544b';
        $unpaid['borderColor']     = '#fc544b';

        $paid['label']           = 'Paid';
        $paid['fill']            = '!0';
        $paid['backgroundColor'] = '#63ed7a';
        $paid['borderColor']     = '#63ed7a';

        $partial['label']           = 'Partial';
        $partial['fill']            = '!0';
        $partial['backgroundColor'] = '#6777ef';
        $partial['borderColor']     = '#6777ef';

        $due['label']           = 'Due';
        $due['fill']            = '!0';
        $due['backgroundColor'] = '#ffa426';
        $due['borderColor']     = '#ffa426';


        for($i = 1; $i <= 12; $i++)
        {
            $unpaidBill  = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->where('status', '1')->where('due_date', '>', date('Y-m-d'))->get();
            $paidBill    = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->where('status', '4')->get();
            $partialBill = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->where('status', '3')->get();
            $dueBill     = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->where('status', '1')->where('due_date', '<', date('Y-m-d'))->get();

            $totalUnpaid = 0;
            for($j = 0; $j < count($unpaidBill); $j++)
            {
                $unpaidAmount = $unpaidBill[$j]->getDue();
                $totalUnpaid  += $unpaidAmount;

            }

            $totalPaid = 0;
            for($j = 0; $j < count($paidBill); $j++)
            {
                $paidAmount = $paidBill[$j]->getTotal();
                $totalPaid  += $paidAmount;

            }

            $totalPartial = 0;
            for($j = 0; $j < count($partialBill); $j++)
            {
                $partialAmount = $partialBill[$j]->getDue();
                $totalPartial  += $partialAmount;

            }

            $totalDue = 0;
            for($j = 0; $j < count($dueBill); $j++)
            {
                $dueAmount = $dueBill[$j]->getDue();
                $totalDue  += $dueAmount;

            }

            $unpaidData[]    = $totalUnpaid;
            $paidData[]      = $totalPaid;
            $partialData[]   = $totalPartial;
            $dueData[]       = $totalDue;
            $unpaid['data']  = $unpaidData;
            $paid['data']    = $paidData;
            $partial['data'] = $partialData;
            $due['data']     = $dueData;
        }

        $dataStatus[]       = $unpaid;
        $dataStatus[]       = $paid;
        $dataStatus[]       = $partial;
        $dataStatus[]       = $due;
        $data['statusData'] = $dataStatus;


        $unpaidBill  = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->where('status', '1')->where('due_date', '>', date('Y-m-d'))->get();
        $paidBill    = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->where('status', '4')->get();
        $partialBill = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->where('status', '3')->get();
        $dueBill     = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->where('status', '1')->where('due_date', '<', date('Y-m-d'))->get();

        $progressData['totalBill']        = $totalBill = Bill:: where('vender_id', \Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->count();
        $progressData['totalUnpaidBill']  = $totalUnpaidBill = count($unpaidBill);
        $progressData['totalPaidBill']    = $totalPaidBill = count($paidBill);
        $progressData['totalPartialBill'] = $totalPartialBill = count($partialBill);
        $progressData['totalDueBill']     = $totalDueBill = count($dueBill);

        $progressData['unpaidPr']  = ($totalBill != 0) ? ($totalUnpaidBill * 100) / $totalBill : 0;
        $progressData['paidPr']    = ($totalBill != 0) ? ($totalPaidBill * 100) / $totalBill : 0;
        $progressData['partialPr'] = ($totalBill != 0) ? ($totalPartialBill * 100) / $totalBill : 0;
        $progressData['duePr']     = ($totalBill != 0) ? ($totalDueBill * 100) / $totalBill : 0;

        $progressData['unpaidColor']  = '#fc544b';
        $progressData['paidColor']    = '#63ed7a';
        $progressData['partialColor'] = '#6777ef';
        $progressData['dueColor']     = '#ffa426';

        $data['progressData'] = $progressData;

        return $data;
    }
}
