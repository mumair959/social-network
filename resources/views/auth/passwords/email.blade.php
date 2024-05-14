@extends('layouts.auth')

@section('content')
    <div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5">
        <div class="sign-in-from">
            <h1 class="mb-0">Reset Password</h1>
            <p>Enter your email address to get reset password link.</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="mt-4" method="POST" action="{{ route('password.email') }}">
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
                
                <div class="d-inline-block w-100">
                    <button type="submit" class="btn btn-primary float-end">Send Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>
@endsection
