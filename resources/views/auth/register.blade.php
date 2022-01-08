@extends('layouts.bg')

@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="role" value="{{ ($_GET['as']) ?? '' }}">
                        <div class="form-group">
                            <input type="name"
                                class="form-control form-control-user @error('username') is-invalid @enderror" id="name"
                                placeholder="Name" name="username" value="{{ old('name') }}" required
                                autocomplete="name" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                                placeholder="Email Address" name="email" value="{{ old('email') }}"
                                required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="password" placeholder="Password" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password-confirm"
                                    placeholder="Repeat Password" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Register Account') }}
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Already have an account?
                            Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
