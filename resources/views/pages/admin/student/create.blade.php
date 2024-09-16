@extends('layout.admin')

@section('content')
    <div class="container">
        <h3 class="mt-3">Create Student</h3>
        <form action="{{ route('admin.student.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" class="form-control" id="id" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="full_name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" required>
            </div>
            <div class="form-group my-2">
                <label for="courses">Courses</label>
                <select id="courses" name="courses[]" multiple class="form-control select2-course">

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
