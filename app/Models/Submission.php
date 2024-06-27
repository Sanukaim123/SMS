<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = ['assignment_id', 'student_id', 'file_path'];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id','id');
        
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
