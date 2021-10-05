<?php

namespace App\Http\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginateCount = 8;

    public Product $confirmDelete;
    public $search;

    protected $listeners = ['refresh' => '$refresh'];

    public function confirmDelete($productId){
        $this->confirmDelete = Product::find($productId);
    }

    public function delete(){
        $this->confirmDelete->forceDelete();;
        $this->emitSelf('refresh');
    }

    public function render(){
        $products = Product::search('name', $this->search)
                                ->with(['brand', 'category'])
                                ->paginate($this->paginateCount);

        return view('livewire.pages.products', [
            'products' => $products
        ]);
    }
}
