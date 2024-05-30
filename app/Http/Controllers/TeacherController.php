<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
          $teachers = Teacher::latest('employee_id')->get();
        return view('admin.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Add New Teacher';
        return view('admin.teacher.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
               'employee_id'=>'required',
               'name'=>'required',
               'qualification'=>'required',
               'year_experience'=>'required',
               'status'=>'required',
               'email'=>'required',

            ]
        );

       
        $insert = new Teacher();
        $insert->employee_id = $request->employee_id;
        $insert->name = $request->name;
        $insert->qualification = $request->qualification;
        $insert->year_experience = $request->year_experience;
        $insert->status= $request->status;
        $insert->email = $request->email;

        $result = $insert->save();
        Session::flash('success','Teacher aded successfully');
        return redirect()->route('admin.teacher.index');

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
    public function edit(string $employee_id)
    {
        $title = "Update Teacher's details";
        $edit = Teacher::findOrFail($employee_id);
        return view('admin.teacher.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $employee_id)
    { $request->validate(
        [
            'employee_id'=>'required',
            'name'=>'required',
            'qualification'=>'required',
            'year_experience'=>'required',
            'status'=>'required',
            'email'=>'required',

        ]
    );
    $update = Teacher::findOrFail($employee_id);
    $update->employee_id = $request->employee_id;
    $update->name = $request->name;
    
    $update->qualification = $request->qualification;
    $update->year_experience = $request->year_experience;
    $update->status = $request->status;
    $update->email= $request->email;

    $result = $update->save();
    Session::flash('success', 'Teacher updated successfully');
    return redirect()->route('admin.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function dashboard()
    {
        $user = Auth::user(); // Get the authenticated user
        $courses = $user->courses1; // Fetch courses associated with the teacher

        return view('teacher.teacher_dashboard', compact('courses'));
    }
}
