@extends('layout.app')

@section('content')
<div class="container">
    <h1>{{ $course->course_name }} - {{ $course->course_code }}</h1>
    
    <div class="row">
        <div class="col-xl-6 col-md-12 mb-4">
            <a href="{{ route('teacher.assignments.create', $course->course_code) }}" class="card-link">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Assignments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Assignments</div>
                            </div>
                            <div class="col-auto">
                                <!-- Optional icon -->
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-6 col-md-12 mb-4">
            <a href="" class="card-link">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lecture Notes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Add Lecture Notes</div>
                            </div>
                            <div class="col-auto">
                                <!-- Optional icon -->
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

<style>
.card-link {
    text-decoration: none;
    color: inherit;
}

.card-link:hover {
    cursor: pointer;
}
</style>