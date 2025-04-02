<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\MapController;

Route::get('/', function () {
    return view('home');
});

Route::post('/upload', [FileController::class, 'uploadFile'])->name('uploadFile');
Route::get('/maps', [MapController::class, 'showMap'])->name('mapPage');
