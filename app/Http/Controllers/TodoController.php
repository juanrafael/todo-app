<?php

namespace App\Http\Controllers;

use App\Tarea;
use App\Http\Requests\TareaCreatedRequest;
use App\Http\Requests\TareaCompletedRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('todos', compact('tareas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TareaCreatedRequest $request)
    {
        Tarea::create([
            'task' => $request->tarea,
            'status' => false,
        ]);

        return back()->with('tarea_creada', 'Se creo una nueva tarea');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TareaCompletedRequest $request, Tarea $tarea)
    {
        $tarea->status = !$tarea->status;
        $tarea->save();
        return back()->with('tarea_completada', $tarea->status ? 'Se completo la tarea' : 'Se desmarco la tarea');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return back()->with('tarea_eliminada', 'Se elimino la tarea');
    }
}
