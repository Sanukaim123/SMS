
@extends('layout.app')

@section('content')
   
<div class="forma"  >
    <h1>Edit Course Details</h1>

    <form method="post" action="@if (isset($edit->course_code)) {{ route('admin.course.update', ['course_code' => $edit->course_code]) }}@else{{ route('admin.course.store') }} @endif" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="course_code" class="form-label">Course Code</label>
            <input type="text" class="form-control" id="course_code" name="course_code" value="@if (isset($edit->course_code)) {{ $edit->course_code }}@else {{ old('course_code') }} @endif" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="@if (isset($edit->course_code)) {{ $edit->course_name }}@else {{ old('course_name') }} @endif">
        </div>
        <div class="mb-3">
            <label for="employee_id" class="form-label">Teacher Id</label>
            <input type="text" class="form-control" id="employee_id" name="employee_id" value="@if (isset($edit->course_code)) {{ $edit->employee_id }}@else {{ old('employee_id') }} @endif">
        </div>
        
        <button type="submit" class="btn btn-primary">Edit</button>
        <a class="btn btn-danger" href="{{ route('admin.course.index') }}">Cancel</a>
    </form>
</div>


@endsection