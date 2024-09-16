<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <!-- Custom Styles -->
    @include('sweetalert::alert')

    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .login-heading {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('content')
</div>

<!-- Include Bootstrap JS -->
<script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
@include('sweetalert::alert')
</body>
</html>
