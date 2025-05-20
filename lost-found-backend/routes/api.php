<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/items/{type}', [ItemController::class, 'index'])->where('type', 'lost|found'); // 👈 now uses /type/lost or /type/found
Route::get('/items/item/{id}', [ItemController::class, 'show']); // for single item view
Route::post('/items', [ItemController::class, 'store']);

Route::put('/items/{id}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);
