@component('mail::message')
# Join {{ config('app.name') }} on [System]

[Name](Email) has invited you to join the [System] workspace **{{ config('app.name') }}**. Join now to start collaborating!

@component('mail::button', ['url' => 'https://www.google.nl'])
Join Now
@endcomponent

This invite link will expire in 60 minutes.

If you did not request an invite for {{ config('app.name') }}, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
