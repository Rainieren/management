<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceSend;
use App\Mail\PasswordChanged;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
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

        $invoices = $stripe->invoices->all()->data;
        $invoices = new Paginator($invoices, 15);
        $invoices->withPath(route('show.invoices'));

        return view('orders.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "Client"); })->get();

        return view('orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::find(1)->first();

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        $stripe->invoiceItems->create([
            "customer" => $user->stripe_id,
            "currency" => "usd",
            "description" => "Item",
            "quantity" => 1,
            "unit_amount" => 3333
        ]);

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
            $number
        );

        return view('orders.show', compact('invoice'));
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
