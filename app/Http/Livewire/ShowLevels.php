<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;

class ShowLevels extends Component
{
    public function render()
    {
        $levels = Level::all();
        return view('livewire.show-levels', compact('levels'));
    }
}
