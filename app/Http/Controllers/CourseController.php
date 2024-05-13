<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
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
        return view('admin.course.create',compact('title'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
