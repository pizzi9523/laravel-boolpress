@component('mail::message')
# Messaggio:

{{ $data['message'] }}

User: {{ $data['name'] }}

Email: {{ $data['email'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent