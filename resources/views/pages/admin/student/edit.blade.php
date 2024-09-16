@extends('layout.admin')

@section('content')
    <div class="container">
        <h3 class="mt-3">Edit Student</h3>
        <form action="{{ route('admin.student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="full_name" class="form-control" id="name" value="{{ $student->full_name }}" required>
            </div>
            <div class="form-group">
                <label for="course">Courses</label>
                <select name="course[]" multiple class="form-control select2-course">
                    @foreach ($student->courses as $course)
                    <option value="{{ $course->id }}" selected>{{ $course->subject }}</option>
                @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
