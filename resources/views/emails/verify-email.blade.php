@component('mail::message')

Selamat datang di omahsaras.com!

@component('mail::button', ['url' => $url])
Verify Email
@endcomponent


Regards,<br>
{{ config('app.name') }}

@endcomponent
