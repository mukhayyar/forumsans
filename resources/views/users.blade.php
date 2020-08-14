@extends('layouts.master')

@push('style')
    <style>
        a {
            color: black;
        }

        .card {
            margin-bottom: 1.5em;
        }

    </style>
@endpush

@section('content')
<div class="container-fluid">
    <h1>Seluruh User</h1>

    <div class="row">
        @foreach($users as $user)
            <div class="col-sm-3">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="/user/detail">
                            <h5>{{$user->name}}</h5>
                        </a>
                        <hr>
                        <p class="card-text">{{$user->checkReputation()}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
