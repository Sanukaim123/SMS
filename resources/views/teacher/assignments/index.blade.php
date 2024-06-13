@extends('teacher.app')

@section('content')
<div class="container">
    <h1>Assignments</h1>
    @foreach ($courses as $course)
        <h2>{{ $course->course_name }}</h2>
        <a href="{{ route('teacher.assignments.create', $course->course_code) }}" class="btn btn-primary mb-3">Add Assignment</a>
        @if($course->assignments->isEmpty())
            <p>No assignments available.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course->assignments as $assignment)
                        <tr>
                            <td>{{ $assignment->title }}</td>
                            <td>{{ $assignment->due_date }}</td>
                            <td><a href="{{ asset('storage/' . $assignment->file_path) }}" download>Download</a></td>
                            <td>
                                <form action="{{ route('teacher.assignments.destroy', $assignment) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</div>
@endsection
