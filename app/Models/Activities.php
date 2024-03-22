<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'title',
        'teacher_id',
        'subject_id',
        'description',
        'start_time',
        'end_time',
        'student_program',
        'year_level',
        'block_number',
        'section',
    ];
    protected $casts = [
        'block_number' => 'array', // Cast block_numbers attribute to array
    ];
    public function classroom()
    {
        return $this->belongsTo(Classrooms::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
}
