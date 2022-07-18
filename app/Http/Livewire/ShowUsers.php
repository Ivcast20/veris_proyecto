<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use App\Exports\UsersExport;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public Collection $usuarios;
    public $search;
    public $tipo = 0;
    public $tipos_busqueda = ['activo', 'inactivo'];

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
        if($this->tipo == 0) {
            $users = User::where('name','LIKE','%' . $this->search . '%')->paginate(10);
        } else {
            $users = User::onlyTrashed()->where('name','LIKE','%' . $this->search . '%')->paginate(10);
        }

        //$users = User::where('name','LIKE','%' . $this->search . '%')->paginate(10);
        return view('livewire.show-users',compact('users')); //
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function export($extension)
    {
        abort_if(!in_array($extension, ['xlsx', 'pdf']), Response::HTTP_NOT_FOUND);
        if($extension == 'pdf')
        {
            return Excel::download(new UsersExport($this->tipo), 'users.' . $extension, \Maatwebsite\Excel\Excel::DOMPDF);
        }else
        {
            return Excel::download(new UsersExport($this->tipo, $extension), 'users.' . $extension);
        }
    }
}
