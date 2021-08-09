@extends('layouts.dashboard')

@section('content')
        <div class="bg-white rounded-lg shadow">
            <div class="p-8 space-y-4">
                <div class="">
                    <p class="font-medium text-lg">{{ __('Invoice details') }}</p>
                </div>

                <form action="{{ route('store.invoice') }}" method="POST" id="store.invoice">
                    @csrf
{{--                    <input type="hidden" name="user_id" value="{{  }}">--}}
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="client" class="block text-sm font-medium text-gray-700">{{ __('Client') }}</label>
                            <select class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="client" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3 space-y-2">
                            <div class="">
                                <label for="recipient" class="block text-sm font-medium text-gray-700">{{ __('Recipient') }}</label>
                                <input id="recipient" type="email" class="@error('email') is-invalid @enderror mt-1 focus:ring-0 focus:border-opacity-0 bg-gray-100 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="recipient" value="info@example.com" readonly required autocomplete="recipient">
                            </div>
                        </div>
                        <div class="col-span-6 space-y-2">
                            <div class="flex items-start justify-start">
                                <div class="flex items-center h-5">
                                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">{{ __('Other recipient') }}</label>
                                    <p class="text-gray-500">{{ __('Change the email of the recipient.') }}</p>
                                </div>
                            </div>
                            <div class="flex items-start justify-start">
                                <div class="flex items-center h-5">
                                    <input id="comments" name="comments" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">{{ __('Notify recipient') }}</label>
                                    <p class="text-gray-500">{{ __('If checked; the recipient will receive a payment request email notification.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6">
                            <p class="font-medium text-lg">{{ __('Invoice items') }}</p>
                        </div>
                        <div class="divide-y-2 divide-gray-300 md:divide-none col-span-6 space-y-4">
                                <div class="col-span-6 grid grid-cols-6 gap-4 py-4 md:py-0">
                                    <div class="col-span-6 sm:col-span-4 md:col-span-3">
                                        <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="items[]" value="" required autocomplete="description">
                                    </div>
                                    <div class="col-span-6 sm:col-span-2 md:col-span-1">
                                        <label for="quantity" class="block text-sm font-medium text-gray-700">{{ __('Quantity') }}</label>
                                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="items[]" value="1" required autocomplete="quantity">
                                    </div>
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="price" class="block text-sm font-medium leading-5 text-gray-700">
                                            Unit price
                                        </label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </span>
                                            </div>
                                            <input id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md pl-10 pr-16 " type="text" name="items[]" placeholder="0.00" value="" required="required">
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                    USD
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-span-6">
                            <a href="" class="font-medium text-indigo-600 flex space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span>
                                    {{ __('Add item') }}
                                </span>
                            </a>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6">
                            <label for="memo" class="block text-sm font-medium text-gray-700">{{ __('Memo') }}</label>
                            <textarea name="memo" id="" cols="30" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2"></textarea>
                        </div>
                        <div class="col-span-6 md:col-span-1">
                            <label for="due_date" class="block text-sm font-medium text-gray-700">{{ __('Due date') }}</label>
                            <input id="due_date" type="date" class="form-control @error('quantity') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="due_date" value="" required autocomplete="quantity">
                        </div>
                    </div>

                </form>
            </div>
            <div class="flex justify-end px-8 py-4 bg-gray-50 rounded-b-lg">
                <button class="relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        onclick="document.getElementById('store.invoice').submit();">
                    {{ __('Create invoice') }}
                </button>
            </div>


        </div>
@endsection
