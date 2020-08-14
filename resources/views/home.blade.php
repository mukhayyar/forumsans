@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h1>Seluruh Pertanyaan</h1>
        <a style="color: gray" href="/create" >Pertanyaan Baru</a>
    </div>
<<<<<<< HEAD
    @foreach($pertanyaan as $tanya)
    <a href="/detail/{{$tanya->id}}" style="color: black; text-decoration: none">
        <div class="card">
=======
    
    <a href="/detail" style="color: black; text-decoration: none">
        <div class="card shadow">
>>>>>>> 21aafdb8322934be0846108e2dc031c8e96e0a98
            <div class="card-body">
                <h5 class="card-title">{{$tanya->judul}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$tanya->user->name}} | {{$tanya->created_at}}</h6>
                <hr>
<<<<<<< HEAD
                <p class="card-text">{{$tanya->isi}}</p>
=======
                <p class="card-text">Isi pertanyaan disini</p>
                <span class="badge badge-pill badge-primary">Tag 1</span>
                <span class="badge badge-pill badge-primary">Tag 2</span>
                <span class="badge badge-pill badge-primary">Tag 3</span>
            </div>
        </div>
    </a><br>
    <a href="#" style="color: black; text-decoration: none">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Judul 2</h5>
                <h6 class="card-subtitle mb-2 text-muted">Author | Tanggal Pertanyaan</h6>
                <hr>
                <p class="card-text">Isi pertanyaan disini</p>
                <span class="badge badge-pill badge-primary">Tag 1</span>
                <span class="badge badge-pill badge-primary">Tag 2</span>
                <span class="badge badge-pill badge-primary">Tag 3</span>
            </div>
        </div>
    </a><br>
    <a href="#" style="color: black; text-decoration: none">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Judul 3</h5>
                <h6 class="card-subtitle mb-2 text-muted">Author | Tanggal Pertanyaan</h6>
                <hr>
                <p class="card-text">Isi pertanyaan disini</p>
>>>>>>> 21aafdb8322934be0846108e2dc031c8e96e0a98
                <span class="badge badge-pill badge-primary">Tag 1</span>
                <span class="badge badge-pill badge-primary">Tag 2</span>
                <span class="badge badge-pill badge-primary">Tag 3</span>
            </div>
        </div>
    </a><br>
    @endforeach
</div>
@endsection
