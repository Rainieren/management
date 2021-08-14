@component('mail::message')
# Hi {{ $user->name }},

An invoice from {{ env('APP_NAME') }} is ready for you in our system.
This invoice is due {{ \Carbon\Carbon::createFromTimestamp($invoice->due_date)->toFormattedDateString() }}

# Number: # {{ $invoice->number }}
# Total due: $ {{ number_format($invoice->total / 100, 2) }}

@component('mail::button', ['url' => '/'])
    Pay this invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
