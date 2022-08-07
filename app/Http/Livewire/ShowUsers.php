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

    //public Collection $usuarios;
    public $search;
    public $tipo = 0;
    public $tipos_busqueda = ['Todos', 'Activo', 'Inactivo'];

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
        switch ($this->tipo) {
            case 0:
                $users = User::withTrashed()
                        ->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('lastname', 'like', '%' . $this->search . '%')
                        ->paginate(10);
                break;
            case 1:
                $users = User::where('name','LIKE','%' . $this->search . '%')->
                        orWhere('lastname', 'LIKE', '%' . $this->search . '%')->paginate(10);
                break;
            case 2:
                $users = User::onlyTrashed()
                        ->where([
                            ['name','LIKE', '%' . $this->search . '%', 'or'],
                            ['lastname', 'LIKE', '%' . $this->search . '%']])
                        ->paginate(10);
                break;
        }

        //$users = User::where('name','LIKE','%' . $this->search . '%')->paginate(10);
        return view('livewire.show-users',compact('users')); //
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
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
