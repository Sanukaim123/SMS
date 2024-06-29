<!-- resources/views/student/submissions/create.blade.php -->

@extends('student.app')

@section('content')
<div class="container">
    <h1>Submit Assignment for {{ $assignment->course->course_name }}</h1>
    <br><br>
    <form action="{{ route('student.submissions.store', $assignment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">Upload File:</label>
            <input type="file" name="file" id="file" required>
        </div>
        <br><br>
        <button type="submit">Submit Assignment</button>
    </form>
</div>
@endsection
