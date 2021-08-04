@component('mail::message')
# Join {{ auth()->user()->name }}  on {{ config('app.name') }}

**{{ auth()->user()->name }} ({{ auth()->user()->email }})** has invited you to join the [System] workspace on **{{ config('app.name') }}**. Join now to start collaborating!

@component('mail::button', ['url' => config('app.url').route('password.reset', ['token' => $token, 'email' => $user->email], false)])
Join Now
@endcomponent

This invite link will expire in 60 minutes.

If you did not request an invite for {{ config('app.name') }}, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
