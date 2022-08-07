<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRoles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $tipo = 0;
    public $tipos_busqueda = ['Todos','Activo', 'Inactivo'];

    protected $listeners = ['delete', 'restore', 'render'];

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
                $roles = Role::withTrashed()->where('name', 'like', '%'.$this->search.'%')->paginate(10);
                break;
            case 1:
                $roles = Role::where('name', 'like', '%'.$this->search.'%')->where('deleted_at', null)->paginate(10);
                break;
            case 2:
                $roles = Role::onlyTrashed()->where('name', 'like', '%'.$this->search.'%')->whereNotNull('deleted_at')->paginate(10);
                break;
        }
        return view('livewire.show-roles', compact('roles'));
    }

    public function delete(Role $role)
    {
        $role->delete();
    }

    public function restore($rolId)
    {
        Role::onlyTrashed()->find($rolId)->restore();
    }
}
