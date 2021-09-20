<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class);
    }

    public function prices(){
        return $this->hasMany(ProductPrice::class);
    }
}
