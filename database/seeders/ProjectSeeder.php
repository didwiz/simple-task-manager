<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(2)->create()->each(function ($user) {
            Project::factory(5)->create(['user_id' => $user->id])->each(function ($project) {
                // Create default task lists
                $taskLists = ['todo', 'pending', 'in-progress', 'review', 'done'];
                foreach ($taskLists as $index => $taskListName) {
                    $taskList = TaskList::factory()->create([
                        'project_id' => $project->id,
                        'name' => $taskListName,
                        'position' => $index + 1,
                    ]);

                    // Create tasks for each task list
                    Task::factory(5)->create([
                        'project_id' => $project->id,
                        'task_list_id' => $taskList->id,
                        'created_by' => $project->user_id, // Use the project author's ID
                    ]);
                }
            });
        });
    }
}
