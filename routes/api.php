<?php

use App\Http\Controllers\Api\EmergencyController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
// Route::group(function () {
//     // Route::redirect('settings', 'settings/profile');

//     // Route::get('settings/profile', Profile::class)->name('settings.profile');
//     // Route::get('settings/password', Password::class)->name('settings.password');
//     // Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

// });

use Illuminate\Support\Facades\Route;

Route::post('/emergencies/trigger', [
    EmergencyController::class,
    'trigger',
])->name('emergencies.trigger');
