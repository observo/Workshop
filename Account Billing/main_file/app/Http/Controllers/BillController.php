<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Bill;
use App\BillPayment;
use App\BillProduct;
use App\Invoice;
use App\Invoicr;
use App\Mail\BillPaymentCreate;
use App\Mail\BillSend;
use App\Mail\VenderBillSend;
use App\PaymentMethod;
use App\ProductService;
use App\ProductServiceCategory;
use App\Transaction;
use App\Vender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class BillController extends Controller
{

    public function index(Request $request)
    {
        if(\Auth::user()->can('manage bill'))
        {

            $vender = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'vender_id');
            $vender->prepend('All', '');

            $status = Invoice::$statues;

            $query = Bill::where('created_by', '=', \Auth::user()->creatorId());
            if(!empty($request->vender))
            {
                $query->where('vender_id', '=', $request->vender);
            }
            if(!empty($request->bill_date))
            {
                $date_range = explode(' - ', $request->bill_date);
                $query->whereBetween('bill_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $bills = $query->get();


            return view('bill.index', compact('bills', 'vender', 'status'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }


    public function create()
    {

        if(\Auth::user()->can('create bill'))
        {
            $category = ProductServiceCategory::where('created_by', \Auth::user()->creatorId())->where('type', 2)->get()->pluck('name', 'id');
            $category->prepend('Select Category', '');

            $bill_number = \Auth::user()->billNumberFormat($this->billNumber());
            $venders     = Vender::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'vender_id');
            $venders->prepend('Select Vender', '');

            $product_services = ProductService::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('bill.create', compact('venders', 'bill_number', 'product_services', 'category'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create bill'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'vender_id' => 'required',
                                   'bill_date' => 'required',
                                   'due_date' => 'required',
                                   'category_id' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $bill               = new Bill();
            $bill->bill_id      = $this->billNumber();
            $bill->vender_id    = $this->venderNumber();
            $bill->bill_date    = $request->bill_date;
            $bill->status       = 0;
            $bill->due_date     = $request->due_date;
            $bill->category_id  = $request->category_id;
            $bill->order_number = !empty($request->order_number) ? $request->order_number : 0;
            $bill->created_by   = \Auth::user()->creatorId();
            $bill->save();
            $products = $request->items;

            for($i = 0; $i < count($products); $i++)
            {
                $billProduct             = new BillProduct();
                $billProduct->bill_id    = $bill->bill_id;
                $billProduct->product_id = $products[$i]['item'];
                $billProduct->quantity   = $products[$i]['quantity'];
                $billProduct->tax        = $products[$i]['tax'];
                $billProduct->discount   = $products[$i]['discount'];
                $billProduct->price      = $products[$i]['price'];
                $billProduct->save();
            }

            return redirect()->route('bill.index', $bill->id)->with('success', __('Bill successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    function venderNumber()
    {
        $latest = Vender::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->customer_id + 1;
    }

    public function show(Bill $bill)
    {

        if(\Auth::user()->can('show bill'))
        {
            if($bill->created_by == \Auth::user()->creatorId())
            {
                $vender = $bill->vender;
                $iteams = $bill->items;

                return view('bill.view', compact('bill', 'vender', 'iteams'));
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


    public function edit(Bill $bill)
    {
        if(\Auth::user()->can('edit bill'))
        {
            $category = ProductServiceCategory::where('created_by', \Auth::user()->creatorId())->where('type', 2)->get()->pluck('name', 'id');
            $category->prepend('Select Category', '');

            $bill_number      = \Auth::user()->billNumberFormat($this->billNumber());
            $venders          = Vender::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'vender_id');
            $product_services = ProductService::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('bill.edit', compact('venders', 'product_services', 'bill', 'bill_number', 'category'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, Bill $bill)
    {
        if(\Auth::user()->can('edit bill'))
        {

            if($bill->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'vender_id' => 'required',
                                       'bill_date' => 'required',
                                       'due_date' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->route('bill.index')->with('error', $messages->first());
                }
                $bill->vender_id    = $request->vender_id;
                $bill->bill_date    = $request->bill_date;
                $bill->due_date     = $request->due_date;
                $bill->order_number = $request->order_number;
                $bill->category_id  = $request->category_id;
                $bill->save();
                $products = $request->items;

                for($i = 0; $i < count($products); $i++)
                {
                    $billProduct = BillProduct::find($products[$i]['id']);
                    if($billProduct == null)
                    {
                        $billProduct = new BillProduct();
                    }
                    $billProduct->bill_id    = $bill->bill_id;
                    $billProduct->product_id = $products[$i]['item'];
                    $billProduct->quantity   = $products[$i]['quantity'];
                    $billProduct->tax        = $products[$i]['tax'];
                    $billProduct->discount   = $products[$i]['discount'];
                    $billProduct->price      = $products[$i]['price'];
                    $billProduct->save();
                }


                return redirect()->back()->with('success', __('Bill successfully updated.'));
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

    public function destroy(Bill $bill)
    {
        if(\Auth::user()->can('delete bill'))
        {
            if($bill->created_by == \Auth::user()->creatorId())
            {
                $bill->delete();
                BillProduct::where('bill_id', '=', $bill->id)->delete();

                return redirect()->route('bill.index')->with('success', __('Bill successfully deleted.'));
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

    function billNumber()
    {
        $latest = Bill::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->bill_id + 1;
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

    public function productDestroy(Request $request)
    {
        if(\Auth::user()->can('delete bill product'))
        {
            BillProduct::where('id', '=', $request->id)->delete();

            return redirect()->back()->with('success', __('Bill product successfully deleted.'));

        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function sent($id)
    {
        if(\Auth::user()->can('send bill'))
        {
            $bill            = Bill::where('bill_id', $id)->first();
            $bill->send_date = date('Y-m-d');
            $bill->status    = 1;
            $bill->save();

            $vender = Vender::where('vender_id', $bill->vender_id)->first();

            $bill->name = $vender->name;
            $bill->bill = \Auth::user()->billNumberFormat($bill->invoice_id);

            $billId    = Crypt::encrypt($bill->bill_id);
            $bill->url = route('bill.pdf', $billId);

            try
            {
                Mail::to($vender->email)->send(new BillSend($bill));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->back()->with('success', __('Bill successfully sent.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function payment($bill_id)
    {
        if(\Auth::user()->can('create payment bill'))
        {
            $bill       = Bill::where('bill_id', $bill_id)->first();
            $venders    = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('bill.payment', compact('venders', 'categories', 'payments', 'accounts', 'bill'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));

        }
    }

    public function createPayment(Request $request, $bill_id)
    {
        if(\Auth::user()->can('create payment bill'))
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

            $billPayment                 = new BillPayment();
            $billPayment->bill_id        = $bill_id;
            $billPayment->date           = $request->date;
            $billPayment->amount         = $request->amount;
            $billPayment->account_id     = $request->account_id;
            $billPayment->payment_method = $request->payment_method;
            $billPayment->reference      = $request->reference;
            $billPayment->description    = $request->description;
            $billPayment->save();

            $bill  = Bill::where('bill_id', $bill_id)->first();
            $due   = $bill->getDue();
            $total = $bill->getTotal();

            if($bill->status == 0)
            {
                $bill->send_date = date('Y-m-d');
                $bill->save();
            }

            if($due <= 0)
            {
                $bill->status = 4;
                $bill->save();
            }
            else
            {
                $bill->status = 3;
                $bill->save();
            }
            $billPayment->user_id    = $bill->vender_id;
            $billPayment->user_type  = 'Vender';
            $billPayment->type       = 'Partial';
            $billPayment->created_by = \Auth::user()->id;
            $billPayment->payment_id = $billPayment->id;
            $billPayment->category   = 'Bill';

            Transaction::addTransaction($billPayment);

            $vender         = Vender::where('vender_id', $bill->vender_id)->first();
            $payment_method = PaymentMethod::where('id', $request->payment_method)->first();

            $payment         = new BillPayment();
            $payment->name   = $vender['name'];
            $payment->method = $payment_method['name'];
            $payment->date   = \Auth::user()->dateFormat($request->date);
            $payment->amount = \Auth::user()->priceFormat($request->amount);
            $payment->bill   = 'bill ' . \Auth::user()->billNumberFormat($billPayment->bill_id);

            try
            {
                Mail::to($vender['email'])->send(new BillPaymentCreate($payment));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->back()->with('success', __('Payment successfully added.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }

    }

    public function paymentDestroy(Request $request, $bill_id, $payment_id)
    {

        if(\Auth::user()->can('delete payment bill'))
        {
            BillPayment::where('id', '=', $payment_id)->delete();

            $bill = Bill::where('bill_id', $bill_id)->first();
            $due  = $bill->getDue();
            if($due > 0)
            {
                $bill->status = 3;
                $bill->save();
            }

            $type = 'Partial';
            $user = 'Vender';
            Transaction::destroyTransaction($payment_id, $type, $user);

            return redirect()->back()->with('success', __('Payment successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function venderBill(Request $request)
    {
        if(\Auth::user()->can('manage vender bill'))
        {

            $status = Invoice::$statues;

            $query = Bill::where('vender_id', '=', \Auth::user()->vender_id)->where('status', '!=', '0');

            if(!empty($request->vender))
            {
                $query->where('vender_id', '=', $request->vender);
            }
            if(!empty($request->bill_date))
            {
                $date_range = explode(' - ', $request->bill_date);
                $query->whereBetween('bill_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $bills = $query->get();


            return view('bill.index', compact('bills', 'status', 'vender'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    public function venderBillShow($bill_id)
    {
        if(\Auth::user()->can('show bill'))
        {
            $bill = Bill::where('bill_id', $bill_id)->first();

            if($bill->created_by == \Auth::user()->creatorId())
            {
                $vender = $bill->vender;
                $iteams = $bill->items;

                return view('bill.view', compact('bill', 'vender', 'iteams'));
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

    public function vender(Request $request)
    {
        $vender = Vender::where('vender_id', '=', $request->vender_id)->first();

        return view('bill.vender_detail', compact('vender'));
    }

    public function bill($bill_id)
    {
        $billId = Crypt::decrypt($bill_id);

        $bill = Bill::where('bill_id', $billId)->first();
        if(!empty($bill))
        {
            $venderId = Bill::where('vender_id', $bill->vender_id)->first();
            $settings = DB::table('settings')->where('created_by', '=', $venderId->created_by)->get()->pluck('value', 'name');
            $billId   = $settings["bill_prefix"] . sprintf("%05d", $billId);

            $invoicr = new Invoicr();

            $invoicr->invoicr("A4", $settings['site_currency_symbol'], $venderId->lang);

            $invoicr->setNumberFormat('.', ',');

            $logo = asset(Storage::url('logo/'));

            $invoicr->setLogo($logo . "/logo.png");
            $invoicr->setColor($settings['color_theme']);
            $invoicr->setType($billId);
            $invoicr->setReference('');
            $invoicr->setDate($bill->send_date);
            $invoicr->setDue($bill->due_date);

            $vender = Vender::where('vender_id', $bill->vender_id)->first();

            $invoicr->setFrom(
                array(
                    $vender->billing_name . ", " . $vender->billing_phone,
                    $vender->billing_address,
                    $vender->billing_city . ", " . $vender->billing_state,
                    $vender->billing_country,
                    $vender->billing_zip,
                )
            );
            $invoicr->setTo(
                array(
                    $vender->shipping_name . ", " . $vender->shipping_phone,
                    $vender->shipping_address,
                    $vender->shipping_city . ", " . $vender->shipping_state,
                    $vender->shipping_country,
                    $vender->shipping_zip,
                )
            );

            foreach($bill->items as $item)
            {
                $itemPrice    = $item->quantity * $item->price;
                $itemSubTotal = ($item->tax / 100) * $itemPrice;
                $itemTotal    = ($itemPrice + $itemSubTotal) - $item->discount;
                $invoicr->addItem($item->product()->name, false, $item->quantity, $item->tax, $item->price, $item->discount, $itemTotal);
            }

            $invoicr->addTotal(__('Total'), $bill->getTotal());
            $invoicr->addTotal(__('Total due'), $bill->getDue(), true);

            if($bill->status == 4)
            {
                $invoicr->addBadge(__('Paid'));
            }
            elseif($bill->status == 3)
            {
                $invoicr->addBadge(__('Partialy Paid'));
            }
            else
            {
                $invoicr->addBadge(__('Unpaid'));
            }

            $invoicr->addTitle($settings['footer_title']);
            $invoicr->addParagraph($settings['footer_notes']);

            $invoicr->render($billId . '.pdf', 'I');
        }
        else
        {
            echo __('Record Not Found');
        }
    }

    public function venderBillSend($bill_id)
    {
        return view('vender.bill_send', compact('bill_id'));
    }

    public function venderBillSendMail(Request $request, $bill_id)
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

        $email = $request->email;
        $bill  = Bill::where('bill_id', $bill_id)->first();

        $vender     = Vender::where('vender_id', $bill->vender_id)->first();
        $bill->name = $vender->name;
        $bill->bill = \Auth::user()->billNumberFormat($bill->bill_id);

        $billId    = Crypt::encrypt($bill->bill_id);
        $bill->url = route('bill.pdf', $billId);

        try
        {
            Mail::to($email)->send(new VenderBillSend($bill));
        }
        catch(\Exception $e)
        {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }

        return redirect()->back()->with('success', __('Bill successfully sent.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));

    }
}
