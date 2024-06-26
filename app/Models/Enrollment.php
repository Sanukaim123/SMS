<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $primaryKey = 'enroll_id'; // Define the primary key column
    public $incrementing = false; // Disable auto-incrementing for the primary key

    protected $fillable = [
        'enroll_id', 'student_id','course_code' // Specify the columns that are fillable
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'course_code');
    }
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'enrollments', 'course_code', 'student_id', 'course_code', 'student_id');
    // }

    
}
