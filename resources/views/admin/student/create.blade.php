
@extends('layout.app')

@section('content')
<div class="forma" >
                        <h1>Add Student</h1>

                        <form method="post" action="{{route('admin.student.store')}}">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade">
        </div>
        <label class="my-1 mr-2" for="sex">Sex</label>
                            <select class="custom-select my-1 mr-sm-2" id="sex" name="sex">
                                
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="2">Other</option>
                            
                            </select>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

@endsection