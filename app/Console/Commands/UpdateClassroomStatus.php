<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Classrooms;

class UpdateClassroomStatus extends Command
{
    protected $signature = 'classroom:update-status';
    protected $description = 'Update classroom statuses based on end times';

    public function handle()
    {
        $classrooms = Classrooms::all();

        foreach ($classrooms as $classroom) {
            if (now() >= $classroom->end_time) {
                // End time has passed, update status
                $classroom->occupancy_status = false;
                $classroom->description = null;
                $classroom->start_time = null;
                $classroom->end_time = null;
                $classroom->teacher_id = null;
                $classroom->subject_id = null;
                $classroom->save();
            }
        }

        $this->info('Classroom statuses updated successfully.');
    }
}