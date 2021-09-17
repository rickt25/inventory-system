<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithModal;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $form;
    public $search;
    public $sortField = 'name';
    public $sortDirection = 'asc';

    protected $listeners = ['refresh' => '$refresh'];

    public function create(){
        $this->reset('form');
    }

    public function edit(Category $category){
        $this->form = $category;
    }

    public function delete(Category $category){
        $category->delete();
        $this->emitSelf('refresh');
    }

    public function render()
    {
        $categories = Category::search('name', $this->search)
                                ->orderBy($this->sortField, $this->sortDirection)
                                ->paginate(8);

        return view('livewire.pages.categories', [
            'categories' => $categories
        ]);
    }
}
