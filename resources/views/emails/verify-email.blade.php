@component('mail::message')

Selamat datang di kontrakan.com!

@component('mail::button', ['url' => $url])
Verify Email
@endcomponent


Regards,<br>
{{ config('app.name') }}

@endcomponent
