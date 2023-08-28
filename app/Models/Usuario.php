<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable

{
    use Notifiable;

    protected $fillable = [
        'nombre', 'correo', 'clave',
    ];

    protected $hidden = [
        'clave', 'remember_token',
    ];

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
