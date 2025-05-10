<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;

Route::prefix('customers')->group(function() {
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('/{id}', [CustomerController::class, 'show']);
    Route::post('/', [CustomerController::class, 'store']);
    Route::delete('/{id}', [CustomerController::class, 'delete']);
    Route::put('/{id}', [CustomerController::class, 'update'])->name('customer.update');
});