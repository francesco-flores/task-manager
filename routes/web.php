<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::post('/', [TaskController::class, 'store'])->name('store');
Route::put('/{id}', [TaskController::class, 'update'])->name('update');
Route::delete('/{id}', [TaskController::class, 'destroy'])->name('destroy');
