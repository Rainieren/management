@component('mail::message')

@if($invited)
# Thank you for joining {{ config('app.name') }}!

You can now login with **{{ $user->email }}** and the password you created. Click the button below to login and start enjoying your account.

@component('mail::button', ['url' => route('login')])
    Log in
@endcomponent

With your {{ config('app.name') }} account you can:

1. Create issues for your project(s) to get picked up by one of our developers
2. Create tickets if you're ever stuck on something you don't know how to fix. These tickets will be cleared with the help of our support experts.
3. See the complete progress of your project(s) and see exactly what is going on with precise status updates.
4. Leave feedback on the execution of issues or get a little personal and leave a review for one of our developers.

If you have any question? Feel free to contact us at any time!

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
