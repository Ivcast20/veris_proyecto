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

    public function updatingProcesoBia()
    {
        $this->resetPage();
    }

    protected $listeners = ['render'];

    public function mount()
    {
        $this->procesoBia = BiaProcess::where('estado',1)->orderBy('id','desc')->first()->id;
    }
    public function render()
    {
        $procesosBia = BiaProcess::where('estado',1)->orderBy('id','desc')->get();
        $levels = Level::where(
            [
                ['bia_process_id',$this->procesoBia]
            ])->paginate(5);
        return view('livewire.levels.show-levels', compact('procesosBia','levels'));
    }
}
