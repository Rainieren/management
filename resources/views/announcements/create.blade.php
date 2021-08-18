@extends('layouts.dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow">
        <div class="p-8 space-y-4">
            <div class="">
                <p class="font-medium text-lg">{{ __('Announcement details') }}</p>
            </div>

            <form id="store-announcement" class="space-y-4" action="{{ route('store.announcement') }}" method="POST">
                @csrf
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                        <input id="title" type="text" class="mt-1 focus:ring-0 bg-white block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="title" placeholder="Something interesting">
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6 sm:col-span-3 space-y-4">
                        <label for="title" class="block font-medium text-gray-700">{{ __('Options') }}</label>
                        <div class="flex items-start justify-start">
                            <div class="flex items-center h-5">
                                <input id="notify_subscribers" name="notify_subscribers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="notify_subscribers" class="font-medium text-gray-700">Only notify active subscribers</label>
                                <p class="text-gray-500">Only notify clients with an active subscription.</p>
                            </div>
                        </div>
                        <div class="flex items-start justify-start">
                            <div class="flex items-center h-5">
                                <input id="notify_email" name="notify_email" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="notify_email" class="font-medium text-gray-700">Notify by email</label>
                                <p class="text-gray-500">When checked, an email will be send to all users that are signed up to your system. If left unchecked, users will only be notified within the system via notifications.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6">
                        <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Announcement content') }}</label>
                        <textarea name="content" id="" cols="30" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex justify-end px-8 py-4 bg-gray-50 rounded-b-lg space-x-4">
            <a href="" type="button" class="py-2 shadow-sm px-4 border border-gray-300 bg-white rounded-md text-sm leading-5 font-medium text-gray-700 focus:outline-none focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                Cancel
            </a>
            <button class="relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    onclick="document.getElementById('store-announcement').submit();">
                {{ __('Send announcement') }}
            </button>
        </div>
    </div>
@endsection
