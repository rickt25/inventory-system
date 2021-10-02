<?php

namespace App\Http\Livewire\Forms;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;
    
    public $increment = 0;
    public Product $product;
    public $image;

    protected $rules = [
        'product.name' => 'required',
        'product.stock' => 'required',
        'product.description' => 'required',
        'product.brand_id' => 'nullable',
        'product.category_id' => 'nullable',
        'image' => 'nullable|image',
    ];

    protected $validationAttributes = [
        'product.name' => 'name',
        'product.stock' => 'stock',
        'product.description' => 'description',
    ];

    public function updatedImage(){
        $this->validateOnly('image');
    }

    public function ddbutton(){
        dd($this->image->store('images','public'));
    }

    public function mount(){
        $this->product = new Product();
        $this->product->stock = 0;
    }

    public function submit(){
        $data = $this->validate()['product'];

        if($this->image){
            $data['image'] = $this->image->store('products', 'public');
        }

        $product = Product::updateOrCreate(
            ['id' => $this->product->id ?? null],
            $data
        );

        $this->emit('savePrice', $product->id);
        $this->emit('saveVariant', $product->id);

        return redirect()->route('product');
    }

    public function render()
    {
        
        $categories = Category::all();
        $brands = Brand::all();
        $units = Unit::all();

        return view('livewire.forms.product-form', [
            'categories' => $categories,
            'brands' => $brands,
            'units' => $units
        ]);
    }
}
