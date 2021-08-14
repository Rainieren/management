@extends('layouts.dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow border">
        <div class="p-8">
            <p class="font-medium text-lg">{{ __('Invoice') . ' ' . $invoice->number }}</p>
            <p class="text-gray-500">{{ $invoice->description }}</p>
        </div>
        <div class="px-8">
            <div class="grid grid-cols-2">
                <div class="space-y-4">
                    <div class="">
                        <p class="">Invoice to: </p>
                        <p class="text-gray-500">{{ $invoice->customer_name }}</p>
                        <p class="text-gray-500">{{ $invoice->customer_email }}</p>
                    </div>
                    <div class="">
                        <p class="">Invoice date: </p>
                        <p class="text-gray-500">{{ \Carbon\Carbon::createFromTimestamp($invoice->created)->toFormattedDateString() }}</p>
                    </div>
                    @if($invoice->due_date)
                        <div class="">
                            <p class="">Due date: </p>
                            <p class="text-gray-500">{{ \Carbon\Carbon::createFromTimestamp($invoice->due_date)->toFormattedDateString() }}</p>
                        </div>
                    @endif
                    <div class="">
                        <p class="">Status: </p>
                        <p class="text-gray-500 capitalize">{{ $invoice->status }}</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="">
                        <p class="">Invoice from: </p>
                    </div>
                    <div class="">
                        <p class="">Payment method: </p>
                        <p class="text-gray-500">{{ $invoice->default_payment_method }}</p>
                    </div>
                    <div class="">
                        <p class="">Total amount: $ {{ number_format($invoice->total / 100, 2) }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="">Actions:</p>
                        <ul class="flex space-x-4">
                            <li><a href="{{ route('download.invoice', ['name' => $invoice->customer_name, 'invoice' => $invoice->id]) }}" class="text-indigo-600 font-medium">Download</a></li>
                            <li><a href="" class="text-indigo-600 font-medium">Mark as paid</a></li>
                            <li><a href="" class="text-indigo-600 font-medium">Send reminder</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-8 space-y-2">
            <p class="font-medium text-lg">{{ __('Invoice items') }}</p>
            <div class="space-y-2">
                @foreach($invoice->lines as $item)
                    <div class="border border-gray-300 rounded-lg p-2 flex items-center justify-between">
                        <p class="font-medium">{{ $item->description  }}</p>
                        <p>{{ $item->quantity  }}</p>
                        <p>$ {{ number_format($item->amount / 100, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
