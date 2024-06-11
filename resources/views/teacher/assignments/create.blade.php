@extends('layout.app')

@section('content')
<div class="container">
    <h1>Add Assignment</h1>
    <form action="{{ route('teacher.assignments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" required>
        </div>
        <div>
            <label for="file">Upload File:</label>
            <input type="file" name="file" id="file" required>
        </div>
        <input type="hidden" name="course_code" value="{{ $course_code }}">
        <button type="submit">Add Assignment</button>
    </form>
</div>
@endsection
