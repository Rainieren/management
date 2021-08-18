@component('mail::message')
# Hi {{ $user->name }},

{{ $content }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
