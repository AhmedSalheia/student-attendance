@extends('layout.layout')

@section('title', 'admin\'s Login page')

@section('content')
    <div class="login-container">
        <h2 class="login-heading">admin's Login page</h2>

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="username">username</label>
                <input type="text" id="username" name="username" class="form-control mt-2" placeholder="Enter your username" required autofocus>
            </div>

            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control mt-2" placeholder="Enter your password" required>
            </div>

            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <small>login as <a href="{{ route('tutor.login') }}">tutor</a></small>
        </form>
    </div>
@endsection
