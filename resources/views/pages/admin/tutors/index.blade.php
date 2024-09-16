@extends('layout.admin')

@section('content')
    <div class="container">
        <h3 class="mt-3">Tutors</h3>
        <a href="{{ route('admin.tutors.create') }}" class="btn btn-primary my-3">Add Tutor</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tutors as $tutor)
                <tr>
                    <td>{{ $tutor->name }}</td>
                    <td>{{ $tutor->phone }}</td>
                    <td>
                        <a href="{{ route('admin.tutors.edit', $tutor->phone) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.tutors.destroy', $tutor->phone) }}" method="POST"
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
