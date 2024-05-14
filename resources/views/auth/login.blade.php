@extends('layouts.auth')

@section('content')
    <div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5">
        <div class="sign-in-from">
            <h1 class="mb-0">Sign in</h1>
            <p>Enter your email address and password to access your account.</p>

            @if (session('success'))
                <div class="col-sm-12">
                    <div class="alert alert-solid alert-success d-flex align-items-center gap-2 alert-dismissible fade show mb-3" role="alert">
                        <span class="d-flex"><i class="material-symbols-outlined">thumb_up</i></span>
                        <span>{{session('success')}}</span>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <form class="mt-4" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email">Email address</label>
                    <input id="email" type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <a href="{{ route('password.request') }}" class="float-end">Forgot password?</a>
                    <input  id="password" type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-inline-block w-100">
                    <div class="form-check d-inline-block mt-2 pt-1">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Sign in</button>
                </div>
                <div class="sign-info">
                    <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="{{route('register')}}">Sign up</a></span>
                </div>
            </form>
        </div>
    </div>
@endsection
