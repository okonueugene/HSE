<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Incident;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incident>
 */
class IncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>

     */

    protected $model = \App\Models\Incident::class;

    public function definition()
    {
        return [


        'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
        'incident_type_id' => DB::table('incident_type')->inRandomOrder()->first()->id,
        'incident_date' => fake()->date(),
        'investigation_status' => fake()->randomElement(['open', 'closed']),
        'incident_description' => fake()->text(),
        'incident_status' => fake()->randomElement(['no', 'yes']),
        ];
    }
}