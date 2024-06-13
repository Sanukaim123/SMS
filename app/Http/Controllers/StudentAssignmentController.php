<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAssignmentController extends Controller
{
    public function index()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Get the student's courses
        $student = $user->student;
        $courses = $student->courses;

        // Fetch assignments for these courses
        $assignments = collect();
        foreach ($courses as $course) {
            $assignments = $assignments->merge($course->assignments);
        }

        return view('student.assignments', compact('assignments'));
    }
}