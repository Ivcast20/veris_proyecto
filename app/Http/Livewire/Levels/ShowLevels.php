<?php

namespace App\Http\Livewire\Levels;

use App\Models\BiaProcess;
use Livewire\Component;

class ShowLevels extends Component
{
    public $procesoBia;
    public function render()
    {
        $procesosBia = BiaProcess::where('estado',1)->orderBy('id','desc')->get();
        $procesoBia = $procesosBia->first();
        return view('livewire.levels.show-levels', compact('procesosBia'));
    }
}
