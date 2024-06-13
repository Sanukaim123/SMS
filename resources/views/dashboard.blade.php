
@extends('student.app')

@section('content')
<div class="row">
    @if ($courses && $courses->isNotEmpty())
        @foreach ($courses as $index => $course)
            @php
                // Alternate card border colors
                $borderClass = ($index % 2 == 0) ? 'border-left-primary' : 'border-left-success';
            @endphp
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card {{ $borderClass }} shadow h-100 py-2 course-card" data-url="">
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
                                <!-- Optional icon can be placed here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>You are not enrolled in any courses.</p>
    @endif
</div>

<!-- Optional: Add your custom CSS to the same file or a separate CSS file -->
<style>
    .course-card {
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }

    .course-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Optional: Add your custom JS to the same file or a separate JS file -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.course-card').forEach(function(card) {
            card.addEventListener('click', function() {
                window.location.href = this.dataset.url;
            });
        });
    });
</script>

@endsection