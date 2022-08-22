<?php

namespace App\Http\Livewire\Levels;

use App\Models\BiaProcess;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLevels extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $procesoBia;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->procesoBia = BiaProcess::where('estado',1)->orderBy('id','desc')->first()->id;
    }
    public function render()
    {
        $procesosBia = BiaProcess::where('estado',1)->orderBy('id','desc')->get();
        $levels = Level::where('nombre','LIKE','%' . $this->search . '%')->paginate(5);
        return view('livewire.levels.show-levels', compact('procesosBia','levels'));
    }
}
