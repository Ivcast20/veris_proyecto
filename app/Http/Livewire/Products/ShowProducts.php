<?php

namespace App\Http\Livewire\Products;

use App\Models\BiaProcess;
use App\Models\ProductService;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public Collection $procesosBia;
    public $procesoBia;
    public $search;
    public $estado = 0;

    public $tipos_busqueda = ['Todos', 'Activo', 'Inactivo'];

    public function mount()
    {
        $this->procesosBia = BiaProcess::where('estado',1)->orderBy('id','desc')->get();
        $this->procesoBia = BiaProcess::where('estado',1)->orderBy('id','desc')->first()->id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingProcesoBia()
    {
        $this->resetPage();
    }

    protected $listeners = ['render'];

    public function render()
    {
        switch ($this->estado)
        {
            case 0:
                $productos = ProductService::with('category:id,nombre')->where('bia_process_id',$this->procesoBia)->paginate(5);
            break;
            case 1:
                $productos = ProductService::with('category:id,nombre')->
                where([
                    ['bia_process_id',$this->procesoBia],
                    ['estado',1]
                    ])->paginate(5);
            break;
            case 2:
                $productos = ProductService::with('category:id,nombre')->
                where([
                    ['bia_process_id',$this->procesoBia],
                    ['estado',0]
                    ])->paginate(5);
            break;
        }
        
        return view('livewire.products.show-products', compact('productos'));
    }
}
