<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SorTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //we have 4 types of SORs initially
        //1. Bad Practises
        //2. Good Practises
        //3. Reported Hazards
        //4. Improvements

        $types = [
            [
                'name' => 'Bad Practises',
                'description' => 'Bad practises are the ones that are not in line with the company\'s policies and procedures.',
            ],
            [
                'name' => 'Good Practises',
                'description' => 'Good practises are the ones that are in line with the company\'s policies and procedures.',
            ],
            [
                'name' => 'Reported Hazards',
                'description' => 'Reported hazards are the ones that are not in line with the company\'s policies and procedures and can cause harm to the employees.',
            ],
            [
                'name' => 'Improvements',
                'description' => 'Improvements are the ones that are not in line with the company\'s policies and procedures and can improve the company\'s performance.',
            ],
        ];

        foreach ($types as $type) {
            \App\Models\SorTypes::create($type);
        }


    }
}
