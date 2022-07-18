<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class ShowRoles extends Component
{

    public function render()
    {
        $roles = Role::paginate(10);
        return view('livewire.show-roles', compact('roles'));
    }
}
