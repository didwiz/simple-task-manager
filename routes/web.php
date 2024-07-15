<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Projects\CreateProject;
use App\Livewire\TaskBoards\TaskList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

//quick logout url for testing only.
Route::get('logout', function (Logout $logout) {
    $logout();
})->middleware(['auth']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::middleware('auth')->prefix('projects')->name('projects.')->group(function () {
    Route::get('/create', CreateProject::class)->name('create');

    Route::get('{project:uuid}/tasks', TaskList::class)->name('task-list');
});

require __DIR__ . '/auth.php';
