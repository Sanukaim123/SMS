<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminController extends Controller
{
   public function AdminDashboard(){
    return view('admin.admin_dashboard');

   }

   public function teacherList(){
     
      return view('admin.teacher_list');
   }

   public function addTeacher(){
     
      return view('admin.add_teacher');
   }

   // public function studentIndex(){
     
   //    return view('admin.student.index');
   // }

   // public function studentCreate(){
     
   //    return view('admin.student.create');
   // }

   // public function studentStore(Request $req){
     
   //    $data=$req->validate([
   //          'student_id'=>'required',
   //          'name'=>'required',
   //          'grade'=>'required',
   //          'sex'=>'required',
   //          'address'=>'required',
   //          'email'=>'required',
            
   //          ]);

   //          $newStudent=Student::create($data);
   //          return redirect('admin.student.index');

   // }


}
