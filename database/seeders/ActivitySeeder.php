<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activities;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for activities
        $activitiesData = [
            [
                'title' => 'Sample Activity 1',
                'description' => 'Description for Sample Activity 1',
                'start_time' => now(),
                'end_time' =>  now()->addMinutes(2),
                'teacher_id' => 1,
                'subject' => 'Sample Subject 1',
                'student_program' => 'BSIT',
                'year_level' => 1,
                'block_number' => ['1', '2'],
                'classroom_id' => 1,
            ],
            [
                'title' => 'Sample Activity 2',
                'description' => 'Description for Sample Activity 2',
                'start_time' => now(),
                'end_time' =>  now()->addMinutes(2),
                'teacher_id' => 2,
                'subject' => 'Sample Subject 2',
                'student_program' => 'BSCS',
                'year_level' => 2,
                'block_number' => ['3', '4'],
                'classroom_id' => 2,
            ],
            // Add more sample activities as needed
        ];

        // Create activities from sample data
        foreach ($activitiesData as $activityData) {
            // Convert block_number to JSON
            $activityData['block_number'] = json_encode($activityData['block_number']);

            // Create a Carbon instance for start_time and end_time
            $activityData['start_time'] = Carbon::parse($activityData['start_time']);
            $activityData['end_time'] = Carbon::parse($activityData['end_time']);

            // Create the activity
            Activities::create($activityData);
        }
    }
}
