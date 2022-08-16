@component('mail::message')
# Solicitud de conexión recibida

## Hola {{$conexion->receiverUser->nombre}}

{{$conexion->senderUser->nombre}} te ha enviado una solicitud de conexión, puedes aceptarla en las notificaciones dentro de nuestra plataforma

@component('mail::button', ['url' => route('login.page')])
Iniciar sesión
@endcomponent
 
Gracias,<br>
del equipo {{ config('app.name') }}
@endcomponent