<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreateRol extends Component
{
    public $permisos = ['ver dashboard'];
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.create-rol', compact('permissions'));
    }
}
