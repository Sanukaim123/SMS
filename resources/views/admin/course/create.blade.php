
@extends('layout.app')

@section('content')
<div class="forma" >
    <h1>Add New Course</h1>

    <form method="post" action="{{route('admin.course.store')}}">
        @csrf
        <div class="mb-3">
            <label for="course_id" class="form-label">Course Code</label>
            <input type="text" class="form-control" id="course_code" name="course_code" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <label class="my-1 mr-2" for="employee_id">Teacher ID</label>
                            <select class="custom-select my-1 mr-sm-2" id="employee_id" name="employee_id">
                                @foreach($teachers as $employee_id => $name)
                                <option value="{{$name}}">{{$name}}</option>
                              @endforeach
                            
                            </select>
        <!-- <div class="mb-3">
            <label for="grade" class="form-label">Teacher Id</label>
            <input type="text" class="form-control" id="employee_id" name="employee_id">
        </div> -->
        <br>
        <br>
       
        
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>


@endsection