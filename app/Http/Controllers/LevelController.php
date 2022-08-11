<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Retorna la vista admin.levels.index donde se cargar un livewire component
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.levels.index');
    }

    /**
     * Muestra el formulario para crear un nuevo nivel
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Guarda el nuevo nivel en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLevelRequest $request)
    {
        Level::create($request->validated());
        return redirect()->route('admin.levels.index')->with('message', 'Nivel creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update($request->validated());
        return redirect()->route('admin.levels.index')->with('message', 'Nivel actualizado correctamente');
    }
}
