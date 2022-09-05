<?php

namespace App\Http\Livewire\Criterias;

use App\Models\BiaProcess;
use App\Models\Level;
use Livewire\Component;

class ShowCriterias extends Component
{
    public $procesosBia;
    public $procesoBia;

    public function mount()
    {
        $this->procesosBia = BiaProcess::where('estado',1)->orderBy('id','desc')->get();
        $this->procesoBia = BiaProcess::where('estado',1)->orderBy('id','desc')->first()->id;
    }

    public function render()
    {
        $levels = Level::with('parameters')
        ->where('bia_process_id',$this->procesoBia)
        ->get();
        return view('livewire.criterias.show-criterias', compact('levels'));
    }
}
