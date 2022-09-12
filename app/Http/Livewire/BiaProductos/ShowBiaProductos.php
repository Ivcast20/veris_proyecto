<?php

namespace App\Http\Livewire\BiaProductos;

use App\Models\BiaProcess;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBiaProductos extends Component
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
        return view('livewire.bia-productos.show-bia-productos', compact('biaProcesses'));
    }
}
