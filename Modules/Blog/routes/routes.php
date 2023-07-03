<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\src\Http\Controllers\IndexController;

Route::prefix('blog')->middleware(['web'])->group(function () {
    Route::get('/', [IndexController::class, 'index']);
});
