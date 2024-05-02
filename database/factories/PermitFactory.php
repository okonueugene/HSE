<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PermitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Permit::class;

    public function definition()
    {

        $types = ['General Work', 'Hot Work', 'Cold Work', 'Confined Space Entry', 'Work At Height', 'Excavation/Demolition', 'Live Electrical Work'];

        return [
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'date' => fake()->date(),
            'type' => fake()->randomElement($types),
            'authorized_person' => fake()->name(),
            'area_owner' => fake()->name(),
            'competent_person' => fake()->name(),
        ];

    }
}
