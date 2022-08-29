<?php

namespace App\Http\Livewire\Parameters;

use App\Models\BiaProcess;
use App\Models\Parameter;
use Livewire\Component;

class CreateParameter extends Component
{
    public $nombre;
    public $estado;
    public $bia_process_id;

    protected $rules = [
        'nombre' => 'required|string|max:255|unique:parameters',
        'estado' => 'required|boolean',
        'bia_process_id' => 'required|numeric'
    ];

    protected $messages = [
        'bia_process_id.required' => 'Debe seleccionar el BIA correspondiente'
    ];


    public function guardar()
    {
        $datosValidados = $this->validate();

        Parameter::create($datosValidados);

        return redirect()->route('admin.parameters.index')->with(['message' => 'Se ha guardado con éxito el parámetro']);
    }

    public function render()
    {
        $procesos_bia = BiaProcess::where('estado',1)->orderBy('id','desc')->get();
        return view('livewire.parameters.create-parameter', compact('procesos_bia'));
    }
}
