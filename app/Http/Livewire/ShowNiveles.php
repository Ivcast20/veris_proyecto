<?php

namespace App\Http\Livewire;

use App\Models\Nivel;
use Livewire\Component;

class ShowNiveles extends Component
{
    public function render()
    {
        $niveles = Nivel::all();
        return view('livewire.show-niveles', compact('niveles'));
    }
}
