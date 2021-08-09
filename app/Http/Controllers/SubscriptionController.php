<?php

namespace App\Http\Controllers;

use App\Mail\UserInvited;
use App\Mail\UserSubscribed;
use App\Models\Plan;
use App\Models\User;
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
        $user = User::find(auth()->user()->id);
        $plan = Plan::where('stripe_plan_id', $request->plan)->first();

        $subscription = $user->newSubscription($plan->name, $request->plan)
                    ->trialDays(7)
                    ->create($request->paymentMethod);

        $user->trial_ends_at = $subscription->trial_ends_at;
        $user->save();

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
        $user = $request->user();

        $plan = Plan::where('stripe_plan_id', $request->plan)->first();
        $subscription = $user->subscription($user->subscriptions[0]->name);

        $user->subscription($user->subscriptions[0]->name)->noProrate()->swap($request->plan);

        $subscription->name = $plan->name;
        $subscription->save();

//        $user->subs

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Request $request)
    {
        $request->user()->subscription($request->plan)->cancel();

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resume(Request $request)
    {
        $request->user()->subscription($request->plan)->resume();

        return back();
    }


}
