<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'teacher_id',
        'subject_id',
        'description',
        'start_time',
        'end_time'
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
