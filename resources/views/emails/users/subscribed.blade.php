@component('mail::message')
# Hi {{ auth()->user()->name }}

Thank you for choosing {{ config('app.name') }}. You have subscribed to:

> {{ $plan->name }} plan for $ {{ number_format($plan->price / 100, 2) }} per month

With your {{ config('app.name') }} {{ $plan->name }} subscription you can:

1. Create issues for your project(s) to get picked up by one of our developers
2. Create tickets if you're ever stuck on something you don't know how to fix. These tickets will be cleared with the help of our support experts.
3. See the complete progress of your project(s) and see exactly what is going on with precise status updates.
4. Leave feedback on the execution of issues or get a little personal and leave a review for one of our developers.

If you have any question? Feel free to contact us at any time!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
