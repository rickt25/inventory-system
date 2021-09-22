<?php

namespace App\Http\Livewire\Forms;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ProductForm extends Component
{
    public Product $product;

    public function rules(){
        return [
            'product.name' => 'required',
            'product.stock' => 'required',
            'product.description' => 'required',
            'product.brand_id' => 'nullable',
            'product.category_id' => 'nullable',
        ];
    }

    protected $validationAttributes = [
        'product.name' => 'name',
        'product.stock' => 'stock',
        'product.description' => 'description',
    ];

    public function submit(){
        $data = $this->validate()['product'];

        Product::updateOrCreate(
            ['id' => $this->product->id ?? null],
            $data
        );
    }

    public function mount(){
        $this->product = new Product();
        $this->product->stock = 0;
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
