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
        @for($i = 0; $i <= 6; $i++)
            <div class="col-sm-3">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="/user/detail">
                            <h5>Beta Tester</h5>
                        </a>
                        <hr>
                        <p class="card-text">Reputasi: 99</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
