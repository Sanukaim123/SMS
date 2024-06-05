
@extends('layout.app')

@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
     </div>

      <!-- Content Row -->
                   
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Teacher List</h1>
        </div>

        <div class="col-sm-6" style="text-align:right;">
                <a href="{{route('admin.teacher.create')}}" div class="btn btn-primary">Add new teacher</a>
        </div>
    </div>

     @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

     @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


<div class="tabl">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Employee ID</th>
                <th scope="col">Name</th>
                <th scope="col">Qualification</th>
                <th scope="col">Years of Experience</th>
                <th scope="col">Status</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($teachers as $index => $row)
            <tr>
                <!-- <td>{{ $index + 1 }}</td> -->
                <td>{{ $row->employee_id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->qualification }}</td>
                <td>{{ $row->year_experience }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->email }}</td>
                <td>
                    <a href="{{ route('admin.teacher.edit', ['employee_id' => $row->employee_id]) }}" class="btn btn-primary">Edit</a> 
                    <button class="btn btn-danger" onClick="deleteFunction('{{ $row->employee_id }}')">Delete</button> 

                    

                </td>
            </tr>

            @empty

            <tr>
                <td colspan="8">No users found</td>
            </tr>
            
            @endforelse
        </tbody>
    </table>



</div>

@endsection