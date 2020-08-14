@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h1>Seluruh Pertanyaan</h1>
        <a style="color: gray" href="/create" >Pertanyaan Baru</a>
    </div>
    
    <a href="/detail" style="color: black; text-decoration: none">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Judul 1</h5>
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
                <span class="badge badge-pill badge-primary">Tag 1</span>
                <span class="badge badge-pill badge-primary">Tag 2</span>
                <span class="badge badge-pill badge-primary">Tag 3</span>
            </div>
        </div>
    </a><br>
</div>
@endsection
