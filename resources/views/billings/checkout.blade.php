@extends('layouts.dashboard')

@section('content')
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-2 bg-white rounded-lg shadow p-8 space-y-2">
                <div class="space-y-2 mb-4">
                    <p class="font-bold text-2xl">{{ __('Order details') }}</p>
                    <p class="">{{ $plan->name }} — $ {{ number_format($plan->price / 100, 2) }} per month</p>
                    <p class="text-sm uppercase tracking-wide font-medium">What's included?</p>
                    <p class="text-sm text-gray-500">{{ $plan->description }}</p>
                </div>
                <div class="divide-gray-200 divide-y">
                    <div class="py-4 pt-4 mt-4 space-y-2">
                        <p class="text-xl font-medium">{{ __('Billing information') }}</p>
                        <div>
                            @if(auth()->user()->street_name || auth()->user()->street_number || auth()->user()->postal_code || auth()->user()->city || auth()->user()->state || auth()->user()->country_id)
                                <p class="text-gray-500">{{ auth()->user()->name }}</p>
                                <p class="text-gray-500">{{ auth()->user()->street_name }} {{ auth()->user()->street_number }}</p>
                                <p class="text-gray-500">{{ auth()->user()->postal_code }} {{ auth()->user()->city }} {{ auth()->user()->state }}</p>
                                <p class="text-gray-500">{{ auth()->user()->country_id }}</p>
                                <p class="text-gray-500">{{ auth()->user()->phone }}</p>
                            @else
                                <p class="text-sm text-gray-500">There is no billing information available for this account. Please add the additional information to your
                                <a href="{{ route('show.user.billing', ['name' => auth()->user()->name]) }}" class="text-indigo-600">account</a> before you continue.</p>
                            @endif
                        </div>
                    </div>
                    <div class="py-4 pt-4 mt-4">
                        <p class="text-xl font-medium">{{ __('Payment details') }}</p>
                        <form action="{{ route('subscription.store') }}" method="post" id="payment-form" class="space-y-4" data-secret="{{ $intent->client_secret }}">
                            @csrf
                            <input type="hidden" name="plan" id="{{ $plan->name }}" value="{{ $plan->stripe_plan_id  }}">

                            <div class="">
                                <label for="card-holder-name" class="block text-sm font-medium text-gray-700">{{ __('Card holder name') }}</label>
                                <input id="card-holder-name" type="text" name="card-holder-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2">
                                @error('card-holder-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="">
                                <label for="card-element" class="block text-sm font-medium text-gray-700">{{ __('Card number') }}</label>
                                <div id="card-element" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2"></div>
                            </div>

                            <div id="card-errors" role="alert"></div>

                            <button class="relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Subscribe to ') }} {{ $plan->name }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-span-1 space-y-4">
                <div class="bg-white rounded-lg shadow p-8 space-y-4 flex flex-col">
                    <p class="font-bold text-2xl">{{ __('Order summary') }}</p>
                    <div class="divide-gray-100 divide-y">
                        <div class="flex justify-between py-4">
                            <p class="">1x {{ $plan->name }}</p>
                            <p>$ {{ number_format($plan->price / 100, 2) }}</p>
                        </div>
                        <div class="flex justify-between py-4">
                            <p class="">{{ __('Subtotal') }}</p>
                            <p>$ {{ number_format($plan->price / 100, 2) }}</p>
                        </div>
                        <div class="flex justify-between py-4">
                            <p class="">{{ __('Free trail period') }}</p>
                            <p>{{ __('7 Days') }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between font-medium text-2xl">
                        <p class="">{{ __('Total') }}</p>
                        <p>$ {{ number_format(($plan->price / 100) - ($plan->price / 100), 2) }} <span class="text-gray-500 text-base font-medium">/mo</span></p>
                    </div>
                    <div class="flex justify-end text-xs text-gray-500">
                        <p>Your trail will end on <span class="font-bold">{{ now()->addDay(7)->toFormattedDateString() }}</span>. After your trail period ends you will be charged ${{ number_format($plan->price / 100, 2) }} until you cancel.
                        You can cancel at any time within your <a href="" class="text-indigo-600">account settings.</a> No strings attached.</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-8 space-y-4 flex flex-col">
                    <p class="font-bold text-xl">{{ __('Coupon') }}</p>
                    <input type="text" placeholder="Enter your code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2">
                    <p class="text-red-600">You can't apply coupons on a free order</p>
                    <button id="card-button" class="relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">Apply coupon</button>

                </div>

            </div>
        </div>
@endsection

@section('scripts')
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var card = elements.create('card');

        card.mount('#card-element');

        card.on('change', function(event) {
           var displayError = document.getElementById('card-errors');
           if(event.error) {
               displayError.textContent = event.error.message;
           } else {
               displayError.textContent = '';
           }
        });

        var form = document.getElementById('payment-form');
        var cardHolderName = document.getElementById('card-holder-name');
        var clientSecret = form.dataset.secret;
        const cardButton = document.getElementById('card-button');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {
                // Display "error.message" to the user...
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                // The card has been verified successfully...
                // console.log(setupIntent)
                stripeTokenHandler(setupIntent);
            }
        });

        function stripeTokenHandler(setupIntent) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethod');
            hiddenInput.setAttribute('value', setupIntent.payment_method);
            form.appendChild(hiddenInput);

            form.submit();
        }
    </script>
@endsection
