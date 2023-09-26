<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
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

    protected $model = Task::class;

    public function definition()
    {
        return [
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'assignee_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'title' => fake()->text(),
            'description' => fake()->text(),
            'comments' => fake()->text(),
            'from' => fake()->date(),
            'to' => fake()->date(),
            'status' => fake()->randomElement(['completed', 'pending']),

        ];
    }
}
