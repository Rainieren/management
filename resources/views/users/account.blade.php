@extends('layouts.dashboard')

@section('content')
    <div class="grid grid-cols-8 gap-6 mb-6">
        <div class="col-span-8 md:col-span-2">
            @include('layouts.setting_navigation')
        </div>
        <div class="col-span-8 md:col-span-6 space-y-6">
            <div class="bg-white rounded-lg shadow border">
                <div class="space-y-6 p-4 md:p-8">
                    <div class="">
                        <p class="font-medium text-lg">{{ __('General information') }}</p>
                        <p class="text-gray-500 text-sm">{{ __('Update your account name. Profile picture etc.') }}</p>
                    </div>
                    <form action="{{ route('store.user.payment_details', ['name', $user->name]) }}" method="POST" id="payment-details">
                        <div class="grid grid-cols-6 gap-4">
                            <div class="col-span-6 sm:col-span-6 space-y-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="name" value="{{ $user->name }}" required autocomplete="name">
                            </div>
                            <div class="col-span-6 sm:col-span-6 space-y-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Profile picture') }}</label>
                                <div class="flex space-x-4">
                                    <img class="inline-block h-16 w-16 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                    <div class="flex items-start flex-col justify-center space-y-2">
                                        <a href="" type="button" class="flex py-2 shadow-sm px-4 border border-gray-300 bg-white rounded-md text-sm leading-5 font-medium text-gray-700 focus:outline-none focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                            Choose a file
                                        </a>
                                        <p class="text-sm text-gray-500">Only .jpg and .png files are allowed. Allowed size is 10MB</p>
                                    </div>

                                </div>


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
