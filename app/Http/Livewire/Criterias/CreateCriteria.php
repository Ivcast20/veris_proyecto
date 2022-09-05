<?php

namespace App\Http\Livewire\Criterias;

use App\Models\BiaProcess;
use App\Models\Criteria;
use App\Models\Level;
use App\Models\Parameter;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateCriteria extends Component
{
    public $bias_processes;
    public $levels;
    public $parameters;
    public $selectedBia = NULL;
    public $level_id;
    public $parameter_id;
    public $criterio = NULL;

    public function mount()
    {
        $this->bia_processes = BiaProcess::where('estado',1)->orderBy('id','desc')->get(['nombre','id']);
        $this->levels = collect();
        $this->parameters = collect();

    }

    public function render()
    {
        return view('livewire.criterias.create-criteria');
    }

    public function updatedSelectedBia($selectedBia)
    {
        if($selectedBia != "")
        {
            $this->levels = Level::where([
                ['bia_process_id',$this->selectedBia],
                ['estado',1]
            ])->pluck('nombre','id');
            $this->parameters = Parameter::where([
                ['bia_process_id',$this->selectedBia],
                ['estado',1]
            ])->pluck('nombre','id');
        }
        
    }

    protected function rules()
    {
        $parametro = $this->parameter_id;
        $nivel = $this->level_id;
        return [
            'selectedBia' => ['required','numeric'],
            'level_id' => ['required','numeric'],
            'parameter_id' => ['required','numeric', Rule::unique('criterias')->where(function ($query) use ($parametro,$nivel){
                return $query->where('parameter_id',$parametro)->where('level_id',$nivel);
            })],
            'criterio' => ['required','string','max:1000']
        ];
    }

    protected $messages = [
        'selectedBia.required' => 'Debe seleccionar el Bia',
        'level_id.required' => 'Seleccione un nivel',
        'parameter_id.required' => 'Seleccione un parámetro',
        'criterio.required' => 'Debe ingresar el criterio',
        'parameter_id.unique' => 'Ya existen un criterio registrado con ese nivel y parámetro'
    ];

    public function guardarCriterio()
    {
        $datosValidados = $this->validate();
        Criteria::create($datosValidados);
        return redirect()->route('admin.criterias.index')->with('message','Se ha guardado el criterio exitosamente');
    }
}
