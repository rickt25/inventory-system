<?php

namespace App\Http\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        $products = Product::search('name', $this->search)
                                ->paginate(8);

        return view('livewire.pages.products', [
            'products' => $products
        ]);
    }
}
