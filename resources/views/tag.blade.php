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
        @foreach($tags as $tag)
            <div class="col-sm-3">
                <div class="card shadow">
                    <div class="card-body">
                        <a href="/tag/{tag}"><span class="badge badge-pill badge-primary">{{ $tag->title }}</span></a>
                        <hr>
                        <p class="card-text">{{ $tag->pertanyaan->count() }} Pertanyaan</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($tags->get(0) == null)
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">Tidak ada data</p>
            </div>
        </div>
    @endif
</div>
@endsection
