
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
            <h1>Student Enrollment</h1>
        </div>

        <div class="col-sm-6" style="text-align:right;">
            <a href="{{route('admin.enrollment.create')}}" div class="btn btn-primary">Add Enrollment</a>
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
                <th scope="col">Enroll ID</th>
                <th scope="col">Student ID</th>
                <th scope="col">Course Code</th>
            
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enrollments as $index => $row)
            <tr>
                <!-- <td>{{ $index + 1 }}</td> -->
                <td>{{ $row->enroll_id }}</td>
                <td>{{ $row->student_id }}</td>
                <td>{{ $row->course_code }}</td>
                
                <td>
                    <a href="{{ route('admin.enrollment.edit', ['enroll_id' => $row->enroll_id]) }}" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" onClick="deleteFunction('{{ $row->enroll_id }}')">Delete</button> 
                    <a href="{{ route('admin.enrollment.show', ['enroll_id' => $row->enroll_id]) }}" class="btn btn-info">View</a>
                    

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