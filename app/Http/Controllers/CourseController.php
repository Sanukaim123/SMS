<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest('course_code')->get();
        return view('admin.course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add New Course';
        $teachers=Teacher::pluck('employee_id');
        return view('admin.course.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
               'course_code'=>'required',
               'course_name'=>'required',
               'employee_id'=>'required',
              

            ]
        );

       
        $insert = new Course();
        $insert->course_code = $request->course_code;
        $insert->course_name = $request->course_name;
        $insert->employee_id = $request->employee_id;
        

        $result = $insert->save();
        Session::flash('success', 'Student aded successfully');
        return redirect()->route('admin.course.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $course_code)
    {
        $title = "Update Course Details";
        $edit = Course::findOrFail($course_code);
        return view('admin.course.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course_code)
    {
        $request->validate(
            [
                'course_code' => 'required',
                'course_name' => 'required',
                'employee_id' => 'required',
                
            ]
        );
        $update = Course::findOrFail($course_code);
        $update->course_code = $request->course_code;
        $update->course_name = $request->course_name;
        $update->employee_id = $request->employee_id;
        

        $result = $update->save();
        Session::flash('success', 'updated successfully');
        return redirect()->route('admin.course.index');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function show($course_code)
    {
        $course = Course::where('course_code', $course_code)->firstOrFail();
        return view('course.details', compact('course'));
    }
    
}
