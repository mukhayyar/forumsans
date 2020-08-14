@extends('layouts.master')

@push('style')
    <style>
        .card {
            margin-bottom: 1.5em;
        }

    </style>
@endpush

@section('content')
<div class="container-fluid">
    <h1>Seluruh Tag</h1>

    <div class="row">
        @for($i = 0; $i <= 6; $i++)
            <div class="col-sm-3">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="/home"><span class="badge badge-pill badge-primary">Tag 1</span></a>
                        <hr>
                        <p class="card-text">99 pertanyaan</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
