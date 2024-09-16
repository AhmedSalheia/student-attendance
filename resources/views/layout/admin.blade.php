<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>student attendance</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.js') }}"></script>
    <link href="{{ asset('vendor/select2/select2.css') }}" rel="stylesheet"/>

    <link href="{{ asset('vendor/datatables/datatables.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/datatables/datatables.js') }}"></script>
    @include('sweetalert::alert')


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">student attendance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.tutors.index') }}">tutors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.student.index') }}">students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.courses.index') }}">courses</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<script>
    $(document).ready(function() {
        $('table').DataTable();
    });


    $(document).ready(function () {
        $('.select2-course').select2({
            ajax: {
                url: '/admin/select2-courses',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.subject,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            },
        });
    });

</script>
</body>
</html>
