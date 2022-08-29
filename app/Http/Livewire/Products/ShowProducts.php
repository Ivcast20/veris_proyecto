<?php

namespace App\Http\Livewire\Products;

use App\Models\ProductService;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $productos = ProductService::paginate(5);
        return view('livewire.products.show-products', compact('productos'));
    }
}
