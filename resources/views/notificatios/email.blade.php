@component('mail::message')
# Nueva Tarea Creada

Se ha creado una nueva tarea en tu lista de tareas pendientes.

**Título:** {{ $tarea->titulo }}
**Descripción:** {{ $tarea->descripcion }}
**Fecha de Vencimiento:** {{ $tarea->fecha_vencimiento->format('d/m/Y') }}

@component('mail::button', ['url' => route('tareas.index')])
Ver Tareas
@endcomponent

Gracias por usar nuestra aplicación,<br>
{{ config('app.name') }}
@endcomponent
<!-- Agrega un enlace para mostrar las notificaciones -->
<a class="nav-link" href="{{ route('notificaciones.index') }}">
    <i class="fa fa-bell"></i>
    @if(auth()->user()->unreadNotifications->count() > 0)
        <span class="badge badge-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
    @endif
</a>
