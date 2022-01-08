@extends('layouts.master')

@push('style')
<link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h1>Seluruh Pertanyaan</h1>
        @if(Auth::check())
        <a style="color: gray" href="{{ route('create.pertanyaan') }}">
         <i class="fas fa-plus"></i>  Buat Pertanyaan
        </a>
        @endif
    </div>
    <form action="/pertanyaan" method="get">
        <div class="form-group">
            <input type="text" name="cari" class="form-control" id="pertanyaan" aria-describedby="emailHelp" placeholder="Cari pertanyaan kamu...">
        </div>
    </form>
    @foreach($pertanyaan as $tanya)
        <div class="card">
            <a href="/pertanyaan/{{ $tanya->slug }}" style="color: black; text-decoration: none">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tanya->judul }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $tanya->user->username }} |
                            <small>{{ $tanya->created_at }}</small></h6>
                        <hr>
                        <p class="card-text">{!!$tanya->isi!!}</p>
                        @foreach($tanya->tags as $tag)
                            <a href="/tag/{tag}"><span class="badge badge-pill badge-primary">
                                {{ $tag->title }}</span></a>

                        @endforeach
                    </div>
                </div>
            </a>
        </div><br>
    @endforeach

    @if($pertanyaan->get(0)==null)
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">Masih belum ada yang menanyakan masalahnya.
                    @if(Auth::check())
                        <strong> Coba buat pertanyaan pertamamu <a href="{{ route('blog.create') }}">disini!</a></strong>
                    @endif
                </p>
            </div>
        </div>
    @endif
</div>
@endsection
