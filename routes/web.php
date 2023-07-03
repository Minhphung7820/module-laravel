<?php

use App\Http\Controllers\IndexController;
use Facade\FlareClient\Http\Response as HttpResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Supports\Facades\Demo;

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

Route::middleware(['mdw_1', 'mdw_2'])->group(function () {

    Route::middleware('mdw_3')->group(function () {
        Route::middleware('mdw_4')->group(function () {
            Route::get('/', [IndexController::class, 'index']);
        });
    });
});
