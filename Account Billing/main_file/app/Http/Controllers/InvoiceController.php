<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use App\BankAccount;
use App\Customer;
use App\Invoice;
use App\InvoicePayment;
use App\InvoiceProduct;
use App\Invoicr;
use App\Mail\CustomerInvoiceSend;
use App\Mail\InvoicePaymentCreate;
use App\Mail\InvoiceSend;
use App\Mail\PaymentReminder;
use App\Milestone;
use App\PaymentMethod;
use App\Products;
use App\ProductService;
use App\ProductServiceCategory;
use App\Task;
use App\Transaction;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['invoice']]);
    }

    public function index(Request $request)
    {

        if(\Auth::user()->can('manage invoice'))
        {

            $customer = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'customer_id');
            $customer->prepend('All', '');

            $status = Invoice::$statues;

            $query = Invoice::where('created_by', '=', \Auth::user()->creatorId());

            if(!empty($request->customer))
            {
                $query->where('customer_id', '=', $request->customer);
            }
            if(!empty($request->issue_date))
            {
                $date_range = explode(' - ', $request->issue_date);
                $query->whereBetween('issue_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $invoices = $query->get();

            return view('invoice.index', compact('invoices', 'customer', 'status'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    public function create()
    {

        if(\Auth::user()->can('create invoice'))
        {
            $invoice_number = \Auth::user()->invoiceNumberFormat($this->invoiceNumber());
            $customers      = Customer::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'customer_id');
            $customers->prepend('Select Customer', '');
            $category = ProductServiceCategory::where('created_by', \Auth::user()->creatorId())->where('type', 1)->get()->pluck('name', 'id');
            $category->prepend('Select Category', '');
            $product_services = ProductService::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('invoice.create', compact('customers', 'invoice_number', 'product_services', 'category'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function customer(Request $request)
    {
        $customer = Customer::where('customer_id', '=', $request->customer_id)->first();

        return view('invoice.customer_detail', compact('customer'));
    }

    public function product(Request $request)
    {

        $data['product']     = $product = ProductService::find($request->product_id);
        $data['unit']        = $product->unit()->name;
        $data['taxRate']     = $taxRate = $taxRate = $product->taxes()->rate;
        $salePrice           = $product->sale_price;
        $quantity            = 1;
        $taxPrice            = ($taxRate / 100) * ($salePrice * $quantity);
        $data['totalAmount'] = ($salePrice * $quantity) + $taxPrice;

        return json_encode($data);
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('create invoice'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'customer_id' => 'required',
                                   'issue_date' => 'required',
                                   'due_date' => 'required',
                                   'category_id' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $status = Invoice::$statues;

            $invoice              = new Invoice();
            $invoice->invoice_id  = $this->invoiceNumber();
            $invoice->customer_id = $request->customer_id;
            $invoice->status      = 0;
            $invoice->issue_date  = $request->issue_date;
            $invoice->due_date    = $request->due_date;
            $invoice->category_id = $request->category_id;
            $invoice->ref_number  = $request->ref_number;
            $invoice->created_by  = \Auth::user()->creatorId();
            $invoice->save();
            $products = $request->items;

            for($i = 0; $i < count($products); $i++)
            {
                $invoiceProduct             = new InvoiceProduct();
                $invoiceProduct->invoice_id = $invoice->invoice_id;
                $invoiceProduct->product_id = $products[$i]['item'];
                $invoiceProduct->quantity   = $products[$i]['quantity'];
                $invoiceProduct->tax        = $products[$i]['tax'];
                $invoiceProduct->discount   = $products[$i]['discount'];
                $invoiceProduct->price      = $products[$i]['price'];
                $invoiceProduct->save();
            }

            return redirect()->route('invoice.index', $invoice->id)->with('success', __('Invoice successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function edit(Invoice $invoice)
    {
        if(\Auth::user()->can('edit invoice'))
        {
            $invoice_number = \Auth::user()->invoiceNumberFormat($this->invoiceNumber());
            $customers      = Customer::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'customer_id');
            $category       = ProductServiceCategory::where('created_by', \Auth::user()->creatorId())->where('type', 1)->get()->pluck('name', 'id');
            $category->prepend('Select Category', '');
            $product_services = ProductService::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('invoice.edit', compact('customers', 'product_services', 'invoice', 'invoice_number', 'category'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Invoice $invoice)
    {

        if(\Auth::user()->can('edit bill'))
        {

            if($invoice->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'customer_id' => 'required',
                                       'issue_date' => 'required',
                                       'due_date' => 'required',
                                       'category_id' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->route('bill.index')->with('error', $messages->first());
                }
                $invoice->customer_id = $request->customer_id;
                $invoice->issue_date  = $request->issue_date;
                $invoice->due_date    = $request->due_date;
                $invoice->ref_number  = $request->ref_number;
                $invoice->category_id = $request->category_id;
                $invoice->save();

                $products = $request->items;

                for($i = 0; $i < count($products); $i++)
                {
                    $invoiceProduct = InvoiceProduct::find($products[$i]['id']);
                    if($invoiceProduct == null)
                    {
                        $invoiceProduct             = new InvoiceProduct();
                        $invoiceProduct->invoice_id = $invoice->invoice_id;
                    }
                    $invoiceProduct->product_id = $products[$i]['item'];
                    $invoiceProduct->quantity   = $products[$i]['quantity'];
                    $invoiceProduct->tax        = $products[$i]['tax'];
                    $invoiceProduct->discount   = $products[$i]['discount'];
                    $invoiceProduct->price      = $products[$i]['price'];
                    $invoiceProduct->save();
                }

                return redirect()->back()->with('success', __('Invoice successfully updated.'));
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

    function invoiceNumber()
    {
        $latest = Invoice::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->invoice_id + 1;
    }

    public function show(Invoice $invoice)
    {
        if(\Auth::user()->can('show invoice'))
        {
            if($invoice->created_by == \Auth::user()->creatorId())
            {
                $customer = $invoice->customer();
                $iteams   = $invoice->items;

                return view('invoice.view', compact('invoice', 'customer', 'iteams'));
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

    public function destroy(Invoice $invoice)
    {
        if(\Auth::user()->can('delete invoice'))
        {
            if($invoice->created_by == \Auth::user()->creatorId())
            {
                $invoice->delete();
                InvoiceProduct::where('invoice_id', '=', $invoice->id)->delete();

                return redirect()->route('invoice.index')->with('success', __('Invoice successfully deleted.'));
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

    public function productDestroy(Request $request)
    {

        if(\Auth::user()->can('delete invoice product'))
        {
            InvoiceProduct::where('id', '=', $request->id)->delete();
            return redirect()->back()->with('success', __('Bill product successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function customerInvoice(Request $request)
    {
        if(\Auth::user()->can('manage customer invoice'))
        {

            $status = Invoice::$statues;

            $query = Invoice::where('customer_id', '=', \Auth::user()->customer_id)->where('status', '!=', '0');

            if(!empty($request->issue_date))
            {
                $date_range = explode(' - ', $request->issue_date);
                $query->whereBetween('issue_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $invoices = $query->get();

            return view('invoice.index', compact('invoices', 'status'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    public function customerInvoiceShow($invoice_id)
    {
        if(\Auth::user()->can('show invoice'))
        {
            $invoice = Invoice::where('invoice_id', $invoice_id)->first();
            if($invoice->created_by == \Auth::user()->creatorId())
            {
                $customer = $invoice->customer();
                $iteams   = $invoice->items;

                return view('invoice.view', compact('invoice', 'customer', 'iteams'));
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

    public function sent($id)
    {
        if(\Auth::user()->can('send invoice'))
        {
            $invoice            = Invoice::where('invoice_id', $id)->first();
            $invoice->send_date = date('Y-m-d');
            $invoice->status    = 1;
            $invoice->save();

            $customer         = Customer::where('customer_id', $invoice->customer_id)->first();
            $invoice->name    = $customer->name;
            $invoice->invoice = \Auth::user()->invoiceNumberFormat($invoice->invoice_id);

            $invoiceId    = Crypt::encrypt($invoice->invoice_id);
            $invoice->url = route('invoice.pdf', $invoiceId);

            try
            {
                Mail::to($customer->email)->send(new InvoiceSend($invoice));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->back()->with('success', __('Invoice successfully sent.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function payment($invoice_id)
    {
        if(\Auth::user()->can('create payment invoice'))
        {
            $invoice = Invoice::where('invoice_id', $invoice_id)->first();

            $customers  = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('invoice.payment', compact('customers', 'categories', 'payments', 'accounts', 'invoice'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function createPayment(Request $request, $invoice_id)
    {
        if(\Auth::user()->can('create payment invoice'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'date' => 'required',
                                   'amount' => 'required',
                                   'account_id' => 'required',
                                   'payment_method' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $invoicePayment                 = new InvoicePayment();
            $invoicePayment->invoice_id     = $invoice_id;
            $invoicePayment->date           = $request->date;
            $invoicePayment->amount         = $request->amount;
            $invoicePayment->account_id     = $request->account_id;
            $invoicePayment->payment_method = $request->payment_method;
            $invoicePayment->reference      = $request->reference;
            $invoicePayment->description    = $request->description;
            $invoicePayment->save();

            $invoice = Invoice::where('invoice_id', $invoice_id)->first();
            $due     = $invoice->getDue();
            $total   = $invoice->getTotal();
            if($invoice->status == 0)
            {
                $invoice->send_date = date('Y-m-d');
                $invoice->save();
            }

            if($due <= 0)
            {
                $invoice->status = 4;
                $invoice->save();
            }
            else
            {
                $invoice->status = 3;
                $invoice->save();
            }
            $invoicePayment->user_id    = $invoice->customer_id;
            $invoicePayment->user_type  = 'Customer';
            $invoicePayment->type       = 'Partial';
            $invoicePayment->created_by = \Auth::user()->id;
            $invoicePayment->payment_id = $invoicePayment->id;
            $invoicePayment->category   = 'Invoice';

            Transaction::addTransaction($invoicePayment);

            $customer = Customer::where('customer_id', $invoice->customer_id)->first();

            $payment            = new InvoicePayment();
            $payment->name      = $customer['name'];
            $payment->date      = \Auth::user()->dateFormat($request->date);
            $payment->amount    = \Auth::user()->priceFormat($request->amount);
            $payment->invoice   = 'invoice ' . \Auth::user()->invoiceNumberFormat($invoice->invoice_id);
            $payment->dueAmount = \Auth::user()->priceFormat($invoice->getDue());

            try
            {
                Mail::to($customer['email'])->send(new InvoicePaymentCreate($payment));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->back()->with('success', __('Payment successfully added.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }

    }

    public function paymentDestroy(Request $request, $invoice_id, $payment_id)
    {

        if(\Auth::user()->can('delete payment invoice'))
        {
            InvoicePayment::where('id', '=', $payment_id)->delete();

            $invoice = Invoice::where('invoice_id', $invoice_id)->first();
            $due     = $invoice->getDue();
            if($due > 0)
            {
                $invoice->status = 3;
                $invoice->save();
            }

            $type = 'Partial';
            $user = 'Customer';
            Transaction::destroyTransaction($payment_id, $type, $user);

            return redirect()->back()->with('success', __('Payment successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function paymentReminder($invoice_id)
    {
        $invoice            = Invoice::find($invoice_id);
        $customer           = Customer::where('customer_id', $invoice->customer_id)->first();
        $invoice->dueAmount = \Auth:: user()->priceFormat($invoice->getDue());
        $invoice->name      = $customer['name'];
        $invoice->date      = \Auth::user()->dateFormat($invoice->send_date);
        $invoice->invoice   = \Auth::user()->invoiceNumberFormat($invoice->invoice_id);

        try
        {
            Mail::to($customer['email'])->send(new PaymentReminder($invoice));
        }
        catch(\Exception $e)
        {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }

        return redirect()->back()->with('success', __('Payment reminder successfully send.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
    }


    public function invoice($invoice_id)
    {
        $invoiceId = Crypt::decrypt($invoice_id);

        $invoice = Invoice::where('invoice_id', $invoiceId)->first();
        if(!empty($invoice))
        {
            $customerId = Customer::where('customer_id', $invoice->customer_id)->first();
            $settings   = DB::table('settings')->where('created_by', '=', $customerId->created_by)->get()->pluck('value', 'name');

            $invoiceId = $settings["invoice_prefix"] . sprintf("%05d", $invoiceId);

            $invoicr = new Invoicr();

            $invoicr->invoicr("A4", $settings['site_currency_symbol'], $customerId->lang);

            $invoicr->setNumberFormat('.', ',');

            $logo = asset(Storage::url('logo/'));

            $invoicr->setLogo($logo . "/logo.png");
            $invoicr->setColor($settings['color_theme']);
            $invoicr->setType($invoiceId);
            $invoicr->setReference($invoice->ref_number);
            $invoicr->setDate($invoice->send_date);
            $invoicr->setDue($invoice->due_date);

            $customer = Customer::where('customer_id', $invoice->customer_id)->first();

            $invoicr->setFrom(
                array(
                    $customer->billing_name . ", " . $customer->billing_phone,
                    $customer->billing_address,
                    $customer->billing_city . ", " . $customer->billing_state,
                    $customer->billing_country,
                    $customer->billing_zip,
                )
            );
            $invoicr->setTo(
                array(
                    $customer->shipping_name . ", " . $customer->shipping_phone,
                    $customer->shipping_address,
                    $customer->shipping_city . ", " . $customer->shipping_state,
                    $customer->shipping_country,
                    $customer->shipping_zip,
                )
            );

            foreach($invoice->items as $item)
            {
                $itemPrice    = $item->quantity * $item->price;
                $itemSubTotal = ($item->tax / 100) * $itemPrice;
                $itemTotal    = ($itemPrice + $itemSubTotal) - $item->discount;
                $invoicr->addItem($item->product()->name, false, $item->quantity, $item->tax, $item->price, $item->discount, $itemTotal);
            }

            $invoicr->addTotal(__('Total'), $invoice->getTotal());
            $invoicr->addTotal(__('Total due'), $invoice->getDue(), true);

            if($invoice->status == 4)
            {
                $invoicr->addBadge(__('Paid'));
            }
            elseif($invoice->status == 3)
            {
                $invoicr->addBadge(__('Partialy Paid'));
            }
            else
            {
                $invoicr->addBadge(__('Unpaid'));
            }

            $invoicr->addTitle($settings['footer_title']);
            $invoicr->addParagraph($settings['footer_notes']);

            $invoicr->render($invoiceId . '.pdf', 'I');
        }
        else
        {
            echo __('Record Not Found');
        }
    }

    public function customerInvoiceSend($invoice_id)
    {
        return view('customer.invoice_send', compact('invoice_id'));
    }

    public function customerInvoiceSendMail(Request $request, $invoice_id)
    {
        $validator = \Validator::make(
            $request->all(), [
                               'email' => 'required|email',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $email   = $request->email;
        $invoice = Invoice::where('invoice_id', $invoice_id)->first();

        $customer         = Customer::where('customer_id', $invoice->customer_id)->first();
        $invoice->name    = $customer->name;
        $invoice->invoice = \Auth::user()->invoiceNumberFormat($invoice->invoice_id);

        $invoiceId    = Crypt::encrypt($invoice->invoice_id);
        $invoice->url = route('invoice.pdf', $invoiceId);

        try
        {
            Mail::to($email)->send(new CustomerInvoiceSend($invoice));
        }
        catch(\Exception $e)
        {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }

        return redirect()->back()->with('success', __('Invoice successfully sent.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));

    }
}
