@extends('layout.layout')

@section('title', 'tutor\'s login page')

@section('content')
    <div class="login-container">
        <h2 class="login-heading">tutor's login page</h2>

        <form method="POST" action="{{ route('tutor.login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" id="phone" name="phone" class="form-control mt-2" placeholder="Enter your username" required autofocus>
            </div>

            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control mt-2" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
            </div>

            <small>login as <a href="{{ route('admin.login') }}">admin</a></small>

        </form>
    </div>
@endsection
