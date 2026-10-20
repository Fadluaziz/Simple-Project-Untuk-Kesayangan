<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BucinController;

Route::get('/', [BucinController::class, 'index'])->name('home');
Route::post('/upload-pap', [BucinController::class, 'uploadPap'])->name('upload.pap');

Route::get('/kiro-test', function () {
    return response()->json(['status' => 'ok', 'message' => 'Kiro test route works!']);
})->name('kiro.test');
