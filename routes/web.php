<?php

use App\Http\Livewire\Pages\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Categories;
use App\Http\Livewire\Forms\ProductForm;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('category', Categories::class)->name('category');
    Route::get('product', Products::class)->name('product');
    Route::get('product/create', ProductForm::class)->name('product.create');
});
