

@extends('student.app')

@section('content')
<div class="container">
    <h1>Lecture Notes</h1>
    @if ($notes->isNotEmpty())
        <div class="row">
            @foreach ($notes as $note)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $note->course->course_code }} - {{ $note->course->course_name }}</h5>
                            <p class="card-title">{{ $note->title }}</p>
                            
                            <a href="{{ asset('storage/' . $note->file_path) }}" class="btn btn-primary" download>Download</a>
                            <br><br>

                           
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Not uploaded.</p>
    @endif
</div>
@endsection 
