@extends('layouts.dashboard')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow px-8 py-10">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-1 flex items-center justify-center">
                    <div class="rounded-full h-32 w-32 shadow overflow-hidden">
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>

                </div>
                <div class="col-span-5">
                    <div class="space-y-2">
                        <p class="font-bold text-2xl">{{ $user->name }}</p>
                        <div class="flex">
                            @foreach($user->getRoleNames() as $role)
                                <div class="bg-gray-50 text-gray-600 text-sm rounded-lg shadow px-2 py-1 border border-gray-200">
                                    {{ $role }}
                                </div>
                            @endforeach
                        </div>
                        <div class="flex">
                            @foreach(range(0,3) as $item)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endforeach
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                        </div>
                        @foreach($user->subscriptions as $subscription)
                            Subscribed to {{ $subscription->name }}
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
