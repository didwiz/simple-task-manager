<?php

use App\Livewire\Projects\CreateProject;
use App\Livewire\TaskBoards\TaskList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('/create', CreateProject::class)->name('create');

    Route::get('{project:uuid}/tasks', TaskList::class)->name('task-list');
})->middleware('auth');

require __DIR__ . '/auth.php';
