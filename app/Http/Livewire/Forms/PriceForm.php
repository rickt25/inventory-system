<?php

namespace App\Http\Livewire\Forms;

use App\Models\Unit;
use Livewire\Component;
use App\Models\ProductPrice;
use Illuminate\Validation\Rule;

class PriceForm extends Component
{
    public bool $createMode = false;
    public int $editMode = -1;
    public array $newPrice = [
        'price' => '',
        'per_qty' => 1,
        'unit_id' => 1,
    ];
    public array $editPrice = [
        'price' => '',
        'per_qty' => 1,
        'unit_id' => 1,
    ];
    public array $prices = [];

    protected $listeners = [
        'refresh' => '$refresh',
        'savePrice'
    ];

    public function mount($productId){
        $this->prices = ProductPrice::where('product_id', $productId)->get()->toArray();
        foreach($this->prices as $idx => $price){
            $this->prices[$idx]['unit'] = Unit::find($price['unit_id'])->name;
        }
    }

    public function savePrice($productId){
        foreach($this->prices as $price){
            ProductPrice::create([
                'product_id' => $productId,
                'unit_id' => $price['unit_id'],
                'price' => $price['price'],
                'per_qty' => $price['per_qty'],
            ]);
        }

        $this->resetModes();
    }

    public function addPrice(){
        $this->validate([
            'newPrice.price' => 'required',
            'newPrice.per_qty' => 'required',
            'newPrice.unit_id' => 'required'
        ]);
        $unit_id = intval($this->newPrice['unit_id']);
        $price = [
            'price' => $this->newPrice['price'],
            'per_qty' => $this->newPrice['per_qty'],
            'unit_id' => $unit_id,
            'unit' => Unit::find($unit_id)->name
        ];
        array_push($this->prices, $price);
        $this->resetModes();
    }

    public function editPrice($index){
        $this->validate([
            'editPrice.price' => 'required',
            'editPrice.per_qty' => 'required',
            'editPrice.unit_id' => 'required'
        ]);
        $unit_id = intval($this->editPrice['unit_id']);
        $this->prices[$index] = [
            'price' => $this->editPrice['price'],
            'per_qty' => $this->editPrice['per_qty'],
            'unit_id' => $unit_id,
            'unit' => Unit::find($unit_id)->name
        ];
        $this->resetModes();
    }

    public function deletePrice($index){
        array_splice($this->prices, $index, 1);
    }

    public function showCreateForm(){
        $this->resetModes();
        $this->createMode = true;
        $this->dispatchBrowserEvent('mask-input');
    }

    public function showEditForm($index){
        $this->resetModes();
        $this->editMode = $index;
        $this->editPrice = [
            'price' => $this->prices[$index]['price'],
            'per_qty' => $this->prices[$index]['per_qty'],
            'unit_id' => $this->prices[$index]['unit_id'],
            'unit' => $this->prices[$index]['unit'],
        ];
    }
    
    public function resetModes(){
        $this->editMode = -1;
        $this->createMode = false;
        $this->reset(['newPrice', 'editPrice']);
    }

    public function render()
    {
        $units = Unit::all();
        return view('livewire.forms.price-form', [
            'units' => $units
        ]);
    }
}
