@extends('layout.admin')

@section('content')
<div class="container">
    <h3 class="mt-3">Create Course</h3>

    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="teacher_name">Teacher Name</label>
            <input type="text" name="teacher_name" id="teacher_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="book_name">Book Name</label>
            <input type="text" name="book_name" id="book_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" id="room_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
