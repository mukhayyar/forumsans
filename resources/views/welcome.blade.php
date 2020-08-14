@extends('layouts.bg')

@push('style')
    <style>
        h1 {
            margin-top: 200px;
            color: whitesmoke;
            font-family: Pacifico;
            font-size: 48px;
            line-height: 84px;
        }

        li,
        a {
            color: whitesmoke;
        }

    </style>
@endpush

@section('content')
@if(Route::has('login'))
    <ul class="nav justify-content-end">

        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}">Home</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if(Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        @endauth
    </ul>
@endif
<div class="d-flex justify-content-center">
    <h1>Sanbercode</h1>
</div>
<div class="d-flex justify-content-center">
    <h5 style="color: whitesmoke">Feel free to ask..</h5>
</div>
@endsection
