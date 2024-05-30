<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'course_code'; // Define the primary key column
    public $incrementing = false; // Disable auto-incrementing for the primary key

    protected $fillable = [
        'course_code', 'course_name','employee_id' // Specify the columns that are fillable
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'employee_id', 'employee_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_code', 'course_code');
    }

    

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'course_code', 'student_id', 'course_code', 'student_id');
    }

    
}
