<?php

// database/seeders/ClassroomSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classrooms;

class ClassroomSeeder extends Seeder
{
    public function run()
    {

        // Example data for classrooms
        $classrooms = [
            [
                'room_number' => 'ITS 200',
               
            ],
            [
                'room_number' => 'ITS 201',

            ],
            [
                'room_number' => 'PTC 301',
            ],
            [
                'room_number' => 'PTC 302',
            ],
            [
                'room_number' => 'PTC 303',
            ],
            [
                'room_number' => 'PTC 304',
            ],
            [
                'room_number' => 'PTC 305',
            ],
            [
                'room_number' => 'PTC 306',
            ],
            [
                'room_number' => 'PTC 403',
            ],
            [
                'room_number' => 'PTC 404',
            ],
            [
                'room_number' => 'PTC 405',
            ],
            [
                'room_number' => 'PTC 406',
            ],

            // Add more classrooms as needed
        ];

        // Populate the classrooms table
        foreach ($classrooms as $classroomData) {
            Classrooms::create($classroomData);
        }
    }
}