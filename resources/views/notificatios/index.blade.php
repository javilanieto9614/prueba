@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notificaciones</h1>
        <ul>
            @forelse($notificaciones as $notificacion)
                <li>
                    {!! $notificacion->data['message'] !!}
                </li>
            @empty
                <li>No tienes notificaciones.</li>
            @endforelse
        </ul>
        <form action="{{ route('notificaciones.marcar-leidas') }}" method="POST">
            @csrf
            <button type="submit">Marcar como Leídas</button>
        </form>
    </div>
@endsection
