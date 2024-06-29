<!-- resources/views/student/assignments/index.blade.php -->

@extends('student.app')

@section('content')
<div class="container">
    <h1>Your Assignments</h1>
    @if ($assignments->isNotEmpty())
        <div class="row">
            @foreach ($assignments as $assignment)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $assignment->course_code }} - {{ $assignment->course->course_name }}</h5>
                            <p class="card-title">{{ $assignment->title }}</p>
                            <p class="card-text"><small class="text-muted">Due Date: {{ $assignment->due_date }}</small></p>
                            <a href="{{ asset('storage/' . $assignment->file_path) }}" class="btn btn-primary" download>Download Assignment</a>
                            <br><br>

                            @php
                                $studentSubmission = $assignment->submissions->where('student_id', Auth::user()->student->student_id)->first();
                            @endphp

                            @if ($studentSubmission)
                                <p class="card-text"><strong>Submitted File: </strong> <a href="{{ asset('storage/' . $studentSubmission->file_path) }}" class="btn btn-info" download>{{ $assignment->title }}</a></p>
                                <form action="{{ route('student.submissions.destroy', $studentSubmission->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove Submission</button>
                                </form>
                            @else
                                <a href="{{ route('student.submissions.create', $assignment->id) }}" class="btn btn-secondary">Submit Assignment</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>You have no assignments.</p>
    @endif
</div>
@endsection 
