@extends('layout.admin')

@section('content')
<div class="container">
    <h3 class="mt-3">Edit Course</h3>

    <form action="{{ route('admin.courses.update', $course) }}" method="POST">
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
</div>
@endsection
