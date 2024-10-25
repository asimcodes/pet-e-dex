<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', [PetController::class, 'index'])->name('pet.index');
Route::get('/breed/{id}', [PetController::class, 'show'])->name('pet.show');
