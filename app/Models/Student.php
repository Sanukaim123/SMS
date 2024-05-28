<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_id'; // Define the primary key column
    public $incrementing = false; // Disable auto-incrementing for the primary key

    protected $fillable = [
        'student_id', 'name','grade','sex','address', 'email' // Specify the columns that are fillable
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'username', 'student_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id', 'student_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_code', 'student_id', 'course_code');
    }
}
