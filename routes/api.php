<?php

use App\Http\Controllers\IndexTodoController;
use App\Http\Controllers\ShowTodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/auth/me', function () {
        return auth()->user();
    })->name('auth.me');
});

Route::scopeBindings()->group(function (){
    Route::prefix('todo')->name('todo.')->group(function () {
        Route::get('/', IndexTodoController::class)->name('index');
        Route::get('/{todo}', ShowTodoController::class)->name('show');
    });
});