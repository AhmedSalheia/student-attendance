@extends('layout.tutor')

@section('content')
    <div class="container mt-3">

        <h3>Create Lecture</h3>

        <form action="{{ route('tutor.lecture.store') }}" method="POST">
            @csrf
            <div class="form-group my-3">
                <label for="Title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="form-group my-3">
                <label for="description">description</label>
                <textarea type="text" name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group my-3">
                <label for="course">Course</label>
                <select name="course" id="course" class="form-control select2-simple" required>
                    <option value="">select course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" @selected(old('course_id') == $course->id || $id)
                                data-room_number="{{ $course->room_number }}">{{ $course->subject }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-3">
                <label for="room_number">Room Number</label>
                <input type="text" name="room_number" id="room_number" class="form-control" value="{{ old('room_number') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

        @if($errors->any())
        <div class="alert alert-danger error-container mt-3">
                <ul class="list-unstyled error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
        @endif

    </div>
@endsection


@section('js')
<script>
    $(document).ready(function(){
        $('#room_number').val($('#course').find('option:selected').attr('data-room_number'));
    });

    let x = $('#course').on('change', function (){
        $('#room_number').val($(this).find('option:selected').attr('data-room_number'));
    });
</script>
@endsection
