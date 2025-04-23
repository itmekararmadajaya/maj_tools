<?php

use App\Http\Controllers\QrGeneratorController;
use App\Http\Controllers\SecurityPatroliQrGeneratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
})->name('home');

Route::get('/qr-generator', [QrGeneratorController::class, 'index'])->name('qr-generator');
Route::post('/generate-qr', [QrGeneratorController::class, 'generate'])->name('generate-qr');

Route::prefix('security-patroli')->group(function () {
    Route::get('/qr-generator', [SecurityPatroliQrGeneratorController::class, 'index'])->name('security-patroli-qr-generator');
    Route::get('/generate-qr', [SecurityPatroliQrGeneratorController::class, 'generate'])->name('security-patroli-generate-qr');
    Route::get('/template', [SecurityPatroliQrGeneratorController::class, 'template'])->name('security-patroli-template');
});
