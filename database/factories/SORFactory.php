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
        return [
            //'assignor_id',
        // 'assignee_id',
        // 'observation',
        // 'status',
        // 'steps_taken',
        // 'date',
        // 'type_id',
        'assignor_id' => fake()->randomElement(User::pluck('id')->toArray()),
        'action_owner' => fake()->name(),
        'observation' => fake()->text(),
        'status' => fake()->randomElement([0, 1]),
        //steps_taken is a json field
        'steps_taken' => json_encode([
            'step1' => fake()->sentence(),
            'step2' => fake()->sentence(),
            'step3' => fake()->sentence(),
            'step4' => fake()->sentence(),
            'step5' => fake()->sentence(),
        ]),
        'date' => fake()->date(),
        'type_id' => fake()->randomElement(SorTypes::pluck('id')->toArray()),


        ];
    }
}
