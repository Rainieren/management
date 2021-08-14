@extends('layouts.dashboard')

@section('content')
        <div class="grid grid-cols-8 gap-6 mb-6">
            <div class="col-span-8 md:col-span-2">
                <ul class="space-y-2">
                    <li class="px-4 py-2 transition rounded-lg hover:bg-indigo-600 hover:text-white flex cursor-pointer space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ __('Profile') }}</span>
                    </li>
                    <li class="px-4 py-2 transition rounded-lg hover:bg-indigo-600 hover:text-white flex cursor-pointer space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ __('Account') }}</span>
                    </li>
                    <li class="px-4 py-2 transition rounded-lg hover:bg-indigo-600 hover:text-white flex cursor-pointer space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span>{{ __('Notifications') }}</span>
                    </li>
                    <li class="px-4 py-2 transition rounded-lg bg-indigo-600 text-white flex cursor-pointer space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span>{{ __('Plan & Billing') }}</span>
                    </li>
                    <li class="px-4 py-2 transition rounded-lg hover:bg-indigo-600 hover:text-white flex cursor-pointer space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                        <span>{{ __('Integrations') }}</span>
                    </li>
                </ul>
            </div>
            <div class="col-span-8 md:col-span-6 space-y-6">
                <div class="bg-white rounded-lg shadow border">
                    <div class="space-y-6 p-8">
                        <div class="">
                            <p class="font-medium text-lg">{{ __('Payment details') }}</p>
                            <p class="text-gray-500 text-sm">{{ __('Update your payment details. Please note that updating your location could affect your tax rates.') }}</p>
                        </div>
                        <form action="{{ route('store.user.payment_details', ['name', $user->name]) }}" method="POST" id="payment-details">
                            @csrf
                            <div class="grid grid-cols-6 gap-4">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Full name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="name" value="{{ $user->name }}" required autocomplete="name">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="email" value="{{ $user->email }}" required autocomplete="email">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="street_name" class="block text-sm font-medium text-gray-700">{{ __('Street name') }}</label>
                                    <input id="street_name" type="text" class="form-control @error('street_name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="street_name" value="{{ $user->street_name }}" required autocomplete="street_name">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="street_number" class="block text-sm font-medium text-gray-700">{{ __('Apt, Suite etc.') }}</label>
                                    <input id="street_number" type="text" class="form-control @error('street_number') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="street_number" value="{{ $user->street_number }}" required autocomplete="street_number">
                                </div>
                                <div class="col-span-6">
                                    <label for="country" class="block text-sm font-medium text-gray-700">{{ __('Country') }}</label>
                                    <select class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="country" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700">{{ __('City') }}</label>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="city" value="{{ $user->city }}" required autocomplete="city">
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="state" class="block text-sm font-medium text-gray-700">{{ __('State') }}</label>
                                    <select class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="state" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">{{ __('Postal code') }}</label>
                                    <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="postal_code" value="{{ $user->postal_code }}" required autocomplete="postal_code">

                                </div>
                                <div class="col-span-6">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="phone" value="{{ $user->phone }}" required autocomplete="phone">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flex justify-end px-8 py-4 bg-gray-50 rounded-b-lg">
                        <button class="relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                onclick="document.getElementById('payment-details').submit();">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-8 space-y-4 border">
                    <div class="">
                        <p class="font-medium text-lg">{{ __('Plan') }}</p>
                        <p class="text-sm text-gray-500">
                            @if($user->subscriptions->count())
                                You're currently subscribed to the
                                @foreach($user->subscriptions as $subscription)
                                    {{ $subscription->name }} Plan
                                @endforeach
                            @else
                                You're currently not subscribed to any plan
                            @endif
                        </p>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2">
                                @if($user->subscriptions->count())
                                    @if($user->subscriptions()->first()->ends_at)
                                        <p class="text-sm text-gray-500">Subscription ends at: {{ $user->subscriptions()->first()->ends_at->toFormattedDateString() }}</p>
                                    @else
                                    <p class="text-sm text-gray-500">Next billing date: {{ \Carbon\Carbon::createFromTimestamp($user->subscriptions()->first()->asStripeSubscription()->current_period_end)->toFormattedDateString() }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="space-y-4">
                            @foreach($plans as $plan)
                                <div class="border border-gray-200 rounded-lg flex justify-between p-4 @if( auth()->user()->subscribed($plan->name) ) bg-indigo-50 border-2 border-indigo-600 @endif" >
                                    <div class="flex flex-col w-1/3">
                                        <p class="font-medium">{{ $plan->name }}</p>
                                        <p class="text-sm text-gray-500">{{ substr($plan->description, 0, 32) }}</p>
                                    </div>
                                    <div class="flex items-center justify-center w-1/3">
                                        <p class="font-medium">${{ number_format($plan->price / 100, 2) }} / mo</p>
                                    </div>
                                    <div class="flex items-center justify-end w-1/3">
                                        @if(!auth()->user()->subscribed($plan->name))
                                            <form action="{{ route('subscription.swap') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="plan" value="{{ $plan->stripe_plan_id }}">
                                                <button type="submit" class="font-medium text-indigo-600">{{ __('Upgrade') }}</button>
                                            </form>
                                        @elseif($user->subscription($plan->name)->onGracePeriod())
                                            <form action="{{ route('subscription.resume') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="plan" value="{{ $plan->stripe_plan_id }}">
                                                <button type="submit" class="font-medium text-indigo-600">{{ __('Resume subscription') }}</button>
                                            </form>
                                        @elseif($user->subscribed($plan->name))
                                            <form action="{{ route('subscription.cancel') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="plan" value="{{ $plan->name }}">
                                                <button type="submit" class="font-medium text-indigo-600">{{ __('Cancel subscription') }}</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class=" bg-white rounded-lg shadow border">
                        <div class="p-8 space-y-4">
                            <p class="font-medium text-lg">{{ __('Billing history') }}</p>
                            {{ $invoices->links() }}
                        </div>
                        <div class="rounded-b-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Date') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Description') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Amount') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Status') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($invoices as $invoice)
                                        <tr class="text-sm">
                                            <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
{{--                                                {{ json_encode($invoice) }}--}}
                                                {{ \Carbon\Carbon::createFromTimestamp($invoice->created)->toFormattedDateString() }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                                {{ substr($invoice->description, 0, 32) . "..." }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                                $ {{ number_format($invoice->total / 100, 2) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                                <div class="capitalize">
                                                    {{ __($invoice->status) }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium rounded-br-lg space-x-4 flex">
                                                @if($invoice->status === "open")
                                                    <form action="{{ route('pay.invoice', ['invoice' => $invoice->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="font-medium text-indigo-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                                <a class="font-medium text-indigo-600" href="{{ route('download.invoice', ['name' => $user->name, 'invoice' => $invoice->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow border">
                        <div class="p-8 space-y-4">
                            <div class="">
                                <p class="font-medium text-lg">Stripe configuration</p>
                                <p class="text-gray-500 text-sm">{{ __('Setup your Stripe payment configuration to allow payments.') }}
                                <a href="" class="text-indigo-600">Click here</a> {{ __('for a guide on how you can setup your configuration.') }}</p>
                            </div>
                            <form action="" method="POST" id="payment-details">
                                @csrf
                                <div class="grid grid-cols-6 gap-4">
                                    <div class="col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Stripe public key') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="name" value="{{ $user->name }}" required autocomplete="name">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Stripe secret key') }}</label>
                                        <input id="name" type="password" class="form-control @error('name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="name" value="{{ $user->name }}" required autocomplete="name">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="flex justify-end px-8 py-4 bg-gray-50 rounded-b-lg">
                            <button class="relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    onclick="document.getElementById('payment-details').submit();">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
