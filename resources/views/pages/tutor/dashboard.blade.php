@extends('layout.tutor')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <h3>tutor Dashboard</h3>
            </div>
            @foreach ($user_coureses as $course)
            <div class="col-md-6 p-2">
                <div class="card">
                    <h5 class="card-header p-3">{{ $course->subject }}</h5>
                    <div class="card-body">
                        <p class="m-1">course teacher name: {{ $course->teacher_name }}</p>
                        <p class="m-1">number of students: {{ $course->students_count }}</p>
                        <p class="m-1">number of lectures: {{ $course->lectures_count }}</p>
                        <p class="m-1">course default room number: {{ $course->room_number }}</p>
                        <p class="m-1">course book: {{ $course->book_name }}</p>
                      <a href="{{ route('tutor.lecture.index_4_course', $course) }}" class="btn btn-primary mt-3">show lectures</a>
                      <a href="{{ route('tutor.lecture.create_4_course', $course->id) }}" class="btn btn-info mt-3">create lecture</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
