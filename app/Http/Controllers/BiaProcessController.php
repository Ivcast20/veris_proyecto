<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBiaProcessRequest;
use App\Http\Requests\UpdateBiaProcessRequest;
use App\Models\BiaProcess;
use Illuminate\Http\Request;

class BiaProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.biaprocesses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.biaprocesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBiaProcessRequest $request)
    {
        //$request->validate();
        if($request->validated())
        {
            BiaProcess::create([
                'nombre' => $request->nombre,
                'alcance' => $request->alcance,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'estado' => 1,
                'estado_bia_process_id' => 1,
            ]);
            return redirect()->route('admin.biaprocesses.index')->with('message', 'Proceso BIA creado correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BiaProcess  $biaProcess
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BiaProcess  $biaProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(BiaProcess $biaProcess)
    {
        return view('admin.biaprocesses.edit', compact('biaProcess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BiaProcess  $biaProcess
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiaProcessRequest $request, BiaProcess $biaProcess)
    {
        $biaProcess->update($request->validated());
        //return $request->validated();
        return redirect()->route('admin.biaprocesses.index')->with('message', 'Proceso BIA actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BiaProcess  $biaProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(BiaProcess $biaProcess)
    {
        //
    }
}
