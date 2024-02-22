@extends('layout.app')

@section('title', 'Sign Up')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('register') }}" method="post">
                @csrf
                <h3 class="text-center text-dark">Register</h3>
                <div class="form-group">
                    <label for="name" class="text-dark">Name:</label><br>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                        <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="username" class="text-dark">Username:</label><br>
                    <input type="text" name="username" id="username" class="form-control">
                    @error('username')
                        <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                    @error('password_confirmation')
                        <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-dark">Login here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
