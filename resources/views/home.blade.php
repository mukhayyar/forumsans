@extends('layouts.master')

@push('style')
<link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h1>Seluruh Pertanyaan</h1>
        <a style="color: gray" href="/create">Pertanyaan Baru</a>
    </div>

    @foreach($pertanyaan as $tanya)
        <div class="card">
            <a href="/detail/{{ $tanya->id }}" style="color: black; text-decoration: none">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tanya->judul }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $tanya->user->name }} |
                            <small>{{ $tanya->created_at }}</small></h6>
                        <hr>
                        <p class="card-text">{!!$tanya->isi!!}</p>
                        @foreach($tanya->tags as $tag)
                            <span class="badge badge-pill badge-primary">{{ $tag->title }}</span>
                        @endforeach
                    </div>
                </div>
            </a>
        </div><br>
    @endforeach

    @if($pertanyaan->get(0)==null)
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">Tidak ada data</p>
            </div>
        </div>
    @endif
</div>
@endsection
