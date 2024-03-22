<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activities')->insert([
            [
                'description' => 'Class',
                'start_time' => now(),
                'end_time' => now()-addMinutes(2),
                'teacher_id' => '1',
                'classroom_id' => '1',
                'subject_id' => '1'
            ],
            [
                'description' => 'Quiz',
                'start_time' => now(),
                'end_time' => now()-addMinutes(2),
                'teacher_id' => '2',
                'classroom_id' => '2',
                'subject_id' => '2'
            ],
            [
                'description' => 'Exam',
                'start_time' => now(),
                'end_time' => now()-addMinutes(2),
                'teacher_id' => '3',
                'classroom_id' => '3',
                'subject_id' => '3'
            ],
        ]);
    }
}
