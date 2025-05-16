<?php

use App\Http\Controllers\Api\EmergencyController;
use Illuminate\Support\Facades\Route;

Route::post('/emergencies/trigger', [
    EmergencyController::class,
    'trigger',
])->name('emergencies.trigger');

Route::post('/emergencies/cancel', [
    EmergencyController::class,
    'cancel',
])->name('emergencies.cancel');

// Route::get('/emergencies/status', [
//     EmergencyController::class,
//     'status',
// ])->name('emergencies.status');
