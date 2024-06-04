
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
                                <h1>Student List</h1>
                            </div>
                            <div class="col-sm-6" style="text-align:right;">
                                <a href="{{route('admin.student.create')}}" div class="btn btn-primary">Add new student</a>
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
            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th scope="col">Grade</th>
            <th scope="col">Sex</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $index => $row)
        <tr>
            <!-- <td>{{ $index + 1 }}</td> -->
            <td>{{ $row->student_id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->grade }}</td>
            <td>{{ $row->sex }}</td>
            <td>{{ $row->address }}</td>
            <td>{{ $row->email }}</td>
            <td>
                 <a href="{{ route('admin.student.edit', ['student_id' => $row->student_id]) }}" class="btn btn-primary">Edit</a>
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