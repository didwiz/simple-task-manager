<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'project_id' => \App\Models\Project::factory(),
            'task_list_id' => \App\Models\TaskList::factory(),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'status' => $this->faker->randomElement(['open', 'in-progress', 'closed','review','done']),
            'position' => $this->faker->numberBetween(1, 10),
            'due_date' => $this->faker->dateTime,
            'created_by' => \App\Models\User::factory(),
        ];
    }
}
