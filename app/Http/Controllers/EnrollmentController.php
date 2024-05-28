<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::latest('enroll_id')->get();
        return view('admin.enrollment.index',compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add New Enrollment';
        $students=Student::pluck('student_id');
        $courses=Course::pluck('course_code');
        return view('admin.enrollment.create',compact('students','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
               'enroll_id'=>'required',
               'student_id'=>'required',
               'course_code'=>'required',
               
            ]
        );

        
        $insert = new Enrollment();
        $insert->enroll_id = $request->enroll_id;
        $insert->student_id = $request->student_id;
        $insert->course_code= $request->course_code;
        

        $result = $insert->save();
        Session::flash('success', 'Added successfully');
        return redirect()->route('admin.enrollment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $enroll_id)
    {
        $title = "Enrollment Details";
        $enrollment = Enrollment::with(['student', 'course'])->findOrFail($enroll_id);
        return view('admin.enrollment.view', compact('enrollment', 'title'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $enroll_id)
    {
        $title = "Update User";
        $edit = Enrollment::findOrFail($enroll_id);
        return view('admin.enrollment.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $enroll_id)
    {
        $request->validate(
            [
                'enroll_id'=>'required',
               'student_id'=>'required',
               'course_code'=>'required',
            ]
        );
        $update = Enrollment::findOrFail($enroll_id);
        $update->enroll_id = $request->enroll_id;
        $update->student_id = $request->student_id; 
        $update->course_code = $request->course_code;
        

        $result = $update->save();
        Session::flash('success', 'Updated successfully');
        return redirect()->route('admin.enrollment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
