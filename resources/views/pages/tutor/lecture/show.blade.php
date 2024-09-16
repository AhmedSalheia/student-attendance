@extends('layout.tutor')

@section('content')

    <div class="container mt-3">

        <div class="d-flex">
            <div class="mt-2">
                <h3 class="mb-3">course: {{ $lecture->course->subject }}</h3>
                <h3 class="">Lecture: {{ $lecture->title }}</h3>
                @if ($lecture->course->students_count)
                <p class="mt-3">number of attendance: {{ $lecture->students_count }}</p>
                <p>percentage of attendance: {{ ($lecture->students_count/$lecture->course->students_count)*100 }}%</p>
                <small>number of student in the course: {{ $lecture->course->students_count }}</small>
                @else
                <p>there is no any student in this course</p>
                @endif
            </div>
            <div class="d-flex flex-column ms-auto justify-content-center">
                <div class="">
                    <form action="{{ route('tutor.lecture.upload-file', $lecture) }}" method="post" id="upload_file">
                        @csrf
                    <div class="input-group d-inline-block">
                        <label>upload excel attendance</label>
                        <input class="form-control w-100" type="file" accept=".xlsx, .xls, .csv" name="file" onchange="$('#upload_file').submit();"/>
                    </div>
                        <small>this form for attendance student from excel <a class="link" href="#">example</a></small>
                    </form>
                </div>
                <div class="mt-4">
                    <form id="student_attende" action="{{ route('tutor.lecture.attende-student', $lecture->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="student_attende">attende student</label>
                            <select name="student_attende" class="form-control select2-student_attende">
                                <option></option>
                                @foreach ($absence_students as $student)
                                    <option value="{{$student->id}}">{{$student->id}} - {{$student->full_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="pt-1 bg-black opacity-50">
        @if($lecture->students->count())
        <table class="table">
         <thead>
            <tr>
                <th>id</th>
                <th>full name</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($lecture->students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->full_name}}</td>
                    <td>
                        <form action="{{ route('tutor.lecture.absence-student', $lecture->id) }}" method="POST"
                            class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" value="{{$student->id}}" name="student_id" class="btn btn-danger">unattende
                          </button>
                      </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
        </table>
        @endif
    </div>

@endsection

@section('js')
<script>
    $('.select2-student_attende').select2({
        allowClear: true,
        placeholder: "Search for a student id",
    });

    $('.select2-student_attende').on('select2:select', function (e) {
    var data = e.params.data;
    if (data.selected){
        $("#student_attende").submit();
    }
});
</script>
@endsection
