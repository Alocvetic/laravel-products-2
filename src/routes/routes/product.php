<?php

declare(strict_types=1);

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('show');
});
