@extends('teacher.app')

@section('content')
<div class="container">
    <h1> Lecture Notes</h1>
    @foreach ($courses as $course)
        <h4>{{ $course->course_name }}</h4>
        <a href="{{ route('teacher.lec_notes.create', $course->course_code) }}" class="btn btn-primary mb-3">Add Lecture Notes</a>
        @if($course->notes->isEmpty())
            <p>No Lecture Notes available.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course->notes as $note)
                        <tr>
                            <td>{{ $note->title }}</td>
                          
                            <td><a href="{{ asset('storage/' . $note->file_path) }}" download>Download</a></td>
                            <td>
                                <form action="{{ route('teacher.lec_notes.destroy', $note) }}" method="POST" style="display:inline;">
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
