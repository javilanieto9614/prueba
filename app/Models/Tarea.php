<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tarea extends Model

{
    protected $fillable = [
        'usuario_id', 'titulo', 'descripcion', 'fecha_vencimiento', 'completado',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
