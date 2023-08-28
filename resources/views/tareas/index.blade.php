@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tareas Pendientes</h1>
        <ul>
            @foreach($tareasPendientes as $tarea)
                <li>
                    {{ $tarea->titulo }} - {{ $tarea->descripcion }} ({{ $tarea->fecha_vencimiento }})
                    @if(!$tarea->completado)
                        <form action="{{ route('tareas.completar', $tarea->id) }}" method="POST">
                            @csrf
                            <button type="submit">Marcar como Completada</button>
                        </form>
                    @else
                        (Completada)
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    @foreach ($tareas as $tarea)
    <div class="tarea">
        <!-- Mostrar detalles de la tarea -->
    </div>
@endforeach

{{ $tareas->links() }}

@endsection
