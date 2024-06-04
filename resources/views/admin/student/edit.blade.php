
@extends('layout.app')

@section('content')
   
<div class="forma"  >
    <h1>Edit Student Details</h1>

        <form method="post" action="@if (isset($edit->student_id)) {{ route('admin.student.update', ['student_id' => $edit->student_id]) }}@else{{ route('admin.student.store') }} @endif" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" value="@if (isset($edit->student_id)) {{ $edit->student_id }}@else {{ old('student_id') }} @endif" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="@if (isset($edit->student_id)) {{ $edit->name }}@else {{ old('name') }} @endif">
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <input type="text" class="form-control" id="grade" name="grade" value="@if (isset($edit->student_id)) {{ $edit->grade }}@else {{ old('grade') }} @endif">
            </div>

            <label class="my-1 mr-2" for="sex">Sex</label>

            <select class="custom-select my-1 mr-sm-2" id="sex" name="sex">
                                    
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="2">Other</option>
                                
            </select>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="@if (isset($edit->student_id)) {{ $edit->address }}@else {{ old('address') }} @endif">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="@if (isset($edit->student_id)) {{ $edit->email }}@else {{ old('email') }} @endif">
            </div>
            
            <button type="submit" class="btn btn-primary">Edit</button>
            <a class="btn btn-danger" href="{{ route('admin.student.index') }}">Cancel</a>
        </form>
</div>
@endsection