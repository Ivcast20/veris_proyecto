<?php

namespace App\Http\Livewire;

use App\Models\BiaProcess;
use Livewire\Component;

class ShowBiaProcesses extends Component
{
    public function render()
    {
        $biaProcesses = BiaProcess::orderBy('id','desc')->paginate(5);
        return view('livewire.show-bia-processes', compact('biaProcesses'));
    }
}
