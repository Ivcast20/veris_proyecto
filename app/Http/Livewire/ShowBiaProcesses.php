<?php

namespace App\Http\Livewire;

use App\Models\BiaProcess;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBiaProcesses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = ['render'];

    public function render()
    {
        $biaProcesses = BiaProcess::where('nombre','LIKE', '%' . $this->search . '%')->orderBy('id','desc')->paginate(5);
        return view('livewire.show-bia-processes', compact('biaProcesses'));
    }
}
