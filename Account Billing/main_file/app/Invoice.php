<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_id',
        'customer_id',
        'issue_date',
        'due_date',
        'ref_number',
        'status',
        'category_id',
        'created_by',
    ];

    public static $statues = [
        'Draft',//0
        'Sent',//1
        'Unpaid',//2
        'Partialy Paid',//3
        'Paid',//4
    ];


    public function tax()
    {
        return $this->hasOne('App\Tax', 'id', 'tax_id');
    }

    public function items()
    {
        return $this->hasMany('App\InvoiceProduct', 'invoice_id', 'invoice_id');
    }

    public function payments()
    {
        return $this->hasMany('App\InvoicePayment', 'invoice_id', 'invoice_id');
    }

    public function customer()
    {
        return $this->hasMany('App\Customer', 'customer_id', 'customer_id')->first();
    }


    public function getSubTotal()
    {
        $subTotal = 0;
        foreach($this->items as $product)
        {
            $subTotal += ($product->price * $product->quantity);
        }

        return $subTotal;
    }

    public function getTotalTax()
    {
        $totalTax = 0;
        foreach($this->items as $product)
        {
            $totalTax += ($product->tax / 100) * ($product->price * $product->quantity);
        }

        return $totalTax;
    }

    public function getTotalDiscount()
    {
        $totalDiscount = 0;
        foreach($this->items as $product)
        {
            $totalDiscount += $product->discount;
        }

        return $totalDiscount;
    }

    public function getTotal()
    {
        return ($this->getSubTotal() + $this->getTotalTax()) - $this->getTotalDiscount();
    }

    public function getDue()
    {
        $due = 0;
        foreach($this->payments as $payment)
        {
            $due += $payment->amount;
        }

        return $this->getTotal() - $due;
    }


    public static function change_status($invoice_id, $status)
    {

        $invoice         = \ice::find($invoice_id);
        $invoice->status = $status;
        $invoice->update();
    }

    public function category(){
        return $this->hasOne('App\ProductServiceCategory','id','category_id');
    }
}
