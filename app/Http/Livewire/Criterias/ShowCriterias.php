<?php

namespace App\Http\Livewire\Criterias;

use App\Models\Level;
use Livewire\Component;

class ShowCriterias extends Component
{
    public function render()
    {
        $levels = Level::with('parameters')
        ->where('bia_process_id',1)
        ->get();
        return view('livewire.criterias.show-criterias', compact('levels'));
    }
}
