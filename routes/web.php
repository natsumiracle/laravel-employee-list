<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Auth::routes();


Route::group(['middleware' => 'auth'], function() {

  Route::get('/',[UserController::class, 'index'])->name('index');
  Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
  Route::patch('/{id}/update', [UserController::class, 'update'])->name('update');
  Route::delete('/{id}/destroy', [UserController::class, 'destroy'])->name('destroy');
  Route::get('/people',[UserController::class, 'search'])->name('search');
});