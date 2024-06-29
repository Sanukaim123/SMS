@extends('teacher.app')

@section('content')
<div class="container">
    <h1>Add Assignment</h1>
    <br>
    <form action="{{ route('teacher.assignments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <div>
                    <td><label for="title">Title:</label></td>
                    <td><input type="text" name="title" id="title" required></td>
                </div>
            </tr>

            <tr>
                <div>
                    <td><label for="description">Description:</label></td>
                    <td><textarea name="description" id="description"></textarea></td>
                </div>
            </tr>

            <tr>
                <div>
                  <td><label for="due_date">Due Date:</label></td>
                  <td><input type="date" name="due_date" id="due_date" required></td>
                </div>
            </tr>

            <tr>
                <div>
                    <td><label for="file">Upload File:</label></td>
                    <td>  <input type="file" name="file" id="file" required></td>
                </div>
            </tr>
       </table>

       <br><br>
        <input type="hidden" name="course_code" value="{{ $course_code }}">
        <button type="submit">Add Assignment</button>
    </form>
</div>
@endsection
