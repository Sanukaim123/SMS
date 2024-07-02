<?php
// app/Http/Controllers/StudentAssignmentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;

class StudentAssignmentController extends Controller
{
    public function index($course_code)
    {
        $student = Auth::user()->student;
        $assignments = Assignment::whereHas('course', function ($query) use ($student, $course_code) {
            $query->where('course_code', $course_code)
                  ->whereHas('students', function ($query) use ($student) {
                      $query->where('students.student_id', $student->student_id);
                  });
        })->with(['course', 'submissions'])->get();

        return view('student.assignments', compact('assignments'));
    }
}
