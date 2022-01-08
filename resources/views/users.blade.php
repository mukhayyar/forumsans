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
    <form action="/users" method="get">
        <div class="form-group">
            <input type="text" name="cari" class="form-control" id="pertanyaan" aria-describedby="emailHelp" placeholder="Cari user yang kamu cari...">
        </div>
    </form>
    <div class="row">
        @foreach($users as $user)
            <div class="col-sm-3">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="/user/detail/{{$user->username}}">
                            <h5>{{$user->username}}</h5>
                        </a>
                        <hr>
                        <p class="card-text">{{$user->checkReputation()}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        @if($users->get(0)==null)
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">
                    Belum ada user yang terdaftar.
                    @if(!Auth::check())
                        <strong> Nampaknya kamu belum terdaftar. Daftar sekarang <a href="{{ route('blog.create') }}">disini!</a></strong>
                    @endif
                </p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
