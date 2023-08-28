@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Nueva Tarea</h1>
        <form action="{{ route('tareas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
                @error('titulo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required>
                @error('fecha_vencimiento')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </form>
    </div>
@endsection
