<?php

use App\Livewire\Projects\Create as CreateProject;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('/create', CreateProject::class)
        ->middleware(['auth'])
        ->name('create');
});

require __DIR__ . '/auth.php';
