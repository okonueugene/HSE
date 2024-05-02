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
        $faker = \Faker\Factory::create();

        // Generate a random number of steps between 1 and 5
        $numSteps = $faker->numberBetween(1, 5);

        // Create an object to hold the steps example: {"1":"Quia eaque harum ut","2":"Et eaque ea dolores"}
        $steps = [];
        for ($i = 0; $i < $numSteps; $i++) {
            // Add a random step to the array
            $steps[] = $faker->sentence();
        }

        return [
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'action_owner' => fake()->name(),
            'observation' => fake()->text(),
            'status' => fake()->randomElement(['open', 'closed']),
            'steps_taken' => $steps,
            'date' => fake()->date(),
        ];
    }
}
