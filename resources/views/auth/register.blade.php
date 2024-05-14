@extends('layouts.auth')

@section('content')
<div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5">
    <div class="sign-in-from">
        <h1 class="mb-0">Sign Up</h1>
        <p>Enter below information to create your account.</p>
        <form class="mt-4" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label" for="first_name">First Name</label>
                    <input id="first_name" type="text" class="form-control mb-0 @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name" required>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label" for="last_name">Last Name</label>
                    <input id="last_name" type="text" class="form-control mb-0 @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name" required>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input id="username" type="text" class="form-control mb-0 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter Username" required>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control mb-0" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required>
            </div>
            <div class="d-inline-block w-100">
                <div class="form-check d-inline-block mt-2 pt-1">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                </div>
                <button type="submit" class="btn btn-primary float-end">Sign Up</button>
            </div>
            <div class="sign-info">
                <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="sign-in.html">Log In</a></span>
            </div>
        </form>
    </div>
</div>
@endsection
