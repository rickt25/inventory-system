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

    public Category $confirmDelete;
    public $form;
    public $search;

    protected $listeners = ['refresh' => '$refresh'];

    public function create(){
        $this->reset('form');
    }

    public function edit(Category $category){
        $this->form = $category;
    }

    public function confirmDelete(Category $category){
        $this->confirmDelete = $category;
    }

    public function delete(){
        $this->confirmDelete->delete();
        $this->emitSelf('refresh');
    }

    public function render()
    {
        $categories = Category::search('name', $this->search)
                                ->paginate(8);

        return view('livewire.pages.categories', [
            'categories' => $categories
        ]);
    }
}
