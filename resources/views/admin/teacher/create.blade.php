
@extends('layout.app')

@section('content')
<div class="forma" >
                        <h1>Add Teacher</h1>

                <form method="post" action="{{route('admin.teacher.store')}}">
                         @csrf
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="qualification" name="qualification">
                        </div>
                        <div class="mb-3">
                            <label for="year_experience" class="form-label">Years of Experience</label>
                            <input type="text" class="form-control" id="year_expreience" name="year_experience">
                        </div>
                        <label class="my-1 mr-2" for="status">Status</label>
                            <select class="custom-select my-1 mr-sm-2" id="status" name="status">
                                
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            
                            </select>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>

@endsection