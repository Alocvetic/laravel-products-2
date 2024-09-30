<?php

declare(strict_types=1);

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('review')->name('review.')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('index');
    Route::post('/', [ReviewController::class, 'create'])->name('create');
});
