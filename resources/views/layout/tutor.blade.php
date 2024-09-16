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

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('tutor.dashboard') }}">student attendance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tutor.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tutor.lecture.index') }}">lecture</a>
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

    var $disabledResults = $(".select2-simple");
    $disabledResults.select2();
</script>
@include('sweetalert::alert')

@yield('js')
</body>
</html>
