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
}
