@extends('layouts.dashboard')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('create.user') }}" class="hidden relative justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create user</a>
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
                <h1 class="font-bold text-4xl">Choose a plan to get started</h1>
            </div>
            @foreach($plans as $plan)
            <div class="col-span-1 bg-white shadow rounded-lg flex flex-col border">
                <div class="p-8 space-y-4 flex-grow">
                    <p class="text-bold text-2xl font-medium">{{ $plan->name }}</p>
                    <p class="font-bold text-3xl">${{ number_format($plan->price / 100, 2) }} <span class="font-medium text-lg text-gray-600">/ mo</span></p>
                    <p class="text-gray-400">{{ $plan->description }}</p>
                </div>
                <div class="p-8 bg-white border-t border-gray-100 space-y-4">
                    <p class="text-sm uppercase tracking-wide font-medium">What's included?</p>
                    <ul class="space-y-2">
                        <li class="flex text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>10 user accounts</li>
                        <li class="flex text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            20 Projects</li>
                        <li class="flex text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>10GB storage</li>
                        <li class="flex text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>Unlimited Clients</li>
                        <li class="flex text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>Two Factor authentication</li>
                        <li class="flex text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>Full data export</li>
                        <li class="flex text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>Personal support</li>
                    </ul>
                </div>
                <div class="p-8 bg-white rounded-b-lg">
                    <a href="{{ route('subscription.checkout', ['slug' => $plan->slug]) }}" class="relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Start free trail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>



@endsection
