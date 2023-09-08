<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Icas>
 */
class IcasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Icas::class;

    public function definition()
    {
        return [
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'action_owner_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'observation' => fake()->text(),
            'status' => fake()->randomElement(['open', 'closed']),
            'steps_taken' => fake()->text(),
            'date' => fake()->date(),
        ];
    }
}