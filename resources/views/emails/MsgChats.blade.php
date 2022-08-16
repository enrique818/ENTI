@component('mail::message')
# Nuevo mensajes recibido.

## Hola, {{ $data['Recive'] }}
{{ $data['envia']}} te ha enviado un nuevo mensaje a tu chat.

@component('mail::button', ['url' => $data['url']])
{{-- @component('mail::button', ['url' => route('login.page')]) --}}
Ver Mensaje
@endcomponent

Gracias,<br>
del equipo {{ config('app.name') }}
@endcomponent