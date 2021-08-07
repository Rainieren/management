<?php

namespace App\Http\Middleware;

use App\Models\Plan;
use Closure;
use Illuminate\Http\Request;

class NotSubscribedCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Redirects the customer if the customer does not have a subscription
        if($request->user() && ($request->user()->subscriptions()->active()->count()) >= 1) {
            return redirect('/');
        }
        return $next($request);
    }
}
