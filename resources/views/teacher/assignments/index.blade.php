@extends('teacher.app')

@section('content')
<div class="container">
    <h1>Assignments</h1>
    @foreach ($courses as $course)
        <h2>{{ $course->course_name }}</h2>
        <a href="{{ route('teacher.assignments.create', $course->course_code) }}">Add Assignment</a>
        <ul>
            @foreach ($course->assignments as $assignment)
                <li>
                    {{ $assignment->title }} - {{ $assignment->due_date }}
                    <a href="{{ asset('storage/' . $assignment->file_path) }}" download>Download</a>
                    <form action="{{ route('teacher.assignments.destroy', $assignment) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')


                        <button  class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>
@endsection
