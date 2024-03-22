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
                'room_number' => 'Room 1',
               
            ],
            [
                'room_number' => 'Room 2',

            ],
            [
                'room_number' => 'Room 2',
            ],
            // Add more classrooms as needed
        ];

        // Populate the classrooms table
        foreach ($classrooms as $classroomData) {
            Classrooms::create($classroomData);
        }
    }
}