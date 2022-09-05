<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCategories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $tipo = 0;
    public $tipos_busqueda = ['Todos', 'Activo', 'Inactivo'];

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTipo()
    {
        $this->resetPage();
    }

    public function render()
    {
        switch ($this->tipo)
        {
            case 0:
                $categorias = Category::where([
                    ['nombre','LIKE','%' . $this->search . '%'],
                ])->paginate(10);
            break;
            case 1:
                $categorias = Category::where([
                    ['nombre','LIKE','%' . $this->search . '%'],
                    ['estado',1],
                ])->paginate(10);
            break;
            case 2:
                $categorias = Category::where([
                    ['nombre','LIKE','%' . $this->search . '%'],
                    ['estado',0],
                ])->paginate(10);
            break;
        }
        
        return view('livewire.categories.show-categories', compact('categorias'));
    }
}
