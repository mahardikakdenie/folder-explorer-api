<?php

use App\Http\Controllers\FolderController;
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

Route::prefix('folders')->group(function () {
    Route::get('/', [FolderController::class, 'index']);
    Route::post('/', [FolderController::class, 'store']);
    Route::put('update/{id}', [FolderController::class, 'update']);
    Route::delete('delete/{id}', [FolderController::class, 'delete']);
    Route::get('/{id}/child', [FolderController::class, 'get_child_document']);
});
