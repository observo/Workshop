<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VenderBillSend extends Mailable
{
    use Queueable, SerializesModels;
    public $bill;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bill)
    {
        $this->bill = $bill;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.vender_bill_send')->with('bill', $this->bill)->subject('Ragarding to send bill');
    }
}
