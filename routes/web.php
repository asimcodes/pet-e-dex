<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;

Route::get('/', [CatController::class, 'index'])->name('cat.index');
Route::get('/breed/{id}', [CatController::class, 'show'])->name('cat.show');
