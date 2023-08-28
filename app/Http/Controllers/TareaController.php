<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Http\Controllers\Notifications\NuevaTareaCreada;
use App\Http\Controllers\Notifications\TareaCompletada;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario_id = auth()->user()->id;
        $tareasPendientes = Tarea::where('usuario_id', $usuario_id)
            ->where('completado', false)
            ->orderBy('fecha_vencimiento')
            ->get();
            $tareas = $usuario->tareas()->orderBy('fecha_vencimiento')->paginate(10);
        return view('tareas.index', compact('tareasPendientes'));
    }


    public function completar(Tarea $tarea)
{
    $tarea->completado = true;
    $tarea->save();

    $usuario = auth()->user();
    $usuario->notify(new TareaCompletada());

    return redirect()->route('tareas.index')->with('success', 'Tarea marcada como completada.');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'nullable',
            'fecha_vencimiento' => 'required|date',
        ]);

        $usuario = auth()->user();

        // Crea la tarea con los datos validados
        $tarea = new Tarea([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_vencimiento' => $request->input('fecha_vencimiento'),
        ]);

        $usuario->tareas()->save($tarea);

        return redirect()->route('tareas.index')->with('success', 'Tarea agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
