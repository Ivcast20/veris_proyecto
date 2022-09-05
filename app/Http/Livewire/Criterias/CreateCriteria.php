<?php

namespace App\Http\Livewire\Criterias;

use App\Models\BiaProcess;
use App\Models\Level;
use App\Models\Parameter;
use Illuminate\Support\Collection;
use Livewire\Component;

class CreateCriteria extends Component
{
    public $bias_processes;
    public $levels;
    public $parameters;
    public $selectedBia = NULL;

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
}
