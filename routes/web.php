<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OutgoingController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product
    Route::prefix('/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');  // Add this route
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
    
     // Category
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        // Route::get('/{categories}/edit', [CategoryController::class, 'edit'])->name('categories.edit');  // Edit form
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // Customers
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers');
        Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
        Route::put('/{id}', [CustomerController::class, 'update'])->name('customers.update');
        Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    });

    // Outgoing Products
    Route::prefix('outgoing')->group(function () {
        Route::get('/', [OutgoingController::class, 'index'])->name('outgoing');
        Route::post('/', [OutgoingController::class, 'store'])->name('outgoing.store');
        Route::put('/{id}', [OutgoingController::class, 'update'])->name('outgoing.update');
        Route::delete('/{id}', [OutgoingController::class, 'destroy'])->name('outgoing.destroy');
    });

});


require __DIR__.'/auth.php';
