<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Notifications\NewProjectCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewProjectCreatedNotification implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Handle the event.
     */
    public function handle(ProjectCreated $event): void
    {
        $project = $event->project;
        $project->load('author');

        $project->author->notify(new NewProjectCreatedNotification($event->project));
    }
}
