<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $listeners = ['delete','render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name','LIKE','%' . $this->search . '%')->paginate(10);
        return view('livewire.show-users', compact('users'));
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
