<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\OrderController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



//ROTAS DOS ADMINISTRADORES

Route::middleware(['admin'])->group(function(){
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/edit/{product}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
});

//ROTAS DOS CLIENTES;
Route::middleware(['client'])->group(function(){
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::post('/perfil/edit', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::get('/perfil/edit', [PerfilController::class, 'Profile'])->name('perfil.edit');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
});

//ROTAS DOS GUESTS(CONVIDADOS)
Route::get('detail/{id}', [WelcomeController::class, 'detail'])->name('detail');
Route::get('search', [WelcomeController::class, 'search'])->name('search');



Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

require __DIR__.'/auth.php';
