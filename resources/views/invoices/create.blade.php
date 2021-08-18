@extends('layouts.dashboard')

@section('content')
        <div class="bg-white rounded-lg shadow">
            <div class="p-4 md:p-8 space-y-4">
                <div class="">
                    <p class="font-medium text-lg">{{ __('Invoice details') }}</p>
                </div>
                <create-invoice-component :clients="{{ $users }}"></create-invoice-component>
            </div>
            <div class="flex justify-end px-4 md:px-8 py-4 bg-gray-50 rounded-b-lg space-x-4">
                <a href="" type="button" class="py-2 shadow-sm px-4 border border-gray-300 bg-white rounded-md text-sm leading-5 font-medium text-gray-700 focus:outline-none focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    Cancel
                </a>
                <button class="relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        onclick="document.getElementById('store-invoice').submit();">
                    {{ __('Create invoice') }}
                </button>
            </div>
        </div>
@endsection
