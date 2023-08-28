@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Perfil de Usuario</h1>
        <p>Nombre: {{ $usuario->nombre }}</p>
        <p>Correo: {{ $usuario->correo }}</p>
    </div>
@endsection
