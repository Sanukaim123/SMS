<!-- resources/views/student/submissions/create.blade.php -->

@extends('student.app')

@section('content')
<div class="container">
    <h1>Submit Assignment: {{ $assignment->title }}</h1>

    <form action="{{ route('student.submissions.store', ['course_code' => $course_code, 'assignment' => $assignment->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Assignment File</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
