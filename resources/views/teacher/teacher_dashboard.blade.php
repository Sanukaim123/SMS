
@extends('layout.app')

@section('content')
<div class="row">
        @if ($courses && $courses->isNotEmpty())
            @foreach ($courses as $course)
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ route('course.details', $course->course_code) }}" class="card-link">
                        <div class="card border-left-primary shadow h-100 py-2" data-course-code="{{ $course->course_code }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ $course->course_code }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $course->course_name }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Optional icon -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <p>You are not assigned to any courses.</p>
        @endif
</div>


<style>
    .card:hover {
        cursor: pointer;
        background-color: #f8f9fa; /* Change background color on hover */
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.card').forEach(function (card) {
            card.addEventListener('click', function () {
                window.location.href = '/courses/' + this.dataset.courseCode; // Adjust the URL as needed
            });
        });
    });
</script>

@endsection