<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryForm extends Component
{
    public $category = [
        'id' => null,
        'name' => '',
    ];

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function rules (){
        $rules = [
            'category.name' => [
                'required', 
                Rule::unique('categories', 'name')
                    ->withoutTrashed()
            ],
        ];

        if(isset($this->category['id'])){
            $rules['category.name'] = [
                'required', 
                Rule::unique('categories', 'name')
                    ->ignore($this->category['id'])
                    ->withoutTrashed()
            ];
        }

        return $rules;
    }

    protected $validationAttributes = [
        'category.name' => 'name'
    ];

    public function mount($category = []){
        $this->category = $category;
    }

    public function submit(){
        $data = $this->validate()['category'];

        Category::updateOrCreate(
            ['id' => $this->category['id'] ?? null],
            $data
        );

        $this->resetForm();
        $this->emitUp('refresh');
    }

    public function resetForm(){
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        return view('livewire.forms.category-form');
    }
}
