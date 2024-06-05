
@extends('layout.app')

@section('content')
   
<div class="forma" >
                        <h1>Edit Teacher's Details</h1>

                <form method="post" action="@if (isset($edit->employee_id)) {{ route('admin.teacher.update', ['employee_id' => $edit->employee_id]) }}@else{{ route('admin.teacher.store') }} @endif" enctype="multipart/form-data">
                
                         @csrf
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" aria-describedby="emailHelp" value="@if (isset($edit->employee_id)) {{ $edit->employee_id }}@else {{ old('employee_id') }} @endif">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="@if (isset($edit->employee_id)) {{ $edit->name }}@else {{ old('name') }} @endif">
                        </div>
                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="qualification" name="qualification" value="@if (isset($edit->employee_id)) {{ $edit->qualification }}@else {{ old('qualification') }} @endif">
                        </div>
                        <div class="mb-3">
                            <label for="year_experience" class="form-label">Years of Experience</label>
                            <input type="text" class="form-control" id="year_expreience" name="year_experience" value="@if (isset($edit->employee_id)) {{ $edit->year_experience }}@else {{ old('year_experience') }} @endif">
                        </div>
                        <label class="my-1 mr-2" for="status">Status</label>
                            <select class="custom-select my-1 mr-sm-2" id="status" name="status" value="@if (isset($edit->employee_id)) {{ $edit->status}}@else {{ old('status') }} @endif">
                                
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            
                            </select>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="@if (isset($edit->employee_id)) {{ $edit->email }}@else {{ old('email') }} @endif">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

@endsection