<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/table', function () {
    return view('admin.table');
});


Route::get('/admin/form', function () {
    return view('admin.form');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/dashboard', [DashboardController::class, 'login'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/teacher_list', [AdminController::class, 'teacherList'])->name('admin.teacher_List');
    Route::get('/admin/add_teacher', [AdminController::class, 'addTeacher'])->name('admin.add_teacher');
    
    Route::get('/admin/student/index', [StudentController::class, 'index'])->name('admin.student.index');
    Route::get('admin/student/create', [StudentController::class, 'create'])->name('admin.student.create');
    Route::post('admin/student/add', [StudentController::class, 'store'])->name('admin.student.store');
    Route::get('admin/student/edit/{student_id}', [StudentController::class, 'edit'])->name('admin.student.edit');
    Route::post('/update/{student_id}', [StudentController::class, 'update'])->name('admin.student.update');
Route::post('admin/student/delete', [StudentController::class, 'destroy'])->name('admin.student.delete');
    // Route::post('admin/student/create', [AdminController::class, 'studentStore'])->name('admin.student.store');
});



Route::middleware(['auth','role:teacher'])->group(function(){
    Route::get('/teacher/dashboard', [TeacherController::class, 'TeacherDashboard'])->name('teacher.dashboard');
});




Route::get('/admin/teacher/index', [TeacherController::class, 'index'])->name('admin.teacher.index');
Route::get('admin/teacher/create', [TeacherController::class, 'create'])->name('admin.teacher.create');
Route::post('admin/teacher/add', [TeacherController::class, 'store'])->name('admin.teacher.store');
Route::get('admin/teacher/edit/{employee_id}', [TeacherController::class, 'edit'])->name('admin.teacher.edit');
Route::post('/update/{employee_id}', [TeacherController::class, 'update'])->name('admin.teacher.update');

Route::get('/admin/course/index', [CourseController::class, 'index'])->name('admin.course.index');
Route::get('admin/course/create', [CourseController::class, 'create'])->name('admin.course.create');
Route::post('admin/course/add', [CourseController::class, 'store'])->name('admin.course.store');
Route::get('admin/course/edit/{course_code}', [CourseController::class, 'edit'])->name('admin.course.edit');
Route::post('/update/{course_code}', [CourseController::class, 'update'])->name('admin.course.update');


Route::get('admin/enrollment/index', [EnrollmentController::class, 'index'])->name('admin.enrollment.index');
Route::get('admin/enrollment/create', [EnrollmentController::class, 'create'])->name('admin.enrollment.create');
Route::post('admin/enrollment/add', [EnrollmentController::class, 'store'])->name('admin.enrollment.store');
Route::get('admin/enrollment/edit/{enroll_id}', [EnrollmentController::class, 'edit'])->name('admin.enrollment.edit');