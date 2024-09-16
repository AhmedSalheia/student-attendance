@extends('layout.admin')

@section('content')
    <div class="container">
        <h3 class="mt-3">Edit Tutor</h3>
        <form action="{{ route('admin.tutors.update', $tutor->phone) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $tutor->name }}" required>
            </div>
            <div class="form-group">
                <label for="courses">Courses</label>
                <select name="courses[]" multiple class="form-control select2-course">
                    @foreach ($tutor->courses as $course)
                        <option selected value="{{ $course->id }}">{{$course->subject}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
