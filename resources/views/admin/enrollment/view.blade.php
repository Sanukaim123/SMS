<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>{{ $title }}</h1>
    <table class="table table-bordered">
        <!-- <tr>
            <th>Enroll ID</th>
            <td>{{ $enrollment->enroll_id }}</td>
        </tr>
        <tr>
            <th>Student ID</th>
            <td>{{ $enrollment->student_id }}</td>
        </tr>
        <tr>
            <th>Student Name</th>
            <td>{{ $enrollment->student->name }}</td>  Assuming the Student model has a 'name' field -->
        <!-- </tr> --> 
        <tr>
            <th>Course Code</th>
            <td>{{ $enrollment->course_code }}</td>
        </tr>
        <tr>
            <th>Course Name</th>
            <td>{{ $enrollment->course->name }}</td> <!-- Assuming the Course model has a 'name' field -->
        </tr>
    </table>
    <a href="{{ route('admin.enrollment.index') }}" class="btn btn-primary">Back to List</a>
</div>
</body>
</html>