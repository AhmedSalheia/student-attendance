@extends('layout.tutor')

@section('content')

    <div class="container mt-3 ">

        <div class="d-flex flex-row justify-content-between mt-5">
            <h3>Lectures {{ $course ? "of $course->subject" : "" }}</h3>
            <a href="{{ route('tutor.lecture.create_4_course', $course->id ?? null) }}" class="btn btn-primary my-3">Create lecture</a>

        </div>

        <div class="">
            <table class="table mt-3">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>description</th>
                    <th>Course Subject</th>
                    <th>Room Number</th>
                    <th>count of attendance</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lectures as $lecture)
                    <tr>
                        <td>{{ $lecture->id }}</td>
                        <td>{{ $lecture->title }}</td>
                        <td>{{ $lecture->description }}</td>
                        <td>{{ $course ? $course->subject : $lecture->course->subject }}</td>
                        <td>{{ $lecture->room_number }}</td>
                        <td>{{ $lecture->students_count }}</td>
                        <td>
                            <a href="{{ route('tutor.lecture.show', $lecture) }}" class="btn btn-primary">show</a>
                            <form action="{{ route('tutor.lecture.destroy', $lecture) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this course?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
@endsection

