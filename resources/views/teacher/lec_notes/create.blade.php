@extends('teacher.app')

@section('content')
<div class="container">
    <h1>Add Lecture Notes</h1>
    <br>
    <form action="{{ route('teacher.lec_notes.store') }}" method="POST" enctype="multipart/form-data">
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
                    <td><label for="file">Upload File:</label></td>
                    <td>  <input type="file" name="file" id="file" required></td>
                </div>
            </tr>
       </table>

       <br><br>
        <input type="hidden" name="course_code" value="{{ $course_code }}">
        <button type="submit">Add </button>
    </form>
</div>
@endsection
