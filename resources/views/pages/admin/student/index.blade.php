@extends('layout.admin')

@section('content')
    <div class="container">
        <h3 class="mt-3">Students</h3>
        <a href="{{ route('admin.student.create') }}" class="btn btn-primary my-3">Add Student</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>
                        <a href="{{ route('admin.student.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this tutor?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
@endsection
