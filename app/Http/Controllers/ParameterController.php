<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParameterRequest;
use App\Http\Requests\UpdateParameterRequest;
use App\Models\BiaProcess;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.parameters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procesos_bia = BiaProcess::where('estado',1)->orderBy('id','desc')->get();
        return view('admin.parameters.create', compact('procesos_bia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParameterRequest $request)
    {
        Parameter::create($request->validated());
        return redirect()->route('admin.parameters.index')->with(['message' => 'Parámetro agregado exitosamente']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        // $procesos_bia = BiaProcess::where('estado',1)->latest()->get();
        $bia_process = BiaProcess::find($parameter->bia_process_id);
        // return view('admin.parameters.edit', compact('parameter','procesos_bia'));
        return view('admin.parameters.edit', compact('parameter','bia_process'));
    }

    
    public function update(UpdateParameterRequest $request, Parameter $parameter)
    {
        $parameter->update($request->validated());
        return redirect()->route('admin.parameters.index')->with('message','Parámetro actualizado exitosamente');

    }

}
