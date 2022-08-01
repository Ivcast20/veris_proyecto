<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowRoles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $tipo = 0;
    public $tipos_busqueda = ['Activo', 'Inactivo'];

    protected $listeners = ['delete','render'];

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
        if($this->tipo == 0){
            $roles = Role::where('name','LIKE','%' . $this->search . '%')->paginate(10);
        }else{
            $roles = Role::onlyTrashed()->where('name','LIKE','%' . $this->search . '%')->paginate(10);
        }
        return view('livewire.show-roles', compact('roles'));
    }

    public function delete(Role $role)
    {
        $role->delete();
    }
}
