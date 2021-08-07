@extends('layouts.dashboard')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center flex-col items-center mb-10 space-y-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="font-bold text-4xl">Thank you for your purchase!</p>
            <p class="text-gray-500">Welcome to {{ env('APP_NAME') }} We've sent a confirmation email to <span class="font-bold">{{ auth()->user()->email }}</span></p>
        </div>
        <div class="grid grid-cols-6 gap-6">
            <div class="col-start-2 col-span-4 bg-white rounded-lg shadow p-8 space-y-4">
                <div class="space-y-2 mb-4">
                    <p class="font-bold text-2xl">Subscription details</p>
                    <p class="">You purschased the {{ $plan->name }} Plan</p>
                    <p class="">After your trail you will be charged <span class="font-bold">$ {{ number_format($plan->price / 100, 2) }}</span> </p>
                    <p class="text-sm text-gray-500">{{ $plan->description }}</p>
                </div>
                <div class="space-y-6">
                    <div class="border border-gray-200 p-4 rounded-lg grid grid-cols-2 gap-6">
                        <div class="col-span-1 space-y-2">
                            <p class="font-medium">Billing information</p>
                            <p class="text-gray-500">{{ auth()->user()->name }}</p>
                            <p class="text-gray-500">{{ auth()->user()->street_name }} {{ auth()->user()->street_number }}</p>
                            <p class="text-gray-500">{{ auth()->user()->postal_code }} {{ auth()->user()->city }} {{ auth()->user()->state }}</p>
                            <p class="text-gray-500">{{ auth()->user()->country_id }}</p>
                            <p class="text-gray-500">{{ auth()->user()->phone }}</p>
                        </div>
                        <div class="col-span-1 space-y-2">
                            <p class="font-medium">Order information</p>
                            <p class="font-medium">Order date: <span class="font-normal text-gray-500">{{ now()->toFormattedDateString() }}</span></p>
                        </div>
                    </div>
                    <div class="border border-gray-200 p-4 rounded-lg">
                        <p class="font-medium">Payment method</p>
                        <p class="text-gray-500"><span class="capitalize">{{ auth()->user()->pm_type }}</span> ending in {{ auth()->user()->pm_last_four }}</p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-2">
                        <div class="flex justify-between text-gray-500">
                            <p class="">Subtotal</p>
                            <p>{{ number_format($plan->price / 100, 2) }}</p>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <p class="">Coupon</p>
                            <p>- €0,00</p>
                        </div>
                        <div class="flex justify-between text-xl font-medium">
                            <p class="">Total</p>
                            <p>$ {{ number_format($plan->price / 100, 2) }} <span class="text-gray-500 text-base font-medium">/mo after </span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        confetti({
            spread: 180,
            particleCount: 150
        });
    </script>
@endsection


