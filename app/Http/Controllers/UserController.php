<?php

namespace App\Http\Controllers;

use App\Mail\PasswordChanged;
use App\Mail\UserInvited;
use App\Mail\UserRegistered;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $role = Role::where('id', $request->role)->first();
        $user->assignRole($role->name);

        $token = Password::getRepository()->create($user);

        Mail::to($user->email)->send(new UserInvited($user, $token));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($name)
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $invited = !$user->password;

        if($invited) {
            User::where('id', $user->id)->update(['email_verified_at' => Carbon::now()]);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        Mail::to($user)->send(new PasswordChanged($user,$invited));

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    /**
     * @param $name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showBilling($name)
    {
        $user = User::where('name', $name)->first();

        $subscription = '';
        if($user->subscriptions->count()) {
            $subscription = $user->subscriptions()->first()->asStripeSubscription();
        }

        $plans = Plan::all();

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        $invoices = $stripe->invoices->all(['customer' => $user->stripe_id])->data;
        $invoices = new Paginator($invoices, 5);
        $invoices->withPath(route('show.user.billing', ['name' => $user->name]));
//        dd($invoices->data);


        if($subscription) {
            return view('users.billing', compact('user', 'plans', 'invoices', 'subscription'));
        } else {
            return view('users.billing', compact('user', 'plans', 'invoices'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePaymentDetails(Request $request)
    {
        $user = Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'street_name' => $request->street_name,
            'street_number' => $request->street_number,
            'country_id' => 1,
            'state' => 1,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'phone' => $request->phone
        ]);

        return back();
    }

    public function downloadInvoice(Request $request, $name, $invoiceId)
    {
        $user = User::where('name', $name)->first();

        $invoice = $user->findInvoice($invoiceId);

        return $request->user()->downloadInvoice($invoiceId, [], $user->name . $invoice->date()->toDateString());
    }
}
