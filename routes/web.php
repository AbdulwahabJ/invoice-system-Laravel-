<?php

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/invoices/section/{id}', [InvoicesController::class,'getproducts']);


    Route::prefix('invoices')->controller(InvoicesController::class)->group(function () {
        Route::get('/', 'index')->name('invoices');
        Route::get('/create', 'create')->name('invoices.create');


    });

    Route::prefix('sections')->controller(SectionsController::class)->group(function () {
        Route::get('/', 'index')->name('sections');
        Route::post('/store', 'store')->name('sections.store');
        Route::post('/update', 'update')->name('sections.update');
        Route::post('/create', 'create')->name('sections.create');
        Route::delete('/destroy', 'destroy')->name('sections.destroy');

    });

    Route::prefix('products')->controller(productsController::class)->group(function () {
        Route::get('/', 'index')->name('products');
        Route::post('/store', 'store')->name('products.store');
        Route::post('/update', 'update')->name('products.update');
        Route::delete('/destroy', 'destroy')->name('products.destroy');


    });

});


//---------------------------------------------------------------------------------------------------------------
//Route::controller(ProfileController::class)->group(function () {
//    Route::get('/profile', 'edit')->name('profile.edit');
//    Route::patch('/profile', 'update')->name('profile.update');
//    Route::delete('/profile', 'destroy')->name('profile.destroy');
//});


require __DIR__ . '/auth.php';
