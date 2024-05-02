<?php

namespace Database\Factories;

use App\Models\SOR;
use App\Models\User;
use App\Models\SorTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SOR>
 */
class SORFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\SOR::class;

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
            'assignor_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'action_owner' => $this->faker->name(),
            'observation' => $this->faker->text(),
            'status' => $this->faker->randomElement([0, 1]),
            'steps_taken' => $steps, 
            'date' => $this->faker->date(),
            'type_id' => $this->faker->randomElement(SorTypes::pluck('id')->toArray()),
        ];
    }
}
