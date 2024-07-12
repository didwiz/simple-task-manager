<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Component::macro('notify', function ($body, $title = null, $type = 'success') {
            $this->dispatch('notify', [
                'id' => uniqid(),
                'body' => $body,
                'title' => $title,
                'type' => $type,
            ]);
        });
    }
}
