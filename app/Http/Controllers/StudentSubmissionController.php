<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Submission;

class StudentSubmissionController extends Controller
{
    public function create($course_code, $assignmentId)
    {
        $assignment = Assignment::findOrFail($assignmentId);
        return view('student.submissions.create', compact('assignment', 'course_code'));
    }

    public function store(Request $request, $course_code, $assignmentId)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $assignment = Assignment::findOrFail($assignmentId);
        $student = Auth::user()->student;

        // Check if the student already submitted for this assignment
        $existingSubmission = Submission::where('assignment_id', $assignmentId)
                                        ->where('student_id', $student->student_id)
                                        ->first();
        
        if ($existingSubmission) {
            return redirect()->route('student.assignments', $course_code)->with('error', 'You have already submitted this assignment.');
        }

        $filePath = $request->file('file')->store('submissions', 'public');

        Submission::create([
            'assignment_id' => $assignment->id,
            'student_id' => $student->student_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('student.assignments', $course_code)->with('success', 'Assignment submitted successfully.');
    }

    public function destroy($course_code, $id)
    {
        $submission = Submission::findOrFail($id);
        $submission->delete();

        return redirect()->route('student.assignments', $course_code)->with('success', 'Submission removed successfully.');
    }
}
