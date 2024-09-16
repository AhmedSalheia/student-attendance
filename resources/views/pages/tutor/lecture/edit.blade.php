@extends('layout.tutor')

@section('content')
    <h3>Edit lecture</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tutor.lecture.update', $course) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="teacher_name">Teacher Name</label>
            <input type="text" name="teacher_name" id="teacher_name" class="form-control"
                   value="{{ $course->teacher_name }}" required>
        </div>
        <div class="form-group">
            <label for="book_name">Book Name</label>
            <input type="text" name="book_name" id="book_name" class="form-control" value="{{ $course->book_name }}"
                   required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" value="{{ $course->subject }}" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" id="room_number" class="form-control"
                   value="{{ $course->room_number }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
