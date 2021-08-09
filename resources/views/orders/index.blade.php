@extends('layouts.dashboard')

@section('content')
        <div class="flex items-end justify-center flex-col">
            <a href="{{ route('create.invoice') }}" class="relative justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create invoice</a>
        </div>
        <div class="bg-white rounded-lg shadow">
            <div class="p-8 space-y-4">
                <p class="font-medium text-lg">{{ __('All invoices') }}</p>


            </div>
            <div class="rounded-b-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Client
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                    </tbody>
                </table>
                Only list all INVOICES that were created. Not all registered users invoices.

                <ul class="space-x-6 space-y-4 p-8">
                    <li>Create a invoice with invoice items</li>
                    <li>Send a request to the client that the invoice is ready to be paid</li>
                    <li>Let the user choose the payment method to pay for the invoice.</li>
                    <li>Users pays the invoice and get a confirm screen with a download invoice button.</li>
                    <li>Users get an email saying the invoice has been paid succesfully</li>
                </ul>
            </div>
        </div>
@endsection
