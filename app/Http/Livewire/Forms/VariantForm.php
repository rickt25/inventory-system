<?php

namespace App\Http\Livewire\Forms;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductVariant;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Boolean;

class VariantForm extends Component
{
    public bool $createMode = false;
    public int $editMode = -1;
    public string $newVariant = "";
    public string $editVariant = "";
    public array $variants = [];

    protected $listeners = [
        'refresh' => '$refresh',
        'saveVariant'
    ];

    public function rules(){
        return  [
            'newVariant' => [
                'required',
                Rule::notIn(array_column($this->variants, 'name'))
            ],
            'editVariant' => [
                'required',
                Rule::notIn(array_column($this->variants, 'name'))
            ]
        ];
    }

    public function saveVariant($productId){
        foreach($this->variants as $variant){
            ProductVariant::create([
                'product_id' => $productId,
                'name' => $variant['name']
            ]);
        }

        $this->resetModes();
    }

    public function addVariant(){
        $this->validateOnly('newVariant');
        $variant = new ProductVariant();
        $variant->name = $this->newVariant;
        array_push($this->variants, $variant);

        $this->resetModes();
    }

    public function editVariant($index){
        $this->validateOnly('editVariant');
        $this->variants[$index]['name'] = $this->editVariant;

        $this->resetModes();
    }

    public function deleteVariant($index){
        array_splice($this->variants, $index, 1);
    }

    public function showCreateForm(){
        $this->resetModes();
        $this->createMode = true;
    }

    public function showEditForm($index){
        $this->resetModes();
        $this->editMode = $index;
        $this->editVariant = $this->variants[$index]['name'];
    }
    
    public function resetModes(){
        $this->editMode = -1;
        $this->createMode = false;
        $this->reset(['newVariant', 'editVariant']);
    }

    public function render()
    {
        return view('livewire.forms.variant-form');
    }
}
