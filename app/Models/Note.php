<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'course_code', 'employee_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'course_code');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'employee_id', 'employee_id');
    }

    
}
