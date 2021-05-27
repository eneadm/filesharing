<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/', \App\Http\Controllers\DashboardController::class)->name('dashboard');

    Route::get('/documents/{document}', [\App\Http\Controllers\DocumentController::class, 'show'])->name('document.show');
    Route::get('/documents/{document}/download', [\App\Http\Controllers\DocumentController::class, 'download'])->name('document.download');
});
