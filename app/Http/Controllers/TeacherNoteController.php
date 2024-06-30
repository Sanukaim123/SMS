<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherNoteController extends Controller
{
    public function index()
    {
        $teacher = Auth::user()->teacher; // Assuming the teacher is authenticated
        $courses = $teacher->courses; // Get all courses taught by the teacher
        return view('teacher.lec_notes.index', compact('courses'));
    }

    public function create($course_code)
    {
        return view('teacher.lec_notes.create', compact('course_code'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,txt|max:2048',
            'course_code' => 'required|string|exists:courses,course_code',
            
        ]);

        $teacher = Auth::user()->teacher; // Assuming the teacher is authenticated
        $filePath = $request->file('file')->store('notes', 'public');

       Note::create([
            'title' => $request->title,
            'file_path' => $filePath,
            'course_code' => $request->course_code,
            'employee_id' => $teacher->employee_id,
            
        ]);

        return redirect()->route('teacher.lec_notes.index')->with('success', ' Created successfully.');
    }

    public function destroy(Note $note)
    {
        if ($note->file_path) {
            Storage::disk('public')->delete($note->file_path);
        }
        $note->delete();
        return redirect()->route('teacher.lec_notes.index')->with('success', 'Deleted successfully.');
    }


}
