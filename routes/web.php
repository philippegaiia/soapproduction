<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\SupplierOrderController;
use App\Http\Controllers\ProductionItemController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SupplierListingController;
use App\Http\Controllers\ProductCollectionController;
use App\Http\Controllers\IngredientCategoryController;
use App\Http\Controllers\ProductSubcategoryController;

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
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('suppliers', SupplierController::class)->middleware('auth');
Route::resource('ingredient_categories', IngredientCategoryController::class)->except('show')->middleware('auth');
Route::resource('ingredients', IngredientController::class)->middleware('auth');
Route::resource('suppliers.listings', SupplierListingController::class)->middleware('auth');
Route::resource('listings', ListingController::class)->middleware('auth');
Route::resource('suppliers.orders', SupplierOrderController::class)->middleware('auth');
Route::resource('orders', OrderController::class)->middleware('auth');
Route::resource('supplies', SupplyController::class)->middleware('auth');
Route::resource('product_categories', ProductCategoryController::class)->only(['index'])->middleware('auth');
Route::resource('product_subcategories', ProductSubcategoryController::class)->only(['index'])->middleware('auth');
Route::resource('product_collections', ProductCollectionController::class)->only(['index'])->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('formulas', FormulaController::class)->middleware('auth');
Route::resource('productions', ProductionController::class)->middleware('auth');
Route::resource('productionItems', ProductionItemController::class)->middleware('auth');

// Route::get('product_categories', App\Http\Livewire\ProductCategories\Index::class);



require __DIR__.'/auth.php';
