<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BillPaymentCreate extends Mailable
{
    use Queueable, SerializesModels;
    public $payment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.bill_payment_create')->subject('Ragarding to payment succesfully sent')->with('payment', $this->payment);
    }
}
