@component('mail::message')

@if($invited)
# Thank you for joining {{ config('app.name') }}!

You can now login with **{{ $user->email }}** and the password you created. Click the button below to login and start enjoying your account.

@component('mail::button', ['url' => route('login')])
    Log in
@endcomponent

Regards,<br>
{{ config('app.name') }}
@else
# Did you change your password?

We noticed the password for your {{ config('app.name') }} account was recently changed. If this was you, you can safely disregard this email.

**When** {{ $user->updated_at }}

If you did not initiate this request, please contact us at (support@management.com)[support@management.com]

Regards,<br>
{{ config('app.name') }}
@endif
@endcomponent
