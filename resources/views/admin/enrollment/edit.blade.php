
@extends('layout.app')

@section('content')
   
<div class="forma"  >
    <h1>Edit Enrollment Details</h1>

    <form method="post" action="@if (isset($edit->enroll_id)) {{ route('admin.enrollment.update', ['enroll_id' => $edit->enroll_id]) }}@else{{ route('admin.enrollment.store') }} @endif" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="enroll_id" class="form-label">Enrollment ID</label>
            <input type="text" class="form-control" id="enroll_id" name="enroll_id" value="@if (isset($edit->enroll_id)) {{ $edit->enroll_id }}@else {{ old('enroll_id') }} @endif" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" value="@if (isset($edit->enroll_id)) {{ $edit->student_id }}@else {{ old('student_id') }} @endif">
        </div>
        <div class="mb-3">
            <label for="course_code" class="form-label">Course Code</label>
            <input type="text" class="form-control" id="course_code" name="course_code" value="@if (isset($edit->enroll_id)) {{ $edit->course_code }}@else {{ old('course_code') }} @endif">
        </div>
        
        <button type="submit" class="btn btn-primary">Edit</button>
        <a class="btn btn-danger" href="{{ route('admin.enrollment.index') }}">Cancel</a>
    </form>
</div>
@endsection