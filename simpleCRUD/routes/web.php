<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ProductControler;
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
    return view('welcome');
});
Route::get('/home', function () {
    return view('site.home.index');
})->name('home.index');
Route::get('/contact', function () {
    return view('site.contact.index');
})->name('contact.index');
Route::get('/about', function () {
    return view('site.about.index');
})->name('about.index');
Route::prefix('/products')->as('products.')->group(function () {
    Route::get('/', [ProductControler::class, 'index'])->name('index');
    Route::get('/create', [ProductControler::class, 'create'])->name('create');
    Route::post('/', [ProductControler::class, 'store'])->name('store');
    Route::delete('/{product}', [ProductControler::class, 'destroy'])->name('destroy');
    Route::get('/{product}/show', [ProductControler::class, 'show'])->name('show');
    Route::get('/{product}/edit', [ProductControler::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductControler::class, 'update'])->name('update');
});
Route::prefix('/categories')->as('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::get('/{category}/show', [CategoryController::class, 'show'])->name('show');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
});
Route::get('/demo/download', function () {
    return response()->download(public_path('koala.jpg'), 'MSA.jpg');
})->name('image.download');
