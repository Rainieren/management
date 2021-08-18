@extends('layouts.dashboard')

@section('content')
        <div class="flex items-end justify-center flex-col">
            <a href="{{ route('create.invoice') }}" class="relative justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create invoice</a>
        </div>
        <div class="bg-white rounded-lg shadow border">
            <div class="p-4 md:p-8 space-y-4">
                <p class="font-medium text-lg">{{ __('All invoices') }}</p>
                {{ $invoices->render() }}
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
                            Due date
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($invoices as $invoice)
                            <tr class="text-sm">
                                <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                                    {{ \Carbon\Carbon::createFromTimestamp($invoice->created)->toFormattedDateString() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                                    {{ $invoice->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                                    {{ $invoice->customer_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                                    $ {{ number_format($invoice->total / 100, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                                    <div class="capitalize">
                                        {{ __($invoice->status) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                                    @if($invoice->due_date)
                                        {{ \Carbon\Carbon::createFromTimestamp($invoice->due_date)->toFormattedDateString() }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium rounded-br-lg space-x-4 flex">
                                    @if($invoice->status === "open")
                                        <a class="font-medium text-indigo-600" href="{{ route('download.invoice', ['name' => $invoice->customer_name, 'invoice' => $invoice->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                        </a>
                                    @endif
                                    <a class="font-medium text-indigo-600" href="{{ route('download.invoice', ['name' => $invoice->customer_name, 'invoice' => $invoice->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                    </a>
                                    <a class="font-medium text-indigo-600" href="{{ route('show.invoice', ['number' => Illuminate\Support\Facades\Crypt::encryptString($invoice->id)]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
