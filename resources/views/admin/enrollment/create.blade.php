
@extends('layout.app')

@section('content')
<div class="forma" >
    <h1>Add Enrollment</h1>

    <form method="post" action="{{route('admin.enrollment.store')}}">
        @csrf
        <div class="mb-3">
            <label for="enroll_id" class="form-label">Enrolment ID</label>
            <input type="text" class="form-control" id="enroll_id" name="enroll_id" aria-describedby="emailHelp">
        </div>
        <!-- <div class="mb-3">
            <label for="student_id" class="form-label">Student Id</label>
            <input type="text" class="form-control" id="student_id" name="student_id">
        </div> -->
        <label class="my-1 mr-2" for="student_id">Student ID</label>
                            <select class="custom-select my-1 mr-sm-2" id="student_id" name="student_id">
                                @foreach($students as $student_id => $name)
                                <option value="{{$name}}">{{$name}}</option>
                              @endforeach
                            
                            </select>
        <!-- <div class="mb-3">
            <label for="course_code" class="form-label">Course Code</label>
            <input type="text" class="form-control" id="course_code" name="course_code">
        </div> -->
        <label class="my-1 mr-2" for="course_code">Course Code</label>
                            <select class="custom-select my-1 mr-sm-2" id="course_code" name="course_code">
                                @foreach($courses as $course_code => $name)
                                <option value="{{$name}}">{{$name}}</option>
                              @endforeach
                            
                            </select>
        
        
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>




@endsection