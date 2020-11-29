<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::group(['prefix' => 'products'], function () {

    Route::get('/', [ProductController::class, 'listProducts']);

    Route::get('/create', [ProductController::class, 'createProduct'])
        ->name('product.create');
    Route::post('/create', [ProductController::class, 'storeProduct'])
        ->name('product.store');

    Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])
        ->name('product.delete');

    Route::get('/show/{id}', [ProductController::class, 'showProduct']);

    Route::get('/update/{id}', [ProductController::class, 'updateProduct']);
    Route::post('/edit/{id}', [ProductController::class, 'editProduct']);

    Route::get('/search', [ProductController::class, 'searchProduct']);

});
