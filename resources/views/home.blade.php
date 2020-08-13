@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <a href="/detail" style="color: black; text-decoration: none">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Judul 1</h5>
                <h6 class="card-subtitle mb-2 text-muted">Author | Tanggal Pertanyaan</h6>
                <hr>
                <p class="card-text">Isi pertanyaan disini</p>
            </div>
        </div>
    </a><br>
    <a href="#" style="color: black; text-decoration: none">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Judul 2</h5>
                <h6 class="card-subtitle mb-2 text-muted">Author | Tanggal Pertanyaan</h6>
                <hr>
                <p class="card-text">Isi pertanyaan disini</p>
            </div>
        </div>
    </a><br>
    <a href="#" style="color: black; text-decoration: none">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Judul 3</h5>
                <h6 class="card-subtitle mb-2 text-muted">Author | Tanggal Pertanyaan</h6>
                <hr>
                <p class="card-text">Isi pertanyaan disini</p>
            </div>
        </div>
    </a><br>
</div>
@endsection
