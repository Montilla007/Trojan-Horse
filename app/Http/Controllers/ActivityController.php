<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classrooms;
use Illuminate\Support\Carbon;

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

    public function create(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'description' => 'required|string',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s',
            'teacher_id' => 'required|exists:teachers,id',
            'classroom_id' => 'required|exists:classroom,id',
            'subject_id' => 'required|exists:subject_id'            
        ]);

        // Find the classroom by ID
        $classroom = Classrooms::create($validatedData);

        // Return a success response
        return response()->json(['message' => 'schedule created', 'data' => $classroom], 200);
    }
}