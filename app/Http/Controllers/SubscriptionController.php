<?php

namespace App\Http\Controllers;

use App\Mail\UserInvited;
use App\Mail\UserSubscribed;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($id)
    {
        $plan = Plan::where('slug', $id)->first();

        $intent = auth()->user()->createSetupIntent();

        return view('billings.checkout', compact('plan', 'intent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

//        dd($request->all());
        $plan = Plan::where('stripe_plan_id', $request->plan)->first();

        auth()->user()->newSubscription($plan->name, $request->plan)->create($request->paymentMethod);

        Mail::to(auth()->user()->email)->send(new UserSubscribed(auth()->user(), $plan));

        return view('billings.confirmation', compact('plan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function swap(Request $request)
    {
//        dd(auth()->user()->subscriptions[0]->stripe_price);
//        $plan = Plan::where('stripe_plan_id', $request->plan)->first();
//        dd($request->user()->subscription('Basic'), $request->user()->subscriptions[0]->name);
//        $current_plan = $request->user()->subscriptions[0]->stripe_price;
        $user = $request->user();
        $user->subscription($user->subscriptions[0]->name)->noProrate()->swap($request->plan);

        return back();
    }


}
