<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceSend;
use App\Mail\PasswordChanged;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_jISrZkHj8XDTwm9uuGd7bfyG'
        );

        $invoices = $stripe->invoices->all(['limit' => 100])->data;
        $invoices = new Paginator($invoices, 15);
        $invoices->withPath(route('show.invoices'));

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "Client"); })->whereNotNull('stripe_id')->get();

        return view('invoices.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->client)->first();

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        foreach(json_decode($request->invoice_items) as $item) {
            $stripe->invoiceItems->create([
                "customer" => $user->stripe_id,
                "currency" => "usd",
                "description" => $item->description,
                "quantity" => $item->quantity,
                "unit_amount" => str_replace(array('.', ','), '' , number_format((float)$item->unit_price, 2, '.', ''))
            ]);
        }

        $invoice = $stripe->invoices->create([
            "customer" => $user->stripe_id,
            "due_date" => now()->addDays($request->due_date)->unix(),
            "collection_method" => "send_invoice",
            "description" => $request->memo,
        ]);

        $invoice->finalizeInvoice();

        Mail::to($user)->send(new InvoiceSend($invoice, $user));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, $invoice)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        $stripe->invoices->pay($invoice);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($number)
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_jISrZkHj8XDTwm9uuGd7bfyG'
        );
        $invoice = $stripe->invoices->retrieve(
            Crypt::decryptString($number)
        );

        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
