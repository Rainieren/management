@extends('layouts.dashboard')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-2 bg-white rounded-lg shadow p-8 space-y-2">
                <div class="space-y-2 mb-4">
                    <p class="font-bold text-2xl">Subscription details</p>
                    <p class="">{{ $plan->name }} — $ {{ number_format($plan->price / 100, 2) }} per month</p>
                    <p class="text-sm uppercase tracking-wide font-medium">What's included?</p>
                    <p class="text-sm text-gray-500">{{ $plan->description }}</p>
                </div>
                <div class="divide-gray-200 divide-y">
                    <div class="py-4 pt-4 mt-4 space-y-2">
                        <p class="text-xl font-medium">Billing information</p>
                        <div>
                            @if(auth()->user()->street_name || auth()->user()->street_number || auth()->user()->postal_code || auth()->user()->city || auth()->user()->state || auth()->user()->country_id)
                                <p class="text-gray-500">{{ auth()->user()->name }}</p>
                                <p class="text-gray-500">{{ auth()->user()->street_name }} {{ auth()->user()->street_number }}</p>
                                <p class="text-gray-500">{{ auth()->user()->postal_code }} {{ auth()->user()->city }} {{ auth()->user()->state }}</p>
                                <p class="text-gray-500">{{ auth()->user()->country_id }}</p>
                                <p class="text-gray-500">{{ auth()->user()->phone }}</p>
                            @else
                                <p class="text-sm text-gray-500">There is no billing information available for this account. Please add the additional information to your
                                    <a href="" class="text-indigo-600">account</a> before you continue.</p>
                            @endif

                        </div>
                    </div>
                    <div class="py-4 pt-4 mt-4">
                        <p class="text-xl font-medium">Payment details</p>
                        <form action="{{ route('subscription.store', ['slug', $plan->slug]) }}" method="POST" class="space-y-4" id="payment-form">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="{{ $plan }}">
                            <div class="">
                                <label for="card-holder-name" class="block text-sm font-medium text-gray-700">{{ __('Card holder') }}</label>
                                <input id="card-holder-name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" placeholder="Card holder">
                            </div>
                            <div id="card-element" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2"></div>
                            <button id="card-button" data-secret="{{ $intent->client_secret }}" class="relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">Place order</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-span-1 space-y-4">
                <div class="bg-white rounded-lg shadow p-8 space-y-4 flex flex-col">
                    <p class="font-bold text-2xl">Order summary</p>
                    <div class="divide-gray-100 divide-y">
                        <div class="flex justify-between py-4">
                            <p class="">1x {{ $plan->name }}</p>
                            <p>$ {{ number_format($plan->price / 100, 2) }}</p>
                        </div>
                        <div class="flex justify-between py-4">
                            <p class="">Subtotal</p>
                            <p>$ {{ number_format($plan->price / 100, 2) }}</p>
                        </div>
                        <div class="flex justify-between py-4">
                            <p class="">Free trail period</p>
                            <p>7 Days</p>
                        </div>
                    </div>
                    <div class="flex justify-between font-medium text-2xl">
                        <p class="">Total</p>
                        <p>$ {{ number_format(($plan->price / 100) - ($plan->price / 100), 2) }} <span class="text-gray-500 text-base font-medium">/mo</span></p>
                    </div>
                    <div class="flex justify-end text-xs text-gray-500">
                        <p>Your trail will end on <span class="font-bold">{{ now()->addDay(7)->toFormattedDateString() }}</span>. After your trail period ends you will be charged ${{ number_format($plan->price / 100, 2) }} until you cancel.
                        You can cancel at any time within your <a href="" class="text-indigo-600">account settings.</a> No strings attached.</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-8 space-y-4 flex flex-col">
                    <p class="font-bold text-xl">Coupon</p>
                    <input type="text" placeholder="Enter your code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2">
                    <p class="text-red-600">You can't apply coupons on a free order</p>
                    <button id="card-button" class="relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">Apply coupon</button>

                </div>

            </div>

        </div>

    </div>
@endsection

@section('scripts')

@endsection
