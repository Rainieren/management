@extends('layouts.dashboard')

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 text-center">
            <h1 class="font-bold text-2xl md:text-4xl">Say goodbye to clients going <span class="text-indigo-600">back and forth.</span></h1>
            <p>Our systems allows full project control and limited revisions for clients after the completion of your project. Users can create issues & tickets and receive frequent status updates making sure the user is always up-to-date!</p>
        </div>
        <div class="col-span-12 space-y-6">
            <h1 class="font-bold text-2xl md:text-4xl text-center">Limited revisions <span class="text-indigo-600">Unlimited happiness</span></h1>
            <p>You know that clients that want to change things all the time gets a bit too much sometimes. Our system Ensures a smooth course of the development process.</p>
            <div class="col-span-12 grid grid-cols-2">
                <div class="col-span-1">
                    <p class="font-medium">Limited control</p>
                    Create subscriptions to limit the users revisions to the amount you choose. After the development process ends. Your clients can purshare a Support suscription to keep their project up to date.
                </div>
                <div class="col-span-1">
                    <p class="font-medium">Communication is key</p>
                    Frequent status updates make sure the user is always up-to-date on their issues of projects. Allowing them to have full control over their progress while still being able to communicate clearly.
                    You can also make an announcement to all your clients to get a big message across.
                </div>
                <div class="col-span-1">
                    <p class="font-medium">Clear agreements</p>
                    Send invoices to customers about issues of tickets which are not supported by their subscription. Let clients approve or deny these estimates to have clear agreements about pricing. No questions asked.
                </div>
                <div class="col-span-1">
                    <p class="font-medium">All the choices</p>
                    Keep your Management and hosting in one place with
                </div>
            </div>
        </div>
        <div class="col-span-6">
            <ul>
                <li>Initial meeting: Meeting the agency about the project.</li>
                <li>Invitation: Get invited to the system to take control</li>
                <li>Sit back and let your agency do the rest: Watch how your project gets completed</li>
                <li>Long live support: Enter the support trail and let the user keep up-to-date of their project</li>
                <li>Profit! Happy agency, happy customer!</li>
            </ul>
        </div>

    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-3">
            <h1 class="font-bold text-2xl md:text-4xl">Choose a plan to get started</h1>
        </div>
        @foreach($plans as $plan)

        <div class="col-span-3 md:col-span-1 bg-white shadow rounded-lg flex flex-col border">
            <div class="p-8 space-y-4 flex-grow">
                @if( auth()->user()->subscribed($plan->name) )
                    You're subscribed to this plan
                @endif
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
@endsection


