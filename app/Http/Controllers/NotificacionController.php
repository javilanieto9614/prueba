<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function index()
    {
        $notificaciones = Auth::user()->notifications;

        return view('notificaciones.index', compact('notificaciones'));
    }

    public function marcarLeidas()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->route('notificaciones.index')->with('success', 'Todas las notificaciones han sido marcadas como leídas.');
    }
}
