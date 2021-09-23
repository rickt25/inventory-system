<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use App\Models\ProductVariant;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Boolean;

class VariantForm extends Component
{
    public bool $createMode = false;
    public string $newVariant = "";
    public array $variants = [];

    protected $listeners = ['refresh' => '$refresh'];

    public function rules(){
        return  [
            'newVariant' => [
                'required',
                Rule::notIn(array_column($this->variants, 'name'))
            ]
        ];
    }

    public function addVariant(){
        $this->validate();
        $this->createMode = false;
        $variant = new ProductVariant();
        $variant->name = $this->newVariant;
        array_push($this->variants, $variant);
        $this->reset(['newVariant']);
    }

    public function deleteVariant($index){
        array_splice($this->variants, $index, 1);
    }

    public function ddbutton(){
        dd($this->variants);
    }

    public function render()
    {
        return view('livewire.forms.variant-form');
    }
}
