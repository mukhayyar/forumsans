@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card" style="color: black">
        <div class="card-body">
            <h5 class="card-title">Judul 1</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Author | Tanggal Pertanyaan
                | <a href="#"><i class="fas fa-thumbs-up"></i> (100)</a>
                <a href="#"><i class="fas fa-thumbs-down"></i> (10)</a>
            </h6>
            <hr>
            <p class="card-text">Isi pertanyaan disini</p>
            <hr>
            <p class="card-text">Isi komentar pertama <small>Author | Tanggal Komentar</small></p>
            <p class="card-text">Isi komentar kedua <small>Author | Tanggal Komentar</small></p>
            <a style="color: gray" href="">Tambah Komentar</a>
        </div>
    </div><br>

    <h5 style="color: black"> 2 Jawaban</h5>
    <div class="card" style="color: black">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
                Author | Tanggal Jawaban
                | <a href="#"><i class="fas fa-thumbs-up"></i> (100)</a>
                <a href="#"><i class="fas fa-thumbs-down"></i> (10)</a>
            </h6>
            <hr>
            <p class="card-text">Isi jawaban disini</p>
            <hr>
            <p class="card-text">Isi komentar pertama <small>Author | Tanggal Komentar</small></p>
            <p class="card-text">Isi komentar kedua <small>Author | Tanggal Komentar</small></p>
            <a style="color: gray" href="">Tambah Komentar</a>
        </div>
    </div><br>
    <div class="card" style="color: black">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
                Author | Tanggal Jawaban
                | <a href="#"><i class="fas fa-thumbs-up"></i> (100)</a>
                <a href="#"><i class="fas fa-thumbs-down"></i> (10)</a>
            </h6>
            <hr>
            <p class="card-text">Isi jawaban disini</p>
            <hr>
            <a style="color: gray" href="">Tambah Komentar</a>
        </div>
    </div><br>
</div>
@endsection
