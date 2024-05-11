<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest('id')->get();
        return view('admin.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    $title='Add New Student';
        return view('admin.student.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
               'student_id'=>'required',
               'name'=>'required',
               'grade'=>'required',
               'sex'=>'required',
               'address'=>'required',
               'email'=>'required',

            ]
        );

        $filePath = public_path('uploads');
        $insert = new Student();
        $insert->student_id = $request->student_id;
        $insert->name = $request->name;
        $insert->grade = $request->grade;
        $insert->sex = $request->sex;
        $insert->address= $request->address;
        $insert->email = $request->email;

        $result = $insert->save();
        Session::flash('success', 'Student aded successfully');
        return redirect()->route('admin.student.index');

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
    public function edit($id)
    {
        $title = "Update User";
        $edit = Student::findOrFail($id);
        return view('admin.student.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'student_id' => 'required',
                'name' => 'required',
                'grade' => 'required',
                'sex' => 'required',
                'address' => 'required',
                'email' => 'required',
            ]
        );
        $update = Student::findOrFail($id);
        $update->student_id = $request->student_id;
        $update->name = $request->name;
        
        $update->grade = $request->grade;
        $update->sex = $request->sex;
        $update->address = $request->address;
        $update->address= $request->address;

        $result = $update->save();
        Session::flash('success', 'Student updated successfully');
        return redirect()->route('admin.student.index');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $userData = Student::findOrFail($request->user_id);
        $userData->delete();

        Session::flash('success', 'User deleted successfully');
        return redirect()->route('admin.student.index');
    }
}
