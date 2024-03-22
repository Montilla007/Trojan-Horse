<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;


class ActivityController extends Controller
{
    

public function index()
{
    // Retrieve all classrooms
    $classrooms = Classrooms::all();

    // Current time
    $currentTime = Carbon::now()->toDateTimeString();

    // Merge the current time with the classrooms data
    $responseData = [
        'current_time' => $currentTime,
        'classrooms' => $classrooms,
    ];

    // Return the data as a JSON response
    return response()->json($responseData);
}

public function create(Request $request, int $classroom_id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'description' => 'required|string',
        'start_time' => 'required|date_format:Y-m-d H:i:s',
        'end_time' => 'required|date_format:Y-m-d H:i:s',
        'teacher_id' => 'required|exists:teachers,id',
        'subject_id' => 'required|exists:subjects,id',

        'student_program' => 'required|string',
        'year_level' => 'required|integer', // Ensure year_level is an integer
        'block_number' => 'required|array',
        'block_number.*' => 'required|string', // Ensure each item in block_number array is a string
    ]);

    // Merge student_program, year_level, and block_number into sections
    $sections = [];
    foreach ($validatedData['block_number'] as $block) {
        // Concatenate student_program, year_level, and block_number
        $section = $validatedData['student_program'] . $validatedData['year_level'] . '-' . $block;

        // Add the concatenated string to the sections array
        $sections[] = $section;
    }

    // Convert sections array to JSON string
    $sectionsJson = json_encode($sections);

    // Add sections JSON to the validated data
    $validatedData['section'] = $sectionsJson;

    // Add the classroom_id to the validated data
    $validatedData['classroom_id'] = $classroom_id;

    // Create a Carbon instance for start_time and end_time
    $startTime = Carbon::parse($validatedData['start_time']);
    $endTime = Carbon::parse($validatedData['end_time']);

    // Check if end_time is lower than start_time
    if ($endTime->lt($startTime)) {
        return response()->json(['error' => 'End time must be after start time'], 422);
    }
    if ($startTime->diffInMinutes($endTime) < 30) {
        return response()->json(['error' => 'The duration must be at least 30 minutes'], 422);
    }
    if ($startTime->diffInHours($endTime) > 5) {
        return response()->json(['error' => 'The duration must not exceed 5 hours'], 422);
    }

    // Create a new activity record
    $activity = Activities::create($validatedData);

    // Return a success response
    return response()->json(['message' => 'schedule created', 'data' => $activity], 200);
}


}