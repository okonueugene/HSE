<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // near_miss
        // first aid
        // medical treated case
        // lost time accidents
        // SIF

        $incident_types = [
            'near_miss',
            'first_aid',
            'medical_treated_case',
            'lost_time_accidents',
            'SIF',
        ];

        foreach ($incident_types as $incident_type) {
            DB::table('incident_type')->insert([
                'incident_type' => $incident_type,
            ]);
        }


    }
}
