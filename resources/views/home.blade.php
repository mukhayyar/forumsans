@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h1>Seluruh Pertanyaan</h1>
        <a style="color: gray" href="/create" >Pertanyaan Baru</a>
    </div>
    @foreach($pertanyaan as $tanya)
        <div class="card">
        <a href="/detail/{{$tanya->id}}" style="color: black; text-decoration: none">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">{{$tanya->judul}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$tanya->user->name}} | {{$tanya->created_at}}</h6>
                <hr>
                <p class="card-text">{!!$tanya->isi!!}</p>
                @foreach($tanya->tags as $tag)
                <span class="badge badge-pill badge-primary">{{$tag->title}}</span>
                @endforeach
            </div>
        </div>
    </a><br>
    @endforeach
</div>
@endsection
