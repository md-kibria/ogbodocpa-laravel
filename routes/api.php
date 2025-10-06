<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/appointment/service/{service}', [PageController::class, 'appointmentConsultain']);
Route::get('/appointment/consultain/{consultain}', [PageController::class, 'consultainSchedule']);
Route::get('/appointment/preview', [PageController::class, 'appointmentPreview'])->name('appointment.preview');
Route::get('/appointment/confirm', [PageController::class, 'appointmentConfirm'])->name('appointment.confirm');
