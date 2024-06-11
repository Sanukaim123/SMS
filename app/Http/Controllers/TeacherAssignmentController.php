<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherAssignmentController extends Controller
{
    public function index()
    {
        $teacher = Auth::user()->teacher; // Assuming the teacher is authenticated
        $courses = $teacher->courses; // Get all courses taught by the teacher
        return view('teacher.assignments.index', compact('courses'));
    }

    public function create($course_code)
    {
        return view('teacher.assignments.create', compact('course_code'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,txt|max:2048',
            'due_date' => 'required|date',
            'course_code' => 'required|string|exists:courses,course_code',
            
        ]);

        $teacher = Auth::user()->teacher; // Assuming the teacher is authenticated
        $filePath = $request->file('file')->store('assignments', 'public');

        Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'due_date' => $request->due_date,
            'course_code' => $request->course_code,
            'employee_id' => $teacher->employee_id,
            
        ]);

        return redirect()->route('teacher.assignments.index')->with('success', 'Assignment created successfully.');
    }

    public function destroy(Assignment $assignment)
    {
        if ($assignment->file_path) {
            Storage::disk('public')->delete($assignment->file_path);
        }
        $assignment->delete();
        return redirect()->route('teacher.assignments.index')->with('success', 'Assignment deleted successfully.');
    }
}
